<?php
namespace Application\Entity;
  
use Doctrine\ORM\Mapping as ORM;
/**
 * Content
 *
 * @ORM\Table(name="content")
 * @ORM\Entity
 */
class Content {
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
     * @ORM\Column(name="content", type="string", length=127, nullable=false)
     */
    private $content;
    
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    public function getContent() {
        return $this->content;
    }
    public function setContent($content) {
        $this->content = $content;
        return $this;
    }
}