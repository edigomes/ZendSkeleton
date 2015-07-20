<?php

namespace Application\Service;

use Application\Entity\EstEntradaItem;
use Application\Entity\EstItem;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;

/**
 * Description of Content
 * Classe demo de uma Model
 * @author edi
 */
class EntradaItem {
    
    // Entity Mananger
    private $em;
    
    function __construct($em) {
        $this->em = $em;
    }

    /**
     * Atualiza uma EntradaItem
     * @param type $id
     * @param type $data
     * @return JsonModel
     */
    public function update($id, $data) {

        try {

            $EstEntradaItem = $this->getEm()->getRepository("Application\Entity\EstEntradaItem")->find($id);
            
            // Verifica se já foi finalizado
            if ($EstEntradaItem->getDhfinalizacao() != null) {
                // setErrMsg("mimimimimi");
                return false;
            }
            
            $hydrator = new DoctrineObject($this->getEm(), "Application\Entity\EstEntradaItem");
            
            // Persist
            $this->getEm()->persist($hydrator->hydrate($data, $EstEntradaItem));
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
        
        // Verifica se já foi finalizado
        if ($EstEntradaItem->getDhfinalizacao() != null) {
            // setErrMsg("mimimimimi");
            return false;
        }
        
        $excluir = $this->getEm()->find("Application\Entity\EstEntradaItem", $id);
        $this->getEm()->remove($excluir);
        $this->getEm()->flush();
    }
    
    /**
     * @param type $id
     * @return EstEntradaItem
     */
    public function getEstEntradaItem($id) {
        return $this->getEm()->getRepository("Application\Entity\EstEntradaItem")->find($id);
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
     * @return EstEntradaItemItem
     */
    public function getEntradaItemItens($id) {
        return $this->getEm()->getRepository("Application\Entity\EstEntradaItemItem")->findBy(
           array('fkEntradaItem' => $id)
           //array('FK_' =>array('value1','value2'))
         );
    }
    
    public function finalizaEntradaItem($id) {
        
        try {
            
            $EstEntradaItem = $this->getEstEntradaItem($id);
            
            // Verifica se já foi finalizado
            if ($EstEntradaItem->getDhfinalizacao() != null) {
                // setErrMsg("mimimimimi");
                return false;
            }
            
            // Seta a data de finalização
            $EstEntradaItem->setDhfinalizacao(array('date'=>'now'));
            // Atualiza a entrada
            $this->getEm()->persist($EstEntradaItem);
            
            // Retorna os itens da reposição
            $EntradaItemItens = $this->getEntradaItemItens($id);
            
            // Varre o estoque atualizando a quantidade
            foreach ($EntradaItemItens as $value) {
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
