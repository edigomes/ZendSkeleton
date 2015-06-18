<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Doctrine\ORM\Query;
use Zend\View\Model\JsonModel;
use Application\Entity\CadCliente;

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
        
        $user = new CadCliente();
        
        //var_dump($cliente['result']);
        
        foreach ($cliente["result"] as $key => $value) {
            eval('$user->set'.$key."('$value');");
        }
        
        return new JsonModel($cliente);
    }

    public function getList() {
        
        $qb = $this->getEm()->createQueryBuilder();
        $qb->select('c')->from('Application\Entity\CadCliente', 'c');
        
        $clientes["result"] = $qb->getQuery()->getResult(Query::HYDRATE_ARRAY);
        $clientes["count"] = 3;
        
        return new JsonModel($clientes);
        
    }

    public function update($id, $data) {
        parent::update($id, $data);
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
