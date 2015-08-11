<?php

namespace Application\Controller;

use Zend\View\Model\JsonModel;

/**
 * Description of AbstractController
 * @author Edi
 */
class VendaController extends AppAbstractController {
    
    function __construct() {
        $this->setEntity('Application\Entity\ComVenda', "e");
        $this->addJoin("CadCliente", "c");
    }

    public function create($data) {
        return parent::create($data);
    }

    public function delete($id) {
        parent::delete($id);
    }

    public function get($id) {
        return parent::get($id);
    }

    public function getList() {
        return parent::getList();
    }

    public function update($id, $data) {
        
        $VendaService = $this->getVendaService();

        if ($this->params()->fromQuery('finaliza')) {
            
            if ($VendaService->finalizaVenda($id)) {
                return new JsonModel(array(
                    "status"=>true,
                    "message"=>"Venda finalizada com sucesso."
                ));
            } else {
                return new JsonModel(array(
                    "status"=>false,
                    "message"=>$VendaService->getErrMsg()
                ));
            }
            
        } else if ($this->params()->fromQuery('cancela')) {
            
            if ($VendaService->cancelaVenda($id)) {
                return new JsonModel(array(
                    "status"=>true,
                    "message"=>"Esta entrada foi cancelada"
                ));
            } else {
                return new JsonModel(array(
                    "status"=>false,
                    "message"=>$VendaService->getErrMsg()
                ));
            }
           
        } else {
            if ($VendaService->update($id, $data)) {
                return new JsonModel(array(
                    "status"=>true,
                    "message"=>"O Registro foi salvo"
                ));
            } else {
                return new JsonModel(array(
                    "status"=>false,
                    "message"=>$VendaService->getErrMsg()
                ));
            }
        }
        
    }
    
    /**
     * Return entrada service
     * @return \Application\Service\Venda
     */
    function getVendaService() {
        return $this->getServiceLocator()->get('Application\VendaService');
    }

}
