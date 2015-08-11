<?php

namespace Application\Service;

use Application\Entity\ComVenda;
use Application\Entity\EstItem;
use Application\Entity\ComVendaItem;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;

/**
 * Description of Content
 * Classe demo de uma Model
 * @author edi
 */
class Venda {
    
    // Entity Mananger
    private $em;
    
    function __construct($em) {
        $this->em = $em;
    }

    /**
     * Atualiza uma Venda
     * @param type $id
     * @param type $data
     * @return JsonModel
     */
    public function update($id, $data) {

        try {

            $ComVenda = $this->getEm()->getRepository("Application\Entity\ComVenda")->find($id);
            
            // Verifica se já foi finalizado
            if ($ComVenda->getDhfinalizacao() != null) {
                // setErrMsg("mimimimimi");
                return false;
            }
            
            $hydrator = new DoctrineObject($this->getEm(), "Application\Entity\ComVenda");
            
            // Persist
            $this->getEm()->persist($hydrator->hydrate($data, $ComVenda));
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
     * @return ComVenda
     */
    public function getComVenda($id) {
        return $this->getEm()->getRepository("Application\Entity\ComVenda")->find($id);
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
     * @return ComVendaItem
     */
    public function getVendaItens($id) {
        return $this->getEm()->getRepository("Application\Entity\ComVendaItem")->findBy(
           array('fkVenda' => $id)
           //array('FK_' =>array('value1','value2'))
         );
    }
    
    public function finalizaVenda($id) {
        
        try {
            
            $ComVenda = $this->getComVenda($id);
            
            // Verifica se já foi finalizado
            if ($ComVenda->getDhfinalizacao() != null && $ComVenda->getDhcancelamento() == null) {
                // setErrMsg("mimimimimi");
                return false;
            }
            
            // Seta a data de finalização
            $ComVenda->setDhfinalizacao(array('date'=>'now'));
            // Atualiza a entrada
            $this->getEm()->persist($ComVenda);
            
            // Retorna os itens da reposição
            $VendaItens = $this->getVendaItens($id);
            
            // Varre o estoque atualizando a quantidade
            foreach ($VendaItens as $value) {
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
    
    public function cancelaVenda($id) {
        
        try {
            
            $ComVenda = $this->getComVenda($id);
            
            // Verifica se já foi finalizado para voltar o estoque
            if ($ComVenda->getDhfinalizacao() != null && $ComVenda->getDhcancelamento() == null) {

                // Atualiza a entrada
                $this->getEm()->persist($ComVenda);

                // Retorna os itens da reposição
                $VendaItens = $this->getVendaItens($id);

                // Varre o estoque atualizando a quantidade
                foreach ($VendaItens as $value) {
                    // Retorna o item
                    $EstItem = $this->getEstItem($value->getEstItem()->getPK_item());
                    // Atualiza o estoque do mesmo
                    $EstItem->setQuantidade($EstItem->getQuantidade() - $value->getQtrib());
                    // Persist
                    $this->getEm()->persist($EstItem);
                }
                
            }
            
            // Seta a data de cancelamento
            $ComVenda->setDhcancelamento(array('date' => 'now'));
            
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
