<?php
namespace DABase\Entity;

use DACore\Entity\Base\VideoInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Video
 *
 * @ORM\Table(name="dabase_videos")
 * @ORM\Entity
 */
class Video implements VideoInterface
{
	/**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
	protected $id;

	/**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=true)
     */
	protected $title;

	/**
     * @var string
     *
     * @ORM\Column(name="address", type="string", nullable=false)
     */
	protected $address;

	/**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=100, nullable=true)
     */
	protected $author;

	/**
     * @var string
     *
     * @ORM\Column(name="licence", type="enum_licence", nullable=true)
     */
	protected $licence;

	/**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
	protected $description;

	public function __construct(array $data)
	{
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

    /**
     * Gets the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets the value of title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the value of title.
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
     * Gets the value of address.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the value of address.
     *
     * @param string $address the address
     *
     * @return self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Gets the value of author.
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets the value of author.
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
}