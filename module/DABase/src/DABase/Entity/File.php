<?php
namespace DABase\Entity;

use DACore\IEntities\Base\FileInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Arquivo
 *
 * @ORM\Table(name="dabase_files")
 * @ORM\Entity
 */
class File implements FileInterface
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
     * @ORM\Column(name="title", type="string", length=100, nullable=true)
     */
	protected $title;

	/**
     *
     * @ORM\Column(name="author", type="string", length=100, nullable=true)
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
     * @ORM\Column(name="name", type="string", nullable=false)
     */
	protected $name;

	/**
     *
     * @ORM\Column(name="path", type="string", nullable=false)
     */
	protected $path;

	/**
     *
     * @ORM\Column(name="filetype", type="enum_filetype", nullable=true)
     */
	protected $filetype;

	public function __construct(array $data)
	{
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
}