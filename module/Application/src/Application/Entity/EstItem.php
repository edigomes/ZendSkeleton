<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstItem
 *
 * @ORM\Table(name="EST_item")
 * @ORM\Entity
 */
class EstItem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PK_item", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $PK_item;

    /**
     * @var integer
     *
     * @ORM\Column(name="FK_grupo", type="integer", nullable=true)
     */
    private $FK_grupo;

    /**
     * @var integer
     *
     * @ORM\Column(name="FK_unidade", type="integer", nullable=true)
     */
    private $FK_unidade;

    /**
     * @var integer
     *
     * @ORM\Column(name="FK_fabricante", type="integer", nullable=true)
     */
    private $FK_fabricante;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dhCadastro", type="datetime", nullable=false)
     */
    private $dhCadastro;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=20, nullable=true)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="xProd", type="string", length=120, nullable=true)
     */
    private $xProd;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=20, nullable=true)
     */
    private $marca;

    /**
     * @var integer
     *
     * @ORM\Column(name="cor", type="integer", nullable=true)
     */
    private $cor;

    /**
     * @var integer
     *
     * @ORM\Column(name="NCM", type="integer", nullable=false)
     */
    private $NCM;

    /**
     * @var integer
     *
     * @ORM\Column(name="cEAN", type="integer", nullable=true)
     */
    private $cEAN;

    /**
     * @var integer
     *
     * @ORM\Column(name="origem", type="integer", nullable=false)
     */
    private $origem;

    /**
     * @var float
     *
     * @ORM\Column(name="quantidade", type="float", precision=15, scale=3, nullable=false)
     */
    private $quantidade;

    /**
     * @var boolean
     *
     * @ORM\Column(name="bloqueado", type="boolean", nullable=true)
     */
    private $bloqueado;

    /**
     * @var string
     *
     * @ORM\Column(name="natureza", type="string", length=3, nullable=false)
     */
    private $natureza;

    /**
     * @var string
     *
     * @ORM\Column(name="CST", type="string", length=2, nullable=false)
     */
    private $CST;

    /**
     * @var float
     *
     * @ORM\Column(name="custo", type="float", precision=15, scale=4, nullable=false)
     */
    private $custo;

    /**
     * @var float
     *
     * @ORM\Column(name="pIPI", type="float", precision=15, scale=2, nullable=true)
     */
    private $pIPI;

    /**
     * @var float
     *
     * @ORM\Column(name="pST", type="float", precision=15, scale=2, nullable=true)
     */
    private $pST;

    /**
     * @var float
     *
     * @ORM\Column(name="pDifAliquota", type="float", precision=15, scale=2, nullable=true)
     */
    private $pDifAliquota;

    /**
     * @var float
     *
     * @ORM\Column(name="pFrete", type="float", precision=15, scale=2, nullable=true)
     */
    private $pFrete;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isentoPisCofins", type="boolean", nullable=true)
     */
    private $isentoPisCofins;

    /**
     * @var float
     *
     * @ORM\Column(name="pDescMaximo", type="float", precision=15, scale=2, nullable=true)
     */
    private $pDescMaximo;

    /**
     * @var float
     *
     * @ORM\Column(name="vUnTrib", type="float", precision=15, scale=4, nullable=false)
     */
    private $vUnTrib;
    
    function __construct() {
        $this->dhCadastro = new \DateTime('now');
    }

    
    function getPK_item() {
        return $this->PK_item;
    }

    function getFK_grupo() {
        return $this->FK_grupo;
    }

    function getFK_unidade() {
        return $this->FK_unidade;
    }

    function getFK_fabricante() {
        return $this->FK_fabricante;
    }

    /*function getDhCadastro() {
        return $this->dhCadastro;
    }*/

    function getCodigo() {
        return $this->codigo;
    }

    function getXProd() {
        return $this->xProd;
    }

    function getMarca() {
        return $this->marca;
    }

    function getCor() {
        return $this->cor;
    }

    function getNCM() {
        return $this->NCM;
    }

    function getCEAN() {
        return $this->cEAN;
    }

    function getOrigem() {
        return $this->origem;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function getBloqueado() {
        return $this->bloqueado;
    }

    function getNatureza() {
        return $this->natureza;
    }

    function getCST() {
        return $this->CST;
    }

    function getCusto() {
        return $this->custo;
    }

    function getPIPI() {
        return $this->pIPI;
    }

    function getPST() {
        return $this->pST;
    }

    function getPDifAliquota() {
        return $this->pDifAliquota;
    }

    function getPFrete() {
        return $this->pFrete;
    }

    function getIsentoPisCofins() {
        return $this->isentoPisCofins;
    }

    function getPDescMaximo() {
        return $this->pDescMaximo;
    }

    function getVUnTrib() {
        return $this->vUnTrib;
    }

    function setPK_item($PK_item) {
        $this->PK_item = $PK_item;
    }

    function setFK_grupo($FK_grupo) {
        $this->FK_grupo = $FK_grupo;
    }

    function setFK_unidade($FK_unidade) {
        $this->FK_unidade = $FK_unidade;
    }

    function setFK_fabricante($FK_fabricante) {
        $this->FK_fabricante = $FK_fabricante;
    }

    /*function setDhCadastro($dhCadastro) {
        $this->dhCadastro = new \DateTime($dhCadastro['date']);
    }*/

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setXProd($xProd) {
        $this->xProd = $xProd;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setCor($cor) {
        $this->cor = $cor;
    }

    function setNCM($NCM) {
        $this->NCM = $NCM;
    }

    function setCEAN($cEAN) {
        $this->cEAN = $cEAN;
    }

    function setOrigem($origem) {
        $this->origem = $origem;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    function setBloqueado($bloqueado) {
        $this->bloqueado = $bloqueado;
    }

    function setNatureza($natureza) {
        $this->natureza = $natureza;
    }

    function setCST($CST) {
        $this->CST = $CST;
    }

    function setCusto($custo) {
        $this->custo = $custo;
    }

    function setPIPI($pIPI) {
        $this->pIPI = $pIPI;
    }

    function setPST($pST) {
        $this->pST = $pST;
    }

    function setPDifAliquota($pDifAliquota) {
        $this->pDifAliquota = $pDifAliquota;
    }

    function setPFrete($pFrete) {
        $this->pFrete = $pFrete;
    }

    function setIsentoPisCofins($isentoPisCofins) {
        $this->isentoPisCofins = $isentoPisCofins;
    }

    function setPDescMaximo($pDescMaximo) {
        $this->pDescMaximo = $pDescMaximo;
    }

    function setVUnTrib($vUnTrib) {
        $this->vUnTrib = $vUnTrib;
    }

}

