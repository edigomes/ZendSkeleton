<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CadCliente
 *
 * @ORM\Table(name="CAD_cliente")
 * @ORM\Entity
 */
class CadCliente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PK_cliente", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $PK_cliente;

    /**
     * @var integer
     *
     * @ORM\Column(name="FK_usuario", type="integer", nullable=true)
     */
    private $FK_usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="xNome", type="string", length=255, nullable=false)
     */
    private $xNome;

    /**
     * @var string
     *
     * @ORM\Column(name="xFant", type="string", length=60, nullable=false)
     */
    private $xFant;

    /**
     * @var string
     *
     * @ORM\Column(name="CNPJ_CPF", type="string", length=255, nullable=false)
     */
    private $CNPJ_CPF;

    /**
     * @var string
     *
     * @ORM\Column(name="xLgr", type="string", length=255, nullable=false)
     */
    private $xLgr;

    /**
     * @var string
     *
     * @ORM\Column(name="fone", type="string", length=60, nullable=false)
     */
    private $fone;

    /**
     * @var string
     *
     * @ORM\Column(name="nro", type="string", length=60, nullable=false)
     */
    private $nro;

    /**
     * @var string
     *
     * @ORM\Column(name="xBairro", type="string", length=60, nullable=false)
     */
    private $xBairro;

    /**
     * @var integer
     *
     * @ORM\Column(name="cMun", type="integer", nullable=false)
     */
    private $cMun;

    /**
     * @var integer
     *
     * @ORM\Column(name="UF", type="integer", nullable=false)
     */
    private $UF;

    /**
     * @var integer
     *
     * @ORM\Column(name="CEP", type="integer", nullable=false)
     */
    private $CEP;

    /**
     * @var string
     *
     * @ORM\Column(name="IE", type="string", length=9, nullable=true)
     */
    private $IE;
    
    function getPK_cliente() {
        return $this->PK_cliente;
    }

    function getFK_usuario() {
        return $this->FK_usuario;
    }

    function getXNome() {
        return $this->xNome;
    }

    function getXFant() {
        return $this->xFant;
    }

    function getCNPJ_CPF() {
        return $this->CNPJ_CPF;
    }

    function getXLgr() {
        return $this->xLgr;
    }

    function getFone() {
        return $this->fone;
    }

    function getNro() {
        return $this->nro;
    }

    function getXBairro() {
        return $this->xBairro;
    }

    function getCMun() {
        return $this->cMun;
    }

    function getUF() {
        return $this->UF;
    }

    function getCEP() {
        return $this->CEP;
    }

    function getIE() {
        return $this->IE;
    }

    function setPK_cliente($PK_cliente) {
        $this->PK_cliente = $PK_cliente;
    }

    function setFK_usuario($FK_usuario) {
        $this->FK_usuario = $FK_usuario;
    }

    function setXNome($xNome) {
        $this->xNome = $xNome;
    }

    function setXFant($xFant) {
        $this->xFant = $xFant;
    }

    function setCNPJ_CPF($CNPJ_CPF) {
        $this->CNPJ_CPF = $CNPJ_CPF;
    }

    function setXLgr($xLgr) {
        $this->xLgr = $xLgr;
    }

    function setFone($fone) {
        $this->fone = $fone;
    }

    function setNro($nro) {
        $this->nro = $nro;
    }

    function setXBairro($xBairro) {
        $this->xBairro = $xBairro;
    }

    function setCMun($cMun) {
        $this->cMun = $cMun;
    }

    function setUF($UF) {
        $this->UF = $UF;
    }

    function setCEP($CEP) {
        $this->CEP = $CEP;
    }

    function setIE($IE) {
        $this->IE = $IE;
    }

}

