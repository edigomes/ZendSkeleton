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
use Zend\View\Model\JsonModel;

class IndexController extends AbstractActionController {
    
    public $em;
    
    public function indexAction() {
        
        // Query Builder
        
        /*$qb = $this->getEm()->createQueryBuilder();
        //$qb ->select('c','s')
        $qb ->select(
                'c.id AS id',
                'c.content AS content',
                's.content AS subcontent'
            )
            ->from('Application\Entity\Content', 'c')
            ->leftJoin('Application\Entity\Subcontent', 's',
            \Doctrine\ORM\Query\Expr\Join::WITH, 'c.id = s.content2'
        );

        $contents = $qb->getQuery()->getResult();
        $vars['contents'] = $contents;

        //var_dump($vars);

        //->where('u = :user')
        //->setParameter('user', $users)
        //->orderBy('a.created_at', 'DESC');

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
    
    public function listaAction() {
        
        // List
        //$contents = $this->getEm()->getRepository('Application\Entity\Content')->findAll();
        //$vars['contents'] = $contents;
        
        $ContentService = $this->getServiceLocator()->get("Application\Service\Content");
        $contents = array("contents" => $ContentService->fetchAll());
        
        return new ViewModel($contents);
    }
    
    /* Será descartado */
    protected function getEm() {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }
        return $this->em;
    }
    
}
