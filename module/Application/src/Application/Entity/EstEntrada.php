<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstEntrada
 *
 * @ORM\Table(name="EST_entrada", indexes={@ORM\Index(name="FK_fornecedor", columns={"FK_fornecedor"})})
 * @ORM\Entity
 */
class EstEntrada
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PK_entrada", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pkEntrada;

    /**
     * @var string
     *
     * @ORM\Column(name="nDoc", type="string", length=50, nullable=true)
     */
    private $ndoc;

    /**
     * @var \Date
     *
     * @ORM\Column(name="dhAbertura", type="datetime", nullable=false)
     */
    private $dhabertura;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dhFinalizacao", type="datetime", nullable=true)
     */
    private $dhfinalizacao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dhCancelamento", type="datetime", nullable=true)
     */
    private $dhcancelamento;

    /**
     * @var string
     *
     * @ORM\Column(name="obs", type="string", length=255, nullable=true)
     */
    private $obs;

    /**
     * @var \Application\Entity\CadFornecedor
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\CadFornecedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FK_fornecedor", referencedColumnName="PK_fornecedor")
     * })
     */
    private $CadFornecedor;
    
    /**
     * @var string
     */
    private $xFornecedor;
    
    function __construct() {
        $this->dhabertura = new \DateTime("now");
    }

    
    function getPkEntrada() {
        return $this->pkEntrada;
    }

    function getNdoc() {
        return $this->ndoc;
    }

    function getDhabertura() {
        return $this->dhabertura;
    }

    function getDhfinalizacao() {
        return $this->dhfinalizacao;
    }

    function getDhcancelamento() {
        return $this->dhcancelamento;
    }

    function getObs() {
        return $this->obs;
    }

    function getCadFornecedor() {
        return $this->CadFornecedor;
    }

    function getXFornecedor() {
        return $this->xFornecedor;
    }

    function setPkEntrada($pkEntrada) {
        $this->pkEntrada = $pkEntrada;
    }

    function setNdoc($ndoc) {
        $this->ndoc = $ndoc;
    }

    function setDhabertura($dhabertura) {
        $this->dhabertura = new \DateTime($dhabertura['date']);
    }

    function setDhfinalizacao($dhfinalizacao) {
        $this->dhfinalizacao = is_null($dhfinalizacao['date'])?null:new \DateTime($dhfinalizacao['date']);
    }

    function setDhcancelamento($dhcancelamento) {
        $this->dhcancelamento = is_null($dhcancelamento['date'])?null:new \DateTime($dhcancelamento['date']);
    }

    function setObs($obs) {
        $this->obs = $obs;
    }

    function setCadFornecedor($CadFornecedor) {
        $this->CadFornecedor = $CadFornecedor;
    }

    function setXFornecedor($xFornecedor) {
        $this->xFornecedor = $xFornecedor;
    }

}

