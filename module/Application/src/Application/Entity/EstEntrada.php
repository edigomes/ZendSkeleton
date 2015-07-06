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
     * @var \DateTime
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
    private $fkFornecedor;
    
    /**
     * @var string
     */
    private $xFornecedor;
    
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

    function getFkFornecedor() {
        return $this->fkFornecedor;
    }

    function setPkEntrada($pkEntrada) {
        $this->pkEntrada = $pkEntrada;
    }

    function setNdoc($ndoc) {
        $this->ndoc = $ndoc;
    }

    function setDhabertura(\DateTime $dhabertura) {
        $this->dhabertura = $dhabertura;
    }

    function setDhfinalizacao(\DateTime $dhfinalizacao) {
        $this->dhfinalizacao = $dhfinalizacao;
    }

    function setDhcancelamento(\DateTime $dhcancelamento) {
        $this->dhcancelamento = $dhcancelamento;
    }

    function setObs($obs) {
        $this->obs = $obs;
    }

    function setFkFornecedor(\Application\Entity\CadFornecedor $fkFornecedor) {
        $this->fkFornecedor = $fkFornecedor;
    }
    
    function getXFornecedor() {
        return $this->fkFornecedor->getXNome();
    }
    
    function setXFornecedor($xNome) {
        $this->fkFornecedor->setXNome($xNome);
    }

}

