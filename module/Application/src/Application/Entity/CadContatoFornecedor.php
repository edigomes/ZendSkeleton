<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CadContatoFornecedor
 *
 * @ORM\Table(name="CAD_contato_fornecedor", indexes={@ORM\Index(name="FK_cliente", columns={"FK_fornecedor"})})
 * @ORM\Entity
 */
class CadContatoFornecedor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PK_contato", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pkContato;

    /**
     * @var integer
     *
     * @ORM\Column(name="FK_fornecedor", type="integer", nullable=false)
     */
    private $fkFornecedor;

    /**
     * @var string
     *
     * @ORM\Column(name="xNome", type="string", length=60, nullable=false)
     */
    private $xnome;

    /**
     * @var string
     *
     * @ORM\Column(name="fone", type="string", length=20, nullable=false)
     */
    private $fone;


}

