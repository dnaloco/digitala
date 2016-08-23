<?php
namespace DABase\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\Entity\Base\ImageInterface

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

    protected $author;

    protected $licence;

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

}
