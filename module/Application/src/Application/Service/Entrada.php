<?php

namespace Application\Service;

use Application\Entity\EstEntrada;
use Application\Entity\EstItem;
use Application\Entity\EstEntradaItem;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;

/**
 * Description of Content
 * Classe demo de uma Model
 * @author edi
 */
class Entrada {
    
    // Entity Mananger
    private $em;
    
    function __construct($em) {
        $this->em = $em;
    }

    /**
     * Atualiza uma Entrada
     * @param type $id
     * @param type $data
     * @return JsonModel
     */
    public function update($id, $data) {

        try {

            $EstEntrada = $this->getEm()->getRepository("Application\Entity\EstEntrada")->find($id);
            
            // Verifica se já foi finalizado
            if ($EstEntrada->getDhfinalizacao() != null) {
                // setErrMsg("mimimimimi");
                return false;
            }
            
            $hydrator = new DoctrineObject($this->getEm(), "Application\Entity\EstEntrada");
            
            // Persist
            $this->getEm()->persist($hydrator->hydrate($data, $EstEntrada));
            $this->getEm()->flush();
           
        } catch (\Exception $e) {
            var_dump($e);
        }
        
        return true;
        
    }
    
    /**
     * Delete entrada item
     * @param type $id
     */
    public function delete($id) {
        exit('please implement!');
        $excluir = $this->getEm()->find($this->entity, $id);
        $this->getEm()->remove($excluir);
        $this->getEm()->flush();
    }
    
    /**
     * @param type $id
     * @return EstEntrada
     */
    public function getEstEntrada($id) {
        return $this->getEm()->getRepository("Application\Entity\EstEntrada")->find($id);
    }
    
    /**
     * @param type $id
     * @return EstItem
     */
    public function getEstItem($id) {
        return $this->getEm()->getRepository("Application\Entity\EstItem")->find($id);
    }
    
    /**
     * @param type $id
     * @return EstEntradaItem
     */
    public function getEntradaItens($id) {
        return $this->getEm()->getRepository("Application\Entity\EstEntradaItem")->findBy(
           array('fkEntrada' => $id)
           //array('FK_' =>array('value1','value2'))
         );
    }
    
    public function finalizaEntrada($id) {
        
        try {
            
            $EstEntrada = $this->getEstEntrada($id);
            
            // Verifica se já foi finalizado
            if ($EstEntrada->getDhfinalizacao() != null) {
                // setErrMsg("mimimimimi");
                return false;
            }
            
            // Seta a data de finalização
            $EstEntrada->setDhfinalizacao(array('date'=>'now'));
            // Atualiza a entrada
            $this->getEm()->persist($EstEntrada);
            
            // Retorna os itens da reposição
            $EntradaItens = $this->getEntradaItens($id);
            
            // Varre o estoque atualizando a quantidade
            foreach ($EntradaItens as $value) {
                // Retorna o item
                $EstItem = $this->getEstItem($value->getEstItem()->getPK_item());
                // Atualiza o estoque do mesmo
                $EstItem->setQuantidade($EstItem->getQuantidade() + $value->getQtrib());
                // Persist
                $this->getEm()->persist($EstItem);
            }
            
            // Realiza todas as operações
            $this->getEm()->flush();
            
        } catch (\Exception $e) {
            var_dump($e);
        }
        
        return true;
        
    }
    
    /**
     * Get doctrine entity manager
     * @return EntityManager
     */
    function getEm() {
        return $this->em;
    }
    
    /**
     * 
     * @return string
     */
    function getErrMsg() {
        return utf8_encode("Esta entrada já foi finalizada, Não é possível altera-la.");
    }
    
     /**
     * Retorna o hydrator padrão
     * @return DoctrineObject
     */
    public function getHydrator() {
        if (null === $this->hydrator) {
            $this->hydrator = new DoctrineObject($this->getEm(), $this->entity);
            //$this->hydrator = new ClassMethods();
        }
        return $this->hydrator;
    }
    
}
