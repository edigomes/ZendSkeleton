<?php

namespace Application\Controller;
use Zend\View\Model\JsonModel;
use \Doctrine\ORM\AbstractQuery;
use Zend\Json\Expr;
use Application\Entity\CadFornecedor;
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
        
        //$data = $this->getHydrator()->extract($qb->getQuery()->getResult()[0]);
        //foreach ($data as $row) {
          //  var_dump($row);
        //}
        
        $data = $qb->getQuery()
            ->getResult(AbstractQuery::HYDRATE_ARRAY);
        
        //var_dump($data); exit;
        
        //var_dump(get_object_vars($qb->getQuery()->getResult()[0])); exit;
        //var_dump(get_object_vars($data['fkFornecedor'])); exit;
        //var_dump(get_object_vars($data['dhabertura'])); exit;
        
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
