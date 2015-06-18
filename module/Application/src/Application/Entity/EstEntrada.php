<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstEntrada
 *
 * @ORM\Table(name="EST_entrada")
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
     * @var integer
     *
     * @ORM\Column(name="FK_fornecedor", type="integer", nullable=false)
     */
    private $fkFornecedor;

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
    private $dhabertura = 'CURRENT_TIMESTAMP';

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


}

