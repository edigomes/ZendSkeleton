<?php

namespace Application\Controller;

use Zend\View\Model\JsonModel;

/**
 * Description of AbstractController
 * @author Edi
 */
class EntradaController extends AppAbstractController {
    
    function __construct() {
        $this->setEntity('Application\Entity\EstEntrada', "e");
        $this->addJoin("CadFornecedor", "f");
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
        
        $EntradaService = $this->getEntradaService();

        if ($this->params()->fromQuery('finaliza')) {
            if ($EntradaService->finalizaEntrada($id)) {
                return new JsonModel(array(
                    "status"=>true,
                    "message"=>"Entrada finalizada com sucesso."
                ));
            } else {
                return new JsonModel(array(
                    "status"=>false,
                    "message"=>$EntradaService->getErrMsg()
                ));
            }
        } else {
            if ($EntradaService->update($id, $data)) {
                return new JsonModel(array(
                    "status"=>true,
                    "message"=>"O Registro foi salvo"
                ));
            } else {
                return new JsonModel(array(
                    "status"=>false,
                    "message"=>$EntradaService->getErrMsg()
                ));
            }
        }
        
    }
    
    /**
     * Return entrada service
     * @return \Application\Service\Entrada
     */
    function getEntradaService() {
        return $this->getServiceLocator()->get('Application\EntradaService');
    }

}
