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

    

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of title.
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the value of title.
     *
     * @param mixed $title the title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Gets the value of author.
     *
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets the value of author.
     *
     * @param mixed $author the author
     *
     * @return self
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Gets the value of licence.
     *
     * @return mixed
     */
    public function getLicence()
    {
        return $this->licence;
    }

    /**
     * Sets the value of licence.
     *
     * @param mixed $licence the licence
     *
     * @return self
     */
    public function setLicence($licence)
    {
        $this->licence = $licence;

        return $this;
    }

    /**
     * Gets the value of description.
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the value of description.
     *
     * @param mixed $description the description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of path.
     *
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Sets the value of path.
     *
     * @param mixed $path the path
     *
     * @return self
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Gets the value of hasThumb.
     *
     * @return mixed
     */
    public function getHasThumb()
    {
        return $this->hasThumb;
    }

    /**
     * Sets the value of hasThumb.
     *
     * @param mixed $hasThumb the has thumb
     *
     * @return self
     */
    public function setHasThumb($hasThumb)
    {
        $this->hasThumb = $hasThumb;

        return $this;
    }

    /**
     * Gets the value of hasSmall.
     *
     * @return mixed
     */
    public function getHasSmall()
    {
        return $this->hasSmall;
    }

    /**
     * Sets the value of hasSmall.
     *
     * @param mixed $hasSmall the has small
     *
     * @return self
     */
    public function setHasSmall($hasSmall)
    {
        $this->hasSmall = $hasSmall;

        return $this;
    }

    /**
     * Gets the value of hasMedium.
     *
     * @return mixed
     */
    public function getHasMedium()
    {
        return $this->hasMedium;
    }

    /**
     * Sets the value of hasMedium.
     *
     * @param mixed $hasMedium the has medium
     *
     * @return self
     */
    public function setHasMedium($hasMedium)
    {
        $this->hasMedium = $hasMedium;

        return $this;
    }

    /**
     * Gets the value of hasLarge.
     *
     * @return mixed
     */
    public function getHasLarge()
    {
        return $this->hasLarge;
    }

    /**
     * Sets the value of hasLarge.
     *
     * @param mixed $hasLarge the has large
     *
     * @return self
     */
    public function setHasLarge($hasLarge)
    {
        $this->hasLarge = $hasLarge;

        return $this;
    }

    /**
     * Gets the value of hasXLarge.
     *
     * @return mixed
     */
    public function getHasXLarge()
    {
        return $this->hasXLarge;
    }

    /**
     * Sets the value of hasXLarge.
     *
     * @param mixed $hasXLarge the has xlarge
     *
     * @return self
     */
    public function setHasXLarge($hasXLarge)
    {
        $this->hasXLarge = $hasXLarge;

        return $this;
    }

    /**
     * Gets the value of alt.
     *
     * @return mixed
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Sets the value of alt.
     *
     * @param mixed $alt the alt
     *
     * @return self
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Gets the value of width.
     *
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Sets the value of width.
     *
     * @param mixed $width the width
     *
     * @return self
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Gets the value of height.
     *
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Sets the value of height.
     *
     * @param mixed $height the height
     *
     * @return self
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Gets the value of filetype.
     *
     * @return mixed
     */
    public function getFiletype()
    {
        return $this->filetype;
    }

    /**
     * Sets the value of filetype.
     *
     * @param mixed $filetype the filetype
     *
     * @return self
     */
    public function setFiletype($filetype)
    {
        $this->filetype = $filetype;

        return $this;
    }

    /**
     * Gets the value of createdAt.
     *
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets the value of createdAt.
     *
     * @param mixed $createdAt the created at
     *
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
