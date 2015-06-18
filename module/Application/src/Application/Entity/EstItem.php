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
    private $pkItem;

    /**
     * @var integer
     *
     * @ORM\Column(name="FK_grupo", type="integer", nullable=false)
     */
    private $fkGrupo;

    /**
     * @var integer
     *
     * @ORM\Column(name="FK_unidade", type="integer", nullable=false)
     */
    private $fkUnidade;

    /**
     * @var integer
     *
     * @ORM\Column(name="FK_fabricante", type="integer", nullable=false)
     */
    private $fkFabricante;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dhCadastro", type="datetime", nullable=false)
     */
    private $dhcadastro = 'CURRENT_TIMESTAMP';

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
    private $xprod;

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
    private $ncm;

    /**
     * @var integer
     *
     * @ORM\Column(name="cEAN", type="integer", nullable=true)
     */
    private $cean;

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
    private $cst;

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
    private $pipi;

    /**
     * @var float
     *
     * @ORM\Column(name="pST", type="float", precision=15, scale=2, nullable=true)
     */
    private $pst;

    /**
     * @var float
     *
     * @ORM\Column(name="pDifAliquota", type="float", precision=15, scale=2, nullable=true)
     */
    private $pdifaliquota;

    /**
     * @var float
     *
     * @ORM\Column(name="pFrete", type="float", precision=15, scale=2, nullable=true)
     */
    private $pfrete;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isentoPisCofins", type="boolean", nullable=true)
     */
    private $isentopiscofins;

    /**
     * @var float
     *
     * @ORM\Column(name="pDescMaximo", type="float", precision=15, scale=2, nullable=true)
     */
    private $pdescmaximo;

    /**
     * @var float
     *
     * @ORM\Column(name="vUnTrib", type="float", precision=15, scale=4, nullable=false)
     */
    private $vuntrib;


}

