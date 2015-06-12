<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subcontent
 *
 * @ORM\Table(name="subcontent", indexes={@ORM\Index(name="content_id", columns={"content_id"})})
 * @ORM\Entity
 */
class Subcontent
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255, nullable=false)
     */
    private $content;

    /**
     * @var \Application\Entity\Content
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Content")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="content_id", referencedColumnName="id")
     * })
     */
    private $content2;
    
    function getId() {
        return $this->id;
    }

    function getContent() {
        return $this->content;
    }

    function getContent2() {
        return $this->content2;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setContent2(\Application\Entity\Content $content2) {
        $this->content2 = $content2;
    }

}

