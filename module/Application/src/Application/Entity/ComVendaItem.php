<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComVendaItem
 *
 * @ORM\Table(name="COM_venda_item", indexes={@ORM\Index(name="COM_venda_item_fk1", columns={"FK_item"}), @ORM\Index(name="COM_venda_item_fk2", columns={"FK_venda"})})
 * @ORM\Entity
 */
class ComVendaItem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PK_venda_item", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pkVendaItem;

    /**
     * @var integer
     *
     * @ORM\Column(name="FK_item", type="integer", nullable=false)
     */
    private $fkItem;

    /**
     * @var integer
     *
     * @ORM\Column(name="FK_venda", type="integer", nullable=false)
     */
    private $fkVenda;

    /**
     * @var string
     *
     * @ORM\Column(name="qTrib", type="decimal", precision=15, scale=3, nullable=false)
     */
    private $qtrib;

    /**
     * @var string
     *
     * @ORM\Column(name="vUnTrib", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $vuntrib;

    /**
     * @var string
     *
     * @ORM\Column(name="vDesc", type="decimal", precision=15, scale=4, nullable=true)
     */
    private $vdesc;


}

