<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstUnidade
 *
 * @ORM\Table(name="EST_unidade")
 * @ORM\Entity
 */
class EstUnidade
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PK_unidade", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pkUnidade;

    /**
     * @var string
     *
     * @ORM\Column(name="xUnidade", type="string", length=60, nullable=false)
     */
    private $xunidade;


}

