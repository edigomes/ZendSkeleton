<?php

namespace Application\Service;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Doctrine\ORM\Query;

/**
 * Description of Content
 * Classe demo de uma Model
 * @author edi
 */
class Cliente implements ServiceLocatorAwareInterface {
    
    protected $em;
    protected $hydrate = true;
    
    /**
     * Return all data (Verificar se isto pode ficar na controller mesmo)
     * @param type $returnType Query::HYDRATE_ARRAY ou null para object
     * @return type
     */
    public function fetchAll() {
        //return $this->getEm()->getRepository('Application\Entity\Content')->findAll(Query::HYDRATE_ARRAY);
        $qb = $this->getEm()->createQueryBuilder();
        $qb->select('c')
            ->from('Application\Entity\Content', 'c');
        
        $contents = $qb->getQuery()->getResult($this->getHydrate());
        return $contents;
    }
    
    /**
     * Return data from id
     * @param type $id
     * @return type
     */
    public function get($id) {
        //return $this->getEm()->getRepository('Application\Entity\Content')->findOneBy(array('id' => $id));
        $qb = $this->getEm()->createQueryBuilder();
        $qb->select('c')
            ->from('Application\Entity\Content', 'c')
            ->where('c.id = :id')
            ->setParameter('id', $id);
        
        $contents = $qb->getQuery()->getResult($this->getHydrate());
        return $contents;
    }
    
    /**
     * Gets service locator
     * @return type
     */
    public function getServiceLocator() {
        return $this->serviceLocator;
    }

    /**
     * Sets service locator
     * @return type
     */
    public function setServiceLocator(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
        $this->serviceLocator = $serviceLocator;
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
    
    /**
     * Verify if object returned is hydrated or no
     * @return type
     */
    function getHydrate() {
        if ($this->hydrate) {
            return Query::HYDRATE_ARRAY;
        } else {
            return null;
        }
    }

    /**
     * Set if object returned is hydrated or no
     * @param type $hydrate
     */
    function setHydrate($hydrate) {
        $this->hydrate = $hydrate;
    }

}
