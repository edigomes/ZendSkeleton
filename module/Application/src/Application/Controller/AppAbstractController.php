<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Zend\Json\Json;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use Zend\Paginator\Paginator;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\AbstractQuery;
use Zend\Stdlib\Hydrator\ClassMethods;
use Application\Entity\EstEntrada;
use Application\Entity\CadFornecedor;
use Zend\Stdlib\Hydrator\ObjectProperty;

/**
 * Description of AbstractController
 * @author Edi
 */
class AppAbstractController extends AbstractRestfulController {
    
    // Entity manager
    private $em;
    // Hydrator
    private $hydrator;
    // Default Entity
    private $entity = array();
    // Default alias
    protected $alias = null;
    // Registros por página
    private $countPerPage = 10;
    // Paginas
    private $pageCount = 1;
    // Controller desc
    private $xController = "Registro";
    // Where
    private $where = null;
    // Join
    private $join = array();

    /**
     * Cria um novo registro
     * @param type $data
     * @return JsonModel
     */
    public function create($data) {
        
        //var_dump($data); exit;
        
        try {
            $entity = new $this->entity;
            $this->getEm()->persist($this->getHydrator()->hydrate($data, $entity));
            $this->getEm()->flush();
        } catch (\Exception $e) {
            var_dump($e);
        }

        //$extracted = $this->getHydrator()->extract($entity);
        $extracted = $this->getHydrator()->extract($entity);
        
        $pkName = $this->getEm()->getClassMetadata($this->entity)->getIdentifier()[0];
        $insertId = $extracted[$pkName];
        
        // Isso vira função (Hydrate recursivo)
        foreach ($extracted as $key => &$value) {
            if (is_object($value)) {
                try {
                    $value = $this->getHydrator()->extract($value);
                } catch (\Exception $e) {
                    continue;
                }
            }
        }
        
        //var_dump($entity->toArray());
        
        return new JsonModel(
            array(
                "status"=>true,
                "message"=>"O ".$this->xController." foi salvo",
                "insertId"=>$insertId,
                "insertObject"=>$extracted
                //"insertObject"=>$this->getEm()->getClassMetadata($this->entity)->getFieldValue($entity, $this->getEm()->getClassMetadata($this->entity)->getIdentifier())
            )
        );

    }

    /**
     * Exclui um registro
     * @param type $id
     */
    public function delete($id) {
        
        $excluir = $this->getEm()->find($this->entity, $id);
        $this->getEm()->remove($excluir);
        $this->getEm()->flush();
        
        return new JsonModel(
            array(
                "status"=>true,
                "message"=>"O ".$this->xController." foi excluido"
            )
        );
        
    }
    
    /**
     * Retorna um registro pela PK
     * @param type $id
     * @return JsonModel
     */
    public function get($id) {
        $returnArray = false;
        $qb = $this->getEm()->createQueryBuilder();
        //$qb->select($this->alias)->from($this->entity, $this->alias);
        $qb->select($this->getFullAlias())->from($this->entity, $this->alias);
        
        // Iterate entity and joins
        foreach ($this->join as $join) {
            $qb->leftJoin("$this->alias.$join[join]", $join['alias']);
        }
        
        // Verify if where has setted
        if (is_null($this->where)) {
            $qb->where($this->alias.'.'.$this->getPK().' = :id')->setParameter('id', $id);
        }
        
        //$data[$this->getEntityName()] = $this->getHydrator()->extract($qb->getQuery()->getResult()[0]);
        //$data = $this->getHydrator()->extract($qb->getQuery()->getResult()[0]);
        $data = $qb->getQuery()->getResult(AbstractQuery::HYDRATE_ARRAY)[0];
        
        if (!$returnArray) {
            return new JsonModel($data);
        } else {
            return $data;
        }
        
    }
    
