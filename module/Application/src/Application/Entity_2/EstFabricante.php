<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstFabricante
 *
 * @ORM\Table(name="EST_fabricante")
 * @ORM\Entity
 */
class EstFabricante
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PK_fabricante", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pkFabricante;

    /**
     * @var string
     *
     * @ORM\Column(name="xFabricante", type="string", length=60, nullable=false)
     */
    private $xfabricante;


}

