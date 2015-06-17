<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Doctrine\ORM\Query;
use Zend\View\Model\JsonModel;

/**
 * Description of AbstractController
 *
 * @author Edi
 */
class AbstractController extends AbstractRestfulController {
    
    public function create($data) {
        parent::create($data);
    }

    public function delete($id) {
        parent::delete($id);
    }

    public function get($id) {
        $ContentService = $this->getServiceLocator()->get("Application\Service\Content");
        $contents = $ContentService->get($id);
        return new JsonModel($contents);
    }

    public function getList() {
        $ContentService = $this->getServiceLocator()->get("Application\Service\Content");
        $contents = $ContentService->fetchAll(Query::HYDRATE_ARRAY);
        return new JsonModel($contents);
    }

    public function update($id, $data) {
        parent::update($id, $data);
    }
    
}