    /**
     * Retorna uma lista com todos os resultados e paginação
     * @return JsonModel
     */
    public function getList() {
        
         // MERDA
        
        /*$hydrator = $this->getHydrator();
        
        $en = new EstEntrada();
        $for = new CadFornecedor();
        $for->setXNome("TESTE");
        
        $en->setCadFornecedor($for);
        
        var_dump($hydrator->extract($en)); exit;*/
        
        $clientes = array();
        
        $qb = $this->getEm()->createQueryBuilder();
        //$qb->select($this->alias)->from($this->entity, $this->alias);
        $qb->select($this->getFullAlias())->from($this->entity, $this->alias);
        //->where('c.xNome = :all')->setParameter('all', 'keyword');
        
        // Iterate entity and joins
        foreach ($this->join as $join) {
            $qb->leftJoin("$this->alias.$join[join]", $join['alias']);
        }
        
        // Set where from query
        $Where = Json::decode($this->params()->fromQuery('where'));
        
        //var_dump($Where); exit;
        //var_dump($qb->getDQL()); exit;
        
        // Seta a Where da busca (depois setar os parametros na DQL)
        $this->setSearchKeywords($qb);
        
        // Registros por página
        $countPerPage = $this->params()->fromQuery('count');
        if (!empty($countPerPage)) {
            $this->setCountPerPage($countPerPage);
        }
        
        if (!is_null($Where)) {
            foreach ($Where as $key => $value) {
                $qb->where($this->alias.".$key = :$key");//->setParameter($key, $value);
            }
        }
        
        $query = $this->getEm()->createQuery($qb->getDQL())
            ->setHydrationMode(AbstractQuery::HYDRATE_ARRAY);

        if (!is_null($Where)) {
            foreach ($Where as $key => $value) {
                $query->setParameter($key, $value);
            }
        }
        
        $keywords = $this->params()->fromQuery('keywords');
        if (!empty($keywords)) {
            $query->setParameter('keyword', '%'.$keywords.'%');
        }
        
        //print_r($query->getDQL()); exit;
        
        $clientes["result"] = $this->paginate($query);
        $clientes["pageCount"] = $this->getPageCount();

        return new JsonModel($clientes);

    }
    
    /**
     * 
     * @param \Doctrine\ORM\QueryBuilder $qb
     * @return array
     */
    private function paginate($query) {

        $paginator = new Paginator(new DoctrinePaginator(new ORMPaginator($query)));
        
        try {
            $paginator->setCurrentPageNumber($this->params()->fromQuery('page'))->setItemCountPerPage($this->getCountPerPage());
        } catch (\Exception $e) {
            var_dump($e);
        }
        
        $this->setPageCount(ceil($paginator->getTotalItemCount()/$this->getCountPerPage()));
        
        return $this->paginationToArray($paginator);
        
    }
    
    /**
     * Configura a busca caso foi enviada no post a keyword
     */
    public function setSearchKeywords($qb) {
        $keywords = $this->params()->fromQuery('keywords');
        // Busca
        if (!empty($keywords)) {
            
            $searchIn = null;
            //$hydrator = new DoctrineObject($this->getEm(), $entity);
            ini_set('xdebug.max_nesting_level', 1000);
            // Varre os campos para montar a busca
            //foreach ($hydrator->extract(new CadCliente()) as $field => $value) {
            
            $toSearch = array();
           
            foreach ($this->getEm()->getClassMetadata($this->entity)->getFieldNames() as $field) {
                
                $toSearch[] = $this->alias.".".$field;
                // Caso o cancat de busca não tenha sido inicializado, inicia
                
                /*if (!isset($searchIn)) {
                    $searchIn = $qb->expr()->concat($qb->expr()->literal(''), $this->alias.".".$field);
                    continue;
                }*/
                
                //$searchIn .= ", ";
                //$searchIn .= $qb->expr()->concat($qb->expr()->literal(' '), $this->alias.".".$field);
                
                // Adiciona o concat do field
                /*$searchIn = $qb->expr()->concat(
                    $searchIn,
                    $qb->expr()->concat($qb->expr()->literal(' '), $this->alias.".".$field)
                );*/
            }
            
            // TODO: Fazer função get entity path
            $entityPath = substr($this->entity, 0, strrpos($this->entity, "\\"))."\\";
            
            foreach ($this->join as $value) { // TODO: FAZER FUNCAO
                
                foreach ($this->getEm()->getClassMetadata($entityPath.$value["join"])->getFieldNames() as $field) {
                    
                    $toSearch[] = $value["alias"].".".$field;
                    //var_dump($value["alias"].".".$field); exit;
                    //$searchIn .= ", ";
                    //$searchIn .= $qb->expr()->concat($qb->expr()->literal(' '), $this->alias.".".$field);
                    // Adiciona o concat do field
                    /*$searchIn = $qb->expr()->concat(
                        $searchIn,
                        $qb->expr()->concat($qb->expr()->literal(' '), $value["alias"].".".$field)
                    );*/
                }
                
            }
            
            //var_dump($toSearch); exit;
            foreach ($toSearch as $value) {
                $qb->orWhere("$value LIKE :keyword");
            }
            
            //$searchIn .= $qb->expr()->concat($qb->expr()->literal(), $searchIn);
            
            // Adiciona o concat no like da where
            /*$qb->add('where', 
                $qb->expr()->like(
                    $searchIn,
                    ':keywords'
                )
            );*/

        }

    }

