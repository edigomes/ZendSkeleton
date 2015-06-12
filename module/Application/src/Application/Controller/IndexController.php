<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Content;

class IndexController extends AbstractActionController {
    
    public $em;
    
    public function indexAction() {

        // New
        /*$entity = new Content();
        $entity->setContent("new new content!");
        // Persist
        $this->getEm()->persist($entity);
        $this->getEm()->flush();
        
        //------------------------------------------------------------
        
        // Update
        $entity_update = $this->getEm()->getRepository('Application\Entity\Content')->find(1);
        $entity_update->setContent('new updated content!');
        // Persist
        $this->getEm()->persist($entity);
        $this->getEm()->flush();
        
        //------------------------------------------------------------*/
        
        // List
        $contents = $this->getEm()->getRepository('Application\Entity\Content')->findAll();
        $vars['contents'] = $contents;
        
        return new ViewModel($vars);
        
    }
    
    protected function getEm() {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }
    
}
