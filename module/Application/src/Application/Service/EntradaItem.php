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
    
    public function create($data) {
        
        $id = $data["fkEntrada"]; 
        
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
            
            // Verifica se j� foi finalizado
            if ($this->canChange($id)) {

                $EstEntradaItem = new EstEntradaItem();

                $hydrator = new DoctrineObject($this->getEm(), "Application\Entity\EstEntradaItem");

                // Persist
                $this->getEm()->persist($hydrator->hydrate($data, $EstEntradaItem));
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
     * Atualiza uma EntradaItem
     * @param type $id
     * @param type $data
     * @return JsonModel
     */
    public function update($id, $data) {

        try {
            
            // Retorna o registro atual
            $EstEntradaItem = $this->getEm()->getRepository("Application\Entity\EstEntradaItem")->find($id);
            
            // Pega o id da entrada
            $pkEntrada = $EstEntradaItem->getFkEntrada()->getPkEntrada();
            
            // Verifica se j� foi finalizado
            if ($this->canChange($pkEntrada)) {

                $hydrator = new DoctrineObject($this->getEm(), "Application\Entity\EstEntradaItem");

                // Persist
                $this->getEm()->persist($hydrator->hydrate($data, $EstEntradaItem));
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
            
            // Traz o pkEntrada
            $pkEntrada = $this->getEstEntradaItem($id)->getFkEntrada()->getPkEntrada();
            
            // Traz a entrada
            $EstEntrada = $this->getEntrada($pkEntrada);
            
            // Verifica se j� foi finalizado
            if ($EstEntrada->getDhfinalizacao() != null) {
                //$this->setErrMsg("N�o � poss�vel adicionar um item numa Entrada finalizada");
                return false;
            } else {
                
                $excluir = $this->getEm()->find("Application\Entity\EstEntradaItem", $id);
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
    public function getEntrada($id) {

        //return $this->getEm()->getRepository("Application\Entity\EstEntrada")
        //    ->find($this->getEstEntradaItem($id)->getFkEntrada()->getPkEntrada());
        return $this->getEm()->getRepository("Application\Entity\EstEntrada")
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
        return utf8_encode("Esta entrada j� foi finalizada, N�o � poss�vel altera-la.");
    }
    
    /**
     * Pode modificar o registro
     * @param type $id
     * @return boolean
     */
    function canChange($id) {

        $EstEntrada = $this->getEntrada($id);
            
        // Verifica se j� foi finalizado
        if ($EstEntrada->getDhfinalizacao() != null) {
            //$this->setErrMsg("N�o � poss�vel adicionar um item numa Entrada finalizada");
            return false;
        } else {
            return true;
        }
        
    }


    /**
     * Retorna o hydrator padr�o
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