    /**
     * Atualiza um registro
     * @param type $id
     * @param type $data
     * @return JsonModel
     */
    public function update($id, $data) {

        try {
            //var_dump($data); exit;
            //exit;
            // Get entity
            $CadCliente = $this->getEm()->getRepository($this->entity)->find($id);
            //$CadCliente = $this->getHydrator()->hydrate($data, $CadCliente);
            //var_dump($CadCliente); exit;
            
            // Persist
            $this->getEm()->persist($this->getHydrator()->hydrate($data, $CadCliente));
            $this->getEm()->flush();
            
        } catch (\Exception $e) {
            var_dump($e);
        }

        return new JsonModel(array(
            'status' => true,
            'message' => "O ".$this->xController." foi salvo"          
        ));
    }
    
    /**
     * Get doctrine entity manager
     * @return EntityManager
     */
    public function getEm() {
        
        if (null === $this->entity) {
            throw new \Exception("Entity não setada");
        }
        
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }
    
    /**
     * Retorna o hydrator padrão
     * @return DoctrineObject
     */
    public function getHydrator() {
        if (null === $this->hydrator) {
            $this->hydrator = new DoctrineObject($this->getEm(), $this->entity);
            //$this->hydrator = new ClassMethods();
        }
        return $this->hydrator;
    }
    
    private function paginationToArray($paginator) {
        
        //$hydrator = new DoctrineObject($this->getEm(), 'Application\Entity\CadCliente');
        
        $arr = array();
        foreach ($paginator as $item) {
            //$arr[] = $hydrator->extract($item);
            $arr[] = $item;
        }
        
        return $arr;

    }
    
    /**
     * Retorna a chave primária da entity default
     * @return int
     */
    private function getPK() {
        return $this->getEm()->getClassMetadata($this->entity)->getFieldNames()[0];
    }
    
    function getCountPerPage() {
        return $this->countPerPage;
    }

    function setCountPerPage($countPerPage) {
        $this->countPerPage = $countPerPage;
    }

    function getPageCount() {
        return $this->pageCount;
    }

    function setPageCount($pageCount) {
        $this->pageCount = $pageCount;
    }
    
    function getEntity() {
        return $this->entity;
    }

    function setEntity($entity, $alias) {
        $this->entity = $entity;
        $this->alias = $alias;
    }
    
    function getAlias() {
        return $this->alias;
    }
    
    /**
     * Return alias of entity and all joins
     * @return array
     */
    function getFullAlias() {
        $fullAlias = array();
        $fullAlias[] = $this->alias;
        foreach ($this->getJoin() as $value) {
            $fullAlias[] = $value['alias'];
        }
        return $fullAlias;
    }

    function getXController() {
        return $this->xController;
    }

    function setAlias($alias) {
        $this->alias = $alias;
    }

    function setXController($xController) {
        $this->xController = $xController;
    }
    
    function getEntityName() {
        $p = explode("\\", $this->entity);
        return end($p);
    }
    
    public function getJoin() {
        return $this->join;
    }

    public function addJoin($join, $alias) {
        $this->join[] = array("join"=>$join, "alias"=>$alias);
    }

}