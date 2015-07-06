<?php

namespace Application\Controller;
use Zend\View\Model\JsonModel;
use \Doctrine\ORM\Query;
use Zend\Json\Expr;
/**
 * Description of AbstractController
 * @author Edi
 */
class EntradaController extends AppAbstractController {
    
    function __construct() {
        $this->setEntity('Application\Entity\EstEntrada');
        // TODO: Adicionar array de alias e join
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
        
        $qb = $this->getEm()->createQueryBuilder();
        $qb->select(array('c','f'))->from('Application\Entity\EstEntrada', 'c')
        ->leftJoin('c.fkFornecedor', 'f');

        //$data = $this->getEm()->getRepository('Application\Entity\EstEntradaItem')->findAll(Query::HYDRATE_ARRAY);
        
        $data = $this->getHydrator()->extract($qb->getQuery()->getResult()[0]);
        
        //var_dump(Json::encode($qb->getQuery()->getResult()[0])); exit;
        
        try {
            return new JsonModel($data);
        } catch (\Exception $e) {
            var_dump($e);
        }
        
        //return parent::getList();
    }

    public function update($id, $data) {
        return parent::update($id, $data);
    }

}
