<?php

namespace Application\Controller;

use \Application\Entity\CadCliente;

/**
 * Description of AbstractController
 * @author Edi
 */
class ClienteController extends AppAbstractController {
    
    function __construct() {
        $this->setEntity('Application\Entity\CadCliente');
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
        return parent::update($id, $data);
    }

    
}
