<?php

namespace Application\Controller;

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
