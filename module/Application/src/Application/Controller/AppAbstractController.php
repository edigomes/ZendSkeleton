<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Application\Entity\CadCliente;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use Zend\Paginator\Paginator;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Doctrine\ORM\EntityManager;

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
    //private $entity = 'Application\Entity\CadCliente';
    private $entity = null;
    // Default alias
    protected $alias = 'c';
    // Registros por página
    private $countPerPage = 10;
    // Paginas
    private $pageCount = 1;

    /**
     * Cria um novo registro
     * @param type $data
     * @return JsonModel
     */
    public function create($data) {

        try {
            $this->getEm()->persist($this->getHydrator()->hydrate($data, new CadCliente()));
            $this->getEm()->flush();
        } catch (Exception $e ) {
            echo 'Code : ' . $e->getPortableCode();
            echo 'Message : ' . $e->getPortableMessage();
        }
        
        return new JsonModel(
            array(
                "status"=>true,
                "message"=>"O cliente foi salvo"
            )
        );

    }

    /**
     * Exclui um registro
     * @param type $id
     */
    public function delete($id) {
        parent::delete($id);
    }
    
    /**
     * Retorna um registro pela PK
     * @param type $id
     * @return JsonModel
     */
    public function get($id) {
        
        $qb = $this->getEm()->createQueryBuilder();
        $qb->select($this->alias)
            ->from($this->entity, $this->alias)
            ->where($this->alias.'.'.$this->getPK().' = :id')
            ->setParameter('id', $id);

        $data["result"] = $this->getHydrator()->extract($qb->getQuery()->getResult()[0]);
        
        return new JsonModel($data);
        
    }
    
    /**
     * Retorna uma lista com todos os resultados e paginação
     * @return JsonModel
     */
    public function getList() {
        
        $qb = $this->getEm()->createQueryBuilder();
        $qb->select($this->alias)
            ->from($this->entity, $this->alias);
            //->where('c.xNome = :all')
            //->setParameter('all', 'keyword');
        
        // Seta a busca
        $this->setSearchKeywords($qb);
        
        $clientes["result"] = $this->paginate($qb);
        $clientes["pageCount"] = $this->getPageCount();

        return new JsonModel($clientes);

    }
    
    /**
     * 
     * @param \Doctrine\ORM\QueryBuilder $qb
     * @return array
     */
    private function paginate(\Doctrine\ORM\QueryBuilder $qb) {
        
        $countPerPage = $this->params()->fromQuery('count');
        // Busca
        if (!empty($countPerPage)) {
            $this->setCountPerPage($countPerPage);
        }
        
        $paginator = new Paginator(new DoctrinePaginator(new ORMPaginator($qb)));
        $paginator->setCurrentPageNumber($this->params()->fromQuery('page'))->setItemCountPerPage($this->getCountPerPage());
        
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

            // Varre os campos para montar a busca
            //foreach ($hydrator->extract(new CadCliente()) as $field => $value) {
            foreach ($this->getEm()->getClassMetadata($this->entity)->getFieldNames() as $field) {
                // Caso o cancat de busca não tenha sido inicializado, inicia
                if (!isset($searchIn)) {
                    $searchIn = $qb->expr()->concat($qb->expr()->literal(''), $this->alias.".".$field);
                    continue;
                }

                // Adiciona o concat do field
                $searchIn = $qb->expr()->concat(
                    $searchIn,
                    $qb->expr()->concat($qb->expr()->literal(' '), $this->alias.".".$field)
                );
            }

            // Adiciona o concat no like da where
            $qb->add('where', 
                $qb->expr()->like(
                    $searchIn,
                    ':keywords'
                )
            );

            $qb->setParameter('keywords', '%'.$keywords.'%');
        }
    }

    /**
     * Atualiza um registro
     * @param type $id
     * @param type $data
     * @return JsonModel
     */
    public function update($id, $data) {

        $CadCliente = $this->getEm()->getRepository($this->entity)->find($id);

        try {
            // Persist
            $this->getEm()->persist($this->getHydrator()->hydrate($data, $CadCliente));
            $this->getEm()->flush();
        } catch (\Exception $e) {
            var_dump($e);
        }

        return new JsonModel(array(
            'status' => true,
            'message' => "O cliente foi salvo"          
        ));
    }
    
    /**
     * Get doctrine entity manager
     * @return EntityManager
     */
    protected function getEm() {
        
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
    private function getHydrator() {
        if (null === $this->hydrator) {
            $this->hydrator = new DoctrineObject($this->getEm(), $this->entity);
        }
        return $this->hydrator;
    }
    
    private function paginationToArray($paginator) {
        
        $hydrator = new DoctrineObject($this->getEm(), 'Application\Entity\CadCliente');
        
        $arr = array();
        foreach ($paginator as $item) {
            $arr[] = $hydrator->extract($item);
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

    function setEntity($entity) {
        $this->entity = $entity;
    }
    
}