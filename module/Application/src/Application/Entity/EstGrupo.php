<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstGrupo
 *
 * @ORM\Table(name="EST_grupo")
 * @ORM\Entity
 */
class EstGrupo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PK_grupo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pkGrupo;

    /**
     * @var string
     *
     * @ORM\Column(name="xGrupo", type="string", length=60, nullable=false)
     */
    private $xgrupo;


}

