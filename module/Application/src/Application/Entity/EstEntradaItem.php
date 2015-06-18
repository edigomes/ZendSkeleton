<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstEntradaItem
 *
 * @ORM\Table(name="EST_entrada_item", indexes={@ORM\Index(name="FK_produto", columns={"FK_item"}), @ORM\Index(name="FK_producao", columns={"FK_entrada"})})
 * @ORM\Entity
 */
class EstEntradaItem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PK_entrada_item", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pkEntradaItem;

    /**
     * @var integer
     *
     * @ORM\Column(name="FK_entrada", type="integer", nullable=false)
     */
    private $fkEntrada;

    /**
     * @var integer
     *
     * @ORM\Column(name="FK_item", type="integer", nullable=false)
     */
    private $fkItem;

    /**
     * @var float
     *
     * @ORM\Column(name="qTrib", type="float", precision=15, scale=3, nullable=false)
     */
    private $qtrib;

    /**
     * @var float
     *
     * @ORM\Column(name="vUnTrib", type="float", precision=15, scale=4, nullable=false)
     */
    private $vuntrib;


}

