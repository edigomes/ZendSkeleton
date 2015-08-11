<?php

namespace Application\Controller;

use Zend\View\Model\JsonModel;

/**
 * Description of AbstractController
 * @author Edi
 */
class VendaItemController extends AppAbstractController {
    
    function __construct() {
        $this->setEntity('Application\Entity\ComVendaItem', "e");
        $this->addJoin("EstItem", "i");
    }

    public function create($data) {
        // Returns VendaItemService
        $VendaItemService = $this->getVendaItemService();
        
        if ($VendaItemService->create($data)) {
            return new JsonModel(array(
                "status"=>true,
                "message"=>"O Registro foi salvo"
            ));
        } else {
            return new JsonModel(array(
                "status"=>false,
                "message"=>$VendaItemService->getErrMsg()
            ));
        }
    }

    public function delete($id) {
        
        // Returns VendaItemService
        $VendaItemService = $this->getVendaItemService();
        
        if ($VendaItemService->delete($id)) {
            return new JsonModel(array(
                "status"=>true,
                "message"=>"O Registro foi removido"
            ));
        } else {
            return new JsonModel(array(
                "status"=>false,
                "message"=>$VendaItemService->getErrMsg()
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
        
        // Returns VendaItemService
        $VendaItemService = $this->getVendaItemService();
        
        if ($VendaItemService->update($id, $data)) {
            return new JsonModel(array(
                "status"=>true,
                "message"=>"O Registro foi salvo"
            ));
        } else {
            return new JsonModel(array(
                "status"=>false,
                "message"=>$VendaItemService->getErrMsg()
            ));
        }
        
    }
    
    /**
     * Return entrada service
     * @return \Application\Service\VendaItem
     */
    function getVendaItemService() {
        return $this->getServiceLocator()->get('Application\VendaItemService');
    }

}
