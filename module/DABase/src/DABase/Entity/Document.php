<?php
namespace DABase\Entity;

use DACore\IEntities\Base\DocumentInterface;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Documento
 *
 * @ORM\Table(name="dabase_documents")
 * @ORM\Entity
 *
 * @ORM\HasLifecycleCallbacks
 */
class Document implements DocumentInterface
{
	/**
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
	private $id;

    /**
     *
     * @ORM\Column(name="type", type="enum_documenttype", nullable=true)
     */
    private $type;

    /**
     *
     * @ORM\Column(name="reference", type="string", nullable=false, unique=true)
     */
    private $reference;

	/**
     *
     * @ORM\Column(name="field_1", type="string", nullable=true)
     */
	private $field1;

	/**
     *
     * @ORM\Column(name="field_2", type="string", nullable=true)
     */
	private $field2;

	/**
     *
     * @ORM\Column(name="field_3", type="string", nullable=true)
     */
	private $field3;

	/**
     *
     * @ORM\Column(name="field_4", type="string", nullable=true)
     */
	private $field4;

	/**
     *
     * @ORM\Column(name="field_5", type="string", nullable=true)
     */
	private $field5;

	/**
     *
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\ImageInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_document_images",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="image_id", referencedColumnName="id")}
     *      )
     **/
	private $images;

     /**
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\FileInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_document_files",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="file_id", referencedColumnName="id")}
     *      )
     **/
     private $files;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Base\CompanyInterface", inversedBy="documents")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
	private $company;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Base\PersonInterface", inversedBy="documents")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
	private $person;

     /**
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
     private $createdAt;

     /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
     private $updatedAt;

	public function __construct(array $data)
	{
          $this->createdAt = new \DateTime("now");
          $this->updatedAt = new \DateTime("now");

          $this->images = new ArrayCollection();
          $this->files = new ArrayCollection();

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
     * Gets the value of type.
     *
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the value of type.
     *
     * @param mixed $type the type
     *
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Gets the value of reference.
     *
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Sets the value of reference.
     *
     * @param mixed $reference the reference
     *
     * @return self
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Gets the value of field1.
     *
     * @return mixed
     */
    public function getField1()
    {
        return $this->field1;
    }

    /**
     * Sets the value of field1.
     *
     * @param mixed $field1 the field1
     *
     * @return self
     */
    public function setField1($field1)
    {
        $this->field1 = $field1;

        return $this;
    }

    /**
     * Gets the value of field2.
     *
     * @return mixed
     */
    public function getField2()
    {
        return $this->field2;
    }

    /**
     * Sets the value of field2.
     *
     * @param mixed $field2 the field2
     *
     * @return self
     */
    public function setField2($field2)
    {
        $this->field2 = $field2;

        return $this;
    }

    /**
     * Gets the value of field3.
     *
     * @return mixed
     */
    public function getField3()
    {
        return $this->field3;
    }

    /**
     * Sets the value of field3.
     *
     * @param mixed $field3 the field3
     *
     * @return self
     */
    public function setField3($field3)
    {
        $this->field3 = $field3;

        return $this;
    }

    /**
     * Gets the value of field4.
     *
     * @return mixed
     */
    public function getField4()
    {
        return $this->field4;
    }

    /**
     * Sets the value of field4.
     *
     * @param mixed $field4 the field4
     *
     * @return self
     */
    public function setField4($field4)
    {
        $this->field4 = $field4;

        return $this;
    }

    /**
     * Gets the value of field5.
     *
     * @return mixed
     */
    public function getField5()
    {
        return $this->field5;
    }

    /**
     * Sets the value of field5.
     *
     * @param mixed $field5 the field5
     *
     * @return self
     */
    public function setField5($field5)
    {
        $this->field5 = $field5;

        return $this;
    }

    /**
     * Gets the value of images.
     *
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Sets the value of images.
     *
     * @param mixed $images the images
     *
     * @return self
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * Gets the value of files.
     *
     * @return mixed
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * Sets the value of files.
     *
     * @param mixed $files the files
     *
     * @return self
     */
    public function setFiles($files)
    {
        $this->files = $files;

        return $this;
    }

    /**
     * Gets the value of company.
     *
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Sets the value of company.
     *
     * @param mixed $company the company
     *
     * @return self
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Gets the value of person.
     *
     * @return mixed
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Sets the value of person.
     *
     * @param mixed $person the person
     *
     * @return self
     */
    public function setPerson($person)
    {
        $this->person = $person;

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

    /**
     * Gets the value of updatedAt.
     *
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets the value of updatedAt.
     *
     * @param mixed $updatedAt the updated at
     *
     * @return self
     *
     * @ORM\PrePersist
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime('now');

        return $this;
    }
}