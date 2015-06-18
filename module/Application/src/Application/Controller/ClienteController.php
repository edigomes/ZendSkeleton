<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Doctrine\ORM\Query;
use Zend\View\Model\JsonModel;
use Application\Entity\CadCliente;
use Zend\Paginator\Paginator,
    Doctrine\ORM\Tools\Pagination\Paginator as DoctrinePaginator,
    DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as PaginatorAdapter;

/**
 * Description of AbstractController
 *
 * @author Edi
 */
class ClienteController extends AbstractRestfulController {
    
    private $em;
    
    public function create($data) {
        
        $user = new CadCliente();
        
        foreach ($data as $key => $value) {
            eval("$user->set"."$key = '$value'");
        }
    
    }

    public function delete($id) {
        parent::delete($id);
    }

    public function get($id) {
        $qb = $this->getEm()->createQueryBuilder();
        $qb->select('c')
            ->from('Application\Entity\CadCliente', 'c')
            ->where('c.PK_cliente = :id')
            ->setParameter('id', $id);
        
        $cliente["result"] = $qb->getQuery()->getResult(Query::HYDRATE_ARRAY)[0];
        
        return new JsonModel($cliente);
        
    }

    public function getList() {
        
        $qb = $this->getEm()->createQueryBuilder();
        $qb->select('c')
            ->from('Application\Entity\CadCliente', 'c')
            ->setFirstResult(0)
            ->setMaxResults($this->params()->fromQuery('page'));
        
        /*$doctrinePaginator = new DoctrinePaginator($qb);
        $paginatorAdapter = new PaginatorAdapter($doctrinePaginator);
        $paginator = new Paginator($paginatorAdapter);
        $paginator->setCurrentPageNumber($this->params()->fromRoute('page'));
        $paginator->setItemCountPerPage(1);*/
        
        $clientes["result"] = $qb->getQuery()->getResult(Query::HYDRATE_ARRAY);
        $clientes["pageCount"] = 3;

        return new JsonModel($clientes);

    }

    public function update($id, $data) {
        
        $CadCliente = $this->getEm()->getRepository('Application\Entity\CadCliente')->find($id);
        
        //var_dump($id);
        
        // Update data
        foreach ($data as $key => $value) {
            //print('$CadCliente->set'.$key."('$value');\n");
            if ($key!="id") {
                /* @var $setup type */
                $setup = $CadCliente;
                eval('$setup->set'.$key."('$value');");
            }
        }
        
        // Persist
        $this->getEm()->persist($CadCliente);
        $this->getEm()->flush();
        
        return new JsonModel(array(
            'status' => true            
        ));
    }
    
    /**
     * Get doctrine entity manager
     * @return type
     */
    protected function getEm() {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }
    
}
