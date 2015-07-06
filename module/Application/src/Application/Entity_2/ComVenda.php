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
     * @var integer
     *
     * @ORM\Column(name="FK_cliente", type="integer", nullable=false)
     */
    private $fkCliente;

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


}

