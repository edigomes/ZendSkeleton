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
class AbstractService {
    
    // Entity Mananger
    private $em;
    private $entity;
    
    function __construct($em, $entity) {
        $this->em = $em;
        $this->entity = $entity;
    }

    public function create($data) {
        try {
            $entity = new $this->entity;
            $this->getEm()->persist($this->getHydrator()->hydrate($data, $entity));
            $this->getEm()->flush();
        } catch (\Exception $e) {
            var_dump($e);
        }

        //$extracted = $this->getHydrator()->extract($entity);
        $extracted = $this->getHydrator()->extract($entity);
        
        $pkName = $this->getEm()->getClassMetadata($this->entity)->getIdentifier()[0];
        $insertId = $extracted[$pkName];
        
        // Isso vira função (Hydrate recursivo)
        foreach ($extracted as $key => &$value) {
            if (is_object($value)) {
                try {
                    $value = $this->getHydrator()->extract($value);
                } catch (\Exception $e) {
                    continue;
                }
            }
        }
        
        //var_dump($entity->toArray());
        
        return new JsonModel(
            array(
                "status"=>true,
                "message"=>"O ".$this->xController." foi salvo",
                "insertId"=>$insertId,
                "insertObject"=>$extracted
                //"insertObject"=>$this->getEm()->getClassMetadata($this->entity)->getFieldValue($entity, $this->getEm()->getClassMetadata($this->entity)->getIdentifier())
            )
        );
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
    
    function getEntity() {
        return $this->entity;
    }

    function setEntity($entity) {
        $this->entity = $entity;
    }
    
     /**
     * Retorna o hydrator padrão
     * @return DoctrineObject
     */
    public function getHydrator() {
        if (null === $this->hydrator) {
            $this->hydrator = new DoctrineObject($this->getEm(), $this->entity);
        }
        return $this->hydrator;
    }
    
}
