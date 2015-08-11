<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComVenda
 *
 * @ORM\Table(name="COM_venda")
 * @ORM\Entity
 */
class ComVenda
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PK_venda", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pkVenda;

    /**
     * @var \Application\Entity\CadCliente
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\CadCliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FK_cliente", referencedColumnName="PK_cliente")
     * })
     */
    private $CadCliente;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dhAbertura", type="datetime", nullable=true)
     */
    private $dhabertura = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dhFechamento", type="datetime", nullable=true)
     */
    private $dhfechamento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dhCancelamento", type="datetime", nullable=true)
     */
    private $dhcancelamento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dhUltAlteracao", type="datetime", nullable=true)
     */
    private $dhultalteracao;
    
    function getPkVenda() {
        return $this->pkVenda;
    }

    function getCadCliente() {
        return $this->CadCliente;
    }

    function getDhabertura() {
        return $this->dhabertura;
    }

    function getDhfechamento() {
        return $this->dhfechamento;
    }

    function getDhcancelamento() {
        return $this->dhcancelamento;
    }

    function getDhultalteracao() {
        return $this->dhultalteracao;
    }

    function setPkVenda($pkVenda) {
        $this->pkVenda = $pkVenda;
    }

    function setCadCliente(\Application\Entity\CadCliente $CadCliente) {
        $this->CadCliente = $CadCliente;
    }

    function setDhabertura(\DateTime $dhabertura) {
        $this->dhabertura = new \DateTime($dhabertura['date']);
    }

    function setDhfechamento(\DateTime $dhfechamento) {
        $this->dhfechamento = is_null($dhfechamento['date'])?null:new \DateTime($dhfechamento['date']);
    }

    function setDhcancelamento(\DateTime $dhcancelamento) {
        $this->dhcancelamento = is_null($dhcancelamento['date'])?null:new \DateTime($dhcancelamento['date']);
    }

    function setDhultalteracao(\DateTime $dhultalteracao) {
        $this->dhultalteracao = is_null($dhultalteracao['date'])?null:new \DateTime($dhultalteracao['date']);
    }
    
}

