<?php

namespace Application\Service;

use Zend\ServiceManager\ServiceLocatorAwareInterface;

/**
 * Description of Content
 *
 * @author edi
 */
class Content implements ServiceLocatorAwareInterface {
    
    protected $em;
    protected $sm;

    public function fetchAll() {
        return $this->getEm()->getRepository('Application\Entity\Content')->findAll();
    }

    public function getServiceLocator() {
        return $this->serviceLocator;
    }

    public function setServiceLocator(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
        $this->serviceLocator = $serviceLocator;
    }
    
    protected function getEm() {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }
        return $this->em;
    }

}
