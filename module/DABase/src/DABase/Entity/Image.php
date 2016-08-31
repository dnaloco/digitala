<?php
namespace DABase\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\Entity\Base\ImageInterface;

/**
 * Imagem
 *
 * @ORM\Table(name="dabase_images")
 * @ORM\Entity
 */
class Image implements ImageInterface
{
    /**
     * id of image
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * title
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    protected $title;

    /**
     * title
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=100, nullable=false)
     */
    protected $author;

    /**
     * @var string
     *
     * @ORM\Column(name="licence", type="enum_licence")
     */
    protected $licence;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;

    /**
     * standard file
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    protected $name;

    /**
     * path of the image
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=100, nullable=false)
     */
    protected $path;

    /**
     * 150x150 if has
     * @var boolean
     *
     * @ORM\Column(name="has_thumb", type="boolean", nullable=true)
     */
    protected $hasThumb;

    /**
     * 360w if has
     * @var boolean
     *
     * @ORM\Column(name="has_small", type="boolean", nullable=true)
     */
    protected $hasSmall;

    /**
     * 800w if has
     * @var boolean
     *
     * @ORM\Column(name="has_medium", type="boolean", nullable=true)
     */
    protected $hasMedium;

    /**
     * 1080w if has
     * @var boolean
     *
     * @ORM\Column(name="has_large", type="boolean", nullable=true)
     */
    protected $hasLarge;

    /**
     * 1440w if has
     * @var boolean
     *
     * @ORM\Column(name="has_x_large", type="boolean", nullable=true)
     */
    protected $hasXLarge;

    /**
     * alt attribute of <img/>
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=100, nullable=true)
     */
    protected $alt;

    /**
     * default width of image
     * @var integer
     *
     * @ORM\Column(name="width", type="smallint", nullable=true)
     */
    protected $width;

    /**
     * default height of image
     * @var integer
     *
     * @ORM\Column(name="height", type="smallint", nullable=true)
     */
    protected $height;

    /**
     * filetype of image
     * @var string
     *
     * @ORM\Column(name="filetype", type="enum_imagefiletype", nullable=false)
     *
     *
     */
    protected $filetype;

    /**
     * when image was created
     * @var \DateTime
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
     * Gets the id of image.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets the title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title.
     *
     * @param string $title the title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Gets the title.
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets the title.
     *
     * @param string $author the author
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
     * @return string
     */
    public function getLicence()
    {
        return $this->licence;
    }

    /**
     * Sets the value of licence.
     *
     * @param string $licence the licence
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
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the value of description.
     *
     * @param string $description the description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets the standard file.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the standard file.
     *
     * @param string $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the path of the image.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Sets the path of the image.
     *
     * @param string $path the path
     *
     * @return self
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Gets the 150x150 if has.
     *
     * @return boolean
     */
    public function getHasThumb()
    {
        return $this->hasThumb;
    }

    /**
     * Sets the 150x150 if has.
     *
     * @param boolean $hasThumb the has thumb
     *
     * @return self
     */
    public function setHasThumb($hasThumb)
    {
        $this->hasThumb = $hasThumb;

        return $this;
    }

    /**
     * Gets the 360w if has.
     *
     * @return boolean
     */
    public function getHasSmall()
    {
        return $this->hasSmall;
    }

    /**
     * Sets the 360w if has.
     *
     * @param boolean $hasSmall the has small
     *
     * @return self
     */
    public function setHasSmall($hasSmall)
    {
        $this->hasSmall = $hasSmall;

        return $this;
    }

    /**
     * Gets the 800w if has.
     *
     * @return boolean
     */
    public function getHasMedium()
    {
        return $this->hasMedium;
    }

    /**
     * Sets the 800w if has.
     *
     * @param boolean $hasMedium the has medium
     *
     * @return self
     */
    public function setHasMedium($hasMedium)
    {
        $this->hasMedium = $hasMedium;

        return $this;
    }

    /**
     * Gets the 1080w if has.
     *
     * @return boolean
     */
    public function getHasLarge()
    {
        return $this->hasLarge;
    }

    /**
     * Sets the 1080w if has.
     *
     * @param boolean $hasLarge the has large
     *
     * @return self
     */
    public function setHasLarge($hasLarge)
    {
        $this->hasLarge = $hasLarge;

        return $this;
    }

    /**
     * Gets the 1440w if has.
     *
     * @return boolean
     */
    public function getHasXLarge()
    {
        return $this->hasXLarge;
    }

    /**
     * Sets the 1440w if has.
     *
     * @param boolean $hasXLarge the has xlarge
     *
     * @return self
     */
    public function setHasXLarge($hasXLarge)
    {
        $this->hasXLarge = $hasXLarge;

        return $this;
    }

    /**
     * Gets the alt attribute of <img/>.
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Sets the alt attribute of <img/>.
     *
     * @param string $alt the alt
     *
     * @return self
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Gets the default width of image.
     *
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Sets the default width of image.
     *
     * @param integer $width the width
     *
     * @return self
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Gets the default height of image.
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Sets the default height of image.
     *
     * @param integer $height the height
     *
     * @return self
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Gets the filetype of image.
     *
     * @return string
     */
    public function getFiletype()
    {
        return $this->filetype;
    }

    /**
     * Sets the filetype of image.
     *
     * @param string $filetype the filetype
     *
     * @return self
     */
    public function setFiletype($filetype)
    {
        $this->filetype = $filetype;

        return $this;
    }

    /**
     * Gets the when image was created.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

}
