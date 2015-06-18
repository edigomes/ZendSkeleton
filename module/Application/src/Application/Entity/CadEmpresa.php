<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CadEmpresa
 *
 * @ORM\Table(name="CAD_empresa")
 * @ORM\Entity
 */
class CadEmpresa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PK_cliente", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pkCliente;

    /**
     * @var integer
     *
     * @ORM\Column(name="FK_usuario", type="integer", nullable=true)
     */
    private $fkUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="xNome", type="string", length=255, nullable=false)
     */
    private $xnome;

    /**
     * @var string
     *
     * @ORM\Column(name="xFant", type="string", length=60, nullable=false)
     */
    private $xfant;

    /**
     * @var string
     *
     * @ORM\Column(name="CNPJ_CPF", type="string", length=255, nullable=false)
     */
    private $cnpjCpf;

    /**
     * @var string
     *
     * @ORM\Column(name="xLgr", type="string", length=255, nullable=false)
     */
    private $xlgr;

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
    private $xbairro;

    /**
     * @var integer
     *
     * @ORM\Column(name="cMun", type="integer", nullable=false)
     */
    private $cmun;

    /**
     * @var integer
     *
     * @ORM\Column(name="UF", type="integer", nullable=false)
     */
    private $uf;

    /**
     * @var integer
     *
     * @ORM\Column(name="CEP", type="integer", nullable=false)
     */
    private $cep;

    /**
     * @var string
     *
     * @ORM\Column(name="IE", type="string", length=9, nullable=true)
     */
    private $ie;

    /**
     * @var integer
     *
     * @ORM\Column(name="CRT", type="integer", nullable=false)
     */
    private $crt;


}

