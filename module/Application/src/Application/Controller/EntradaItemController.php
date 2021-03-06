<?php

namespace Application\Controller;

use Zend\View\Model\JsonModel;

/**
 * Description of AbstractController
 * @author Edi
 */
class EntradaItemController extends AppAbstractController {
    
    function __construct() {
        $this->setEntity('Application\Entity\EstEntradaItem', "e");
        $this->addJoin("EstItem", "i");
    }

    public function create($data) {
        // Returns EntradaItemService
        $EntradaItemService = $this->getEntradaItemService();
        
        if ($EntradaItemService->create($data)) {
            return new JsonModel(array(
                "status"=>true,
                "message"=>"O Registro foi salvo"
            ));
        } else {
            return new JsonModel(array(
                "status"=>false,
                "message"=>$EntradaItemService->getErrMsg()
            ));
        }
    }

    public function delete($id) {
        
        // Returns EntradaItemService
        $EntradaItemService = $this->getEntradaItemService();
        
        if ($EntradaItemService->delete($id)) {
            return new JsonModel(array(
                "status"=>true,
                "message"=>"O Registro foi removido"
            ));
        } else {
            return new JsonModel(array(
                "status"=>false,
                "message"=>$EntradaItemService->getErrMsg()
            ));
        }
    }

    public function get($id) {
        return parent::get($id);
    }

    public function getList() {
        return parent::getList();
    }

    public function update($id, $data) {
        
        // Returns EntradaItemService
        $EntradaItemService = $this->getEntradaItemService();
        
        if ($EntradaItemService->update($id, $data)) {
            return new JsonModel(array(
                "status"=>true,
                "message"=>"O Registro foi salvo"
            ));
        } else {
            return new JsonModel(array(
                "status"=>false,
                "message"=>$EntradaItemService->getErrMsg()
            ));
        }
        
    }
    
    /**
     * Return entrada service
     * @return \Application\Service\EntradaItem
     */
    function getEntradaItemService() {
        return $this->getServiceLocator()->get('Application\EntradaItemService');
    }

}
