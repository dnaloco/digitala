<?php
namespace DABase\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
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
     * caption attribute of <img/>
     * @var string
     *
     * @ORM\Column(name="caption", type="string", length=100, nullable=true)
     */
    protected $caption;

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
     * @ORM\Column(name="filetype", type="enumimagetype", nullable=false)
     *
     *
     */
    protected $filetype;

    /**
     * when image was created
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected $createdAt;

    public function __construct(array $options = array())
    {
        $this->createdAt = new \DateTime("now");
        (new Hydrator\ClassMethods)->hydrate($options, $this);
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
     * Sets the id of image.
     *
     * @param integer $id the id
     *
     * @return self
     */
    protected function setId($id)
    {
        $this->id = $id;

        return $this;
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
    protected function setTitle($title)
    {
        $this->title = $title;

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
    protected function setName($name)
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
    protected function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Gets the 150x150 if has.
     *
     * @return boolean
     */
    public function hasThumb()
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
    protected function setHasThumb($hasThumb)
    {
        $this->hasThumb = $hasThumb;

        return $this;
    }

    /**
     * Gets the 360w if has.
     *
     * @return boolean
     */
    public function hasSmall()
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
    protected function setHasSmall($hasSmall)
    {
        $this->hasSmall = $hasSmall;

        return $this;
    }

    /**
     * Gets the 800w if has.
     *
     * @return boolean
     */
    public function hasMedium()
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
    protected function setHasMedium($hasMedium)
    {
        $this->hasMedium = $hasMedium;

        return $this;
    }

    /**
     * Gets the 1080w if has.
     *
     * @return boolean
     */
    public function hasLarge()
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
    protected function setHasLarge($hasLarge)
    {
        $this->hasLarge = $hasLarge;

        return $this;
    }

    /**
     * Gets the 1440w if has.
     *
     * @return boolean
     */
    public function hasXLarge()
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
    protected function setHasXLarge($hasXLarge)
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
    protected function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Gets the caption attribute of <img/>.
     *
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Sets the caption attribute of <img/>.
     *
     * @param string $caption the caption
     *
     * @return self
     */
    protected function setCaption($caption)
    {
        $this->caption = $caption;

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
    protected function setWidth($width)
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
    protected function setHeight($height)
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
    protected function setFiletype($filetype)
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

    /**
     * Sets the when image was created.
     *
     * @param \DateTime $createdAt the created at
     *
     * @return self
     */
    protected function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
