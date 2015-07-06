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
    private $PK_contato;

    /**
     * @var integer
     *
     * @ORM\Column(name="FK_fornecedor", type="integer", nullable=false)
     */
    private $FK_fornecedor;

    /**
     * @var string
     *
     * @ORM\Column(name="xNome", type="string", length=60, nullable=false)
     */
    private $xNome;

    /**
     * @var string
     *
     * @ORM\Column(name="fone", type="string", length=20, nullable=false)
     */
    private $fone;
    
    function getPK_contato() {
        return $this->PK_contato;
    }

    function getFK_fornecedor() {
        return $this->FK_fornecedor;
    }

    function getXNome() {
        return $this->xNome;
    }

    function getFone() {
        return $this->fone;
    }

    function setPK_contato($PK_contato) {
        $this->PK_contato = $PK_contato;
    }

    function setFK_fornecedor($FK_fornecedor) {
        $this->FK_fornecedor = $FK_fornecedor;
    }

    function setXNome($xNome) {
        $this->xNome = $xNome;
    }

    function setFone($fone) {
        $this->fone = $fone;
    }

}

