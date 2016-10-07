<?php
namespace DABase\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Base\ImageInterface;

/**
 * Imagem
 *
 * @ORM\Table(name="dabase_images")
 * @ORM\Entity
 */
class Image implements ImageInterface
{
    /**
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    protected $title;

    /**
     * @ORM\Column(name="author", type="string", length=100, nullable=false)
     */
    protected $author;

    /**
     *
     * @ORM\Column(name="licence", type="enum_licence")
     */
    protected $licence;

    /**
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;

    /**
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    protected $name;

    /**
     *
     * @ORM\Column(name="path", type="string", length=100, nullable=false)
     */
    protected $path;

    /**
     *
     * @ORM\Column(name="has_thumb", type="boolean", nullable=true)
     */
    protected $hasThumb;

    /**
     *
     * @ORM\Column(name="has_small", type="boolean", nullable=true)
     */
    protected $hasSmall;

    /**
     *
     * @ORM\Column(name="has_medium", type="boolean", nullable=true)
     */
    protected $hasMedium;

    /**
     *
     * @ORM\Column(name="has_large", type="boolean", nullable=true)
     */
    protected $hasLarge;

    /**
     *
     * @ORM\Column(name="has_x_large", type="boolean", nullable=true)
     */
    protected $hasXLarge;

    /**
     *
     * @ORM\Column(name="alt", type="string", length=100, nullable=true)
     */
    protected $alt;

    /**
     * @ORM\Column(name="width", type="smallint", nullable=true)
     */
    protected $width;

    /**
     * @ORM\Column(name="height", type="smallint", nullable=true)
     */
    protected $height;

    /**
     * @ORM\Column(name="filetype", type="enum_imagefiletype", nullable=false)
     *
     *
     */
    protected $filetype;

    /**
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    protected $createdAt;

    public function __construct(array $data = array())
    {
        $this->createdAt = new \DateTime("now");
        (new Hydrator\ClassMethods)->hydrate($data, $this);
    }


}
