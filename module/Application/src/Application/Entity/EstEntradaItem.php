<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstEntradaItem
 *
 * @ORM\Table(name="EST_entrada_item", indexes={@ORM\Index(name="FK_produto", columns={"FK_item"}), @ORM\Index(name="FK_producao", columns={"FK_entrada"})})
 * @ORM\Entity
 */
class EstEntradaItem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PK_entrada_item", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pkEntradaItem;

    /**
     * @var float
     *
     * @ORM\Column(name="qTrib", type="float", precision=15, scale=3, nullable=false)
     */
    private $qtrib;

    /**
     * @var float
     *
     * @ORM\Column(name="vUnTrib", type="float", precision=15, scale=4, nullable=false)
     */
    private $vuntrib;

    /**
     * @var \Application\Entity\EstItem
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\EstItem")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FK_item", referencedColumnName="PK_item")
     * })
     */
    private $EstItem;

    /**
     * @var \Application\Entity\EstEntrada
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\EstEntrada")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FK_entrada", referencedColumnName="PK_entrada")
     * })
     */
    private $fkEntrada;
    
    function getPkEntradaItem() {
        return $this->pkEntradaItem;
    }

    function getQtrib() {
        return $this->qtrib;
    }

    function getVuntrib() {
        return $this->vuntrib;
    }

    function getEstItem() {
        return $this->EstItem;
    }

    function getFkEntrada() {
        return $this->fkEntrada;
    }

    function setPkEntradaItem($pkEntradaItem) {
        $this->pkEntradaItem = $pkEntradaItem;
    }

    function setQtrib($qtrib) {
        $this->qtrib = $qtrib;
    }

    function setVuntrib($vuntrib) {
        $this->vuntrib = $vuntrib;
    }

    function setEstItem(\Application\Entity\EstItem $EstItem) {
        $this->EstItem = $EstItem;
    }

    function setFkEntrada(\Application\Entity\EstEntrada $fkEntrada) {
        $this->fkEntrada = $fkEntrada;
    }

}

