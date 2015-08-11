<?php

namespace Application\Service;

use Application\Entity\ComVendaItem;
use Application\Entity\EstItem;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;

/**
 * Description of Content
 * Classe demo de uma Model
 * @author edi
 */
class VendaItem {
    
    // Entity Mananger
    private $em;
    
    function __construct($em) {
        $this->em = $em;
    }
    
    public function create($data) {
        
        $id = $data["fkVenda"]; 
        
        /*
        try {
            $entity = new $this->entity;
            $this->getEm()->persist($this->getHydrator()->hydrate($data, $entity));
            $this->getEm()->flush();
        } catch (\Exception $e) {
            var_dump($e);
        }
        */
        
        try {
            
            // Verifica se já foi finalizado
            if ($this->canChange($id)) {

                $ComVendaItem = new ComVendaItem();

                $hydrator = new DoctrineObject($this->getEm(), "Application\Entity\ComVendaItem");

                // Persist
                $this->getEm()->persist($hydrator->hydrate($data, $ComVendaItem));
                $this->getEm()->flush();

                return true;
                
            } else {
                return false;
            }
           
        } catch (\Exception $e) {
            var_dump($e);
        }
        
    }

    /**
     * Atualiza uma VendaItem
     * @param type $id
     * @param type $data
     * @return JsonModel
     */
    public function update($id, $data) {

        try {
            
            // Retorna o registro atual
            $ComVendaItem = $this->getEm()->getRepository("Application\Entity\ComVendaItem")->find($id);
            
            // Pega o id da entrada
            $pkVenda = $ComVendaItem->getComVenda()->getPkVenda();
            
            // Verifica se já foi finalizado
            if ($this->canChange($pkVenda)) {

                $hydrator = new DoctrineObject($this->getEm(), "Application\Entity\ComVendaItem");

                // Persist
                $this->getEm()->persist($hydrator->hydrate($data, $ComVendaItem));
                $this->getEm()->flush();

                return true;
                
            } else {
                return false;
            }
           
        } catch (\Exception $e) {
            var_dump($e);
        }
        
    }
    
    /**
     * Delete entrada item
     * @param type $id
     */
    public function delete($id) {
        
        try {
            
            // Traz o pkVenda
            $pkVenda = $this->getComVendaItem($id)->getFkVenda()->getPkVenda();
            
            // Traz a entrada
            $ComVenda = $this->getVenda($pkVenda);
            
            // Verifica se já foi finalizado
            if ($ComVenda->getDhfinalizacao() != null) {
                //$this->setErrMsg("Não é possível adicionar um item numa Venda finalizada");
                return false;
            } else {
                
                $excluir = $this->getEm()->find("Application\Entity\ComVendaItem", $id);
                $this->getEm()->remove($excluir);
                $this->getEm()->flush();
                
            }

        } catch (\Exception $e) {
            var_dump($e);
        }
        
        return true;
        
    }
    
    /**
     * @param type $id
     * @return ComVendaItem
     */
    public function getComVendaItem($id) {
        return $this->getEm()->getRepository("Application\Entity\ComVendaItem")->find($id);
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
     * @return ComVendaItemItem
     */
    public function getVenda($id) {

        //return $this->getEm()->getRepository("Application\Entity\ComVenda")
        //    ->find($this->getComVendaItem($id)->getFkVenda()->getPkVenda());
        return $this->getEm()->getRepository("Application\Entity\ComVenda")
            ->find($id);

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
     * Pode modificar o registro
     * @param type $id
     * @return boolean
     */
    function canChange($id) {

        $ComVenda = $this->getVenda($id);
        
        // Verifica se já foi finalizado
        if ($ComVenda->getDhfechamento() != null) {
            //$this->setErrMsg("Não é possível adicionar um item numa Venda finalizada");
            return false;
        } else {
            return true;
        }
        
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
