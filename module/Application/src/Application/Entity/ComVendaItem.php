<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComVendaItem
 *
 * @ORM\Table(name="COM_venda_item", indexes={@ORM\Index(name="COM_venda_item_fk1", columns={"FK_item"}), @ORM\Index(name="COM_venda_item_fk2", columns={"FK_venda"})})
 * @ORM\Entity
 */
class ComVendaItem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PK_venda_item", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pkVendaItem;

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
     * @var \Application\Entity\ComVenda
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\ComVenda")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FK_venda", referencedColumnName="PK_venda")
     * })
     */
    private $ComVenda;

    /**
     * @var float
     *
     * @ORM\Column(name="qTrib", type="float", precision=15, scale=3, nullable=false)
     */
    private $qtrib;

    /**
     * @var string
     *
     * @ORM\Column(name="vUnTrib", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $vuntrib;

    /**
     * @var string
     *
     * @ORM\Column(name="vDesc", type="decimal", precision=15, scale=4, nullable=true)
     */
    private $vdesc;
    
    function getPkVendaItem() {
        return $this->pkVendaItem;
    }

    function getEstItem() {
        return $this->EstItem;
    }

    function getComVenda() {
        return $this->ComVenda;
    }

    function getQtrib() {
        return $this->qtrib;
    }

    function getVuntrib() {
        return $this->vuntrib;
    }

    function getVdesc() {
        return $this->vdesc;
    }

    function setPkVendaItem($pkVendaItem) {
        $this->pkVendaItem = $pkVendaItem;
    }

    function setEstItem(\Application\Entity\EstItem $EstItem) {
        $this->EstItem = $EstItem;
    }

    function setComVenda(\Application\Entity\ComVenda $ComVenda) {
        $this->ComVenda = $ComVenda;
    }

    function setQtrib($qtrib) {
        $this->qtrib = $qtrib;
    }

    function setVuntrib($vuntrib) {
        $this->vuntrib = $vuntrib;
    }

    function setVdesc($vdesc) {
        $this->vdesc = $vdesc;
    }

}

