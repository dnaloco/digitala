<?php
namespace DABase\Entity;

use DACore\Entity\Base\DocumentInterface;

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
     * @ORM\Column(name="type", type="enum_documenttype", nullable=true)
     */
    protected $type;

	/**
     * @var string
     *
     * complemento
     *
     * @ORM\Column(name="field_1", type="string", nullable=false)
     */
	protected $field1;

	/**
     * @var string
     *
     * complemento
     *
     * @ORM\Column(name="field_2", type="string", nullable=true)
     */
	protected $field2;

	/**
     * @var string
     *
     * complemento
     *
     * @ORM\Column(name="field_3", type="string", nullable=true)
     */
	protected $field3;

	/**
     * @var string
     *
     * complemento
     *
     * @ORM\Column(name="field_4", type="string", nullable=true)
     */
	protected $field4;

	/**
     * @var string
     *
     * complemento
     *
     * @ORM\Column(name="field_5", type="string", nullable=true)
     */
	protected $field5;

	/**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * imagens
     *
     * @ORM\ManyToMany(targetEntity="DACore\Entity\Base\ImageInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_document_images",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="image_id", referencedColumnName="id")}
     *      )
     **/
	protected $images;

     /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * imagens
     *
     * @ORM\ManyToMany(targetEntity="DACore\Entity\Base\FileInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_document_files",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="file_id", referencedColumnName="id")}
     *      )
     **/
     protected $files;

	/**
     * @var \DACore\Entity\Base\CompanyInterface
     * 
     *  empresa
     * 
     * @ORM\ManyToOne(targetEntity="DACore\Entity\Base\CompanyInterface", inversedBy="documents")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
	protected $company;

	/**
     * @var \DACore\Entity\Base\PersonInterface
     * 
     *  pessoa
     * 
     * @ORM\ManyToOne(targetEntity="DACore\Entity\Base\PersonInterface", inversedBy="documents")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
	protected $person;

     /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
     protected $createdAt;

     /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
     protected $updatedAt;

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
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    
    /**
     * Gets the value of type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the value of type.
     *
     * @param string $type the type
     *
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Gets the complemento.
     *
     * @return string
     */
    public function getField1()
    {
        return $this->field1;
    }

    /**
     * Sets the complemento.
     *
     * @param string $field1 the field1
     *
     * @return self
     */
    public function setField1($field1)
    {
        $this->field1 = $field1;

        return $this;
    }

    /**
     * Gets the complemento.
     *
     * @return string
     */
    public function getField2()
    {
        return $this->field2;
    }

    /**
     * Sets the complemento.
     *
     * @param string $field2 the field2
     *
     * @return self
     */
    public function setField2($field2)
    {
        $this->field2 = $field2;

        return $this;
    }

    /**
     * Gets the complemento.
     *
     * @return string
     */
    public function getField3()
    {
        return $this->field3;
    }

    /**
     * Sets the complemento.
     *
     * @param string $field3 the field3
     *
     * @return self
     */
    public function setField3($field3)
    {
        $this->field3 = $field3;

        return $this;
    }

    /**
     * Gets the complemento.
     *
     * @return string
     */
    public function getField4()
    {
        return $this->field4;
    }

    /**
     * Sets the complemento.
     *
     * @param string $field4 the field4
     *
     * @return self
     */
    public function setField4($field4)
    {
        $this->field4 = $field4;

        return $this;
    }

    /**
     * Gets the complemento.
     *
     * @return string
     */
    public function getField5()
    {
        return $this->field5;
    }

    /**
     * Sets the complemento.
     *
     * @param string $field5 the field5
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
    public function setImages(\Doctrine\Common\Collections\ArrayCollection $images)
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
    public function setFiles(\Doctrine\Common\Collections\ArrayCollection $files)
    {
        $this->files = $files;

        return $this;
    }

    /**
     * Gets the empresa.
     *
     * @return \DACore\Entity\Base\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Sets the empresa.
     *
     * @param \DACore\Entity\Base\CompanyInterface $company the company
     *
     * @return self
     */
    public function setCompany(\DACore\Entity\Base\CompanyInterface $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Gets the pessoa.
     *
     * @return \DACore\Entity\Base\PersonInterface
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Sets the pessoa.
     *
     * @param \DACore\Entity\Base\PersonInterface $person the person
     *
     * @return self
     */
    public function setPerson(\DACore\Entity\Base\PersonInterface $person)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Gets the value of createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Gets the value of updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets the value of updatedAt.
     *
     * @param \DateTime $updatedAt the updated at
     *
     * @return self
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime("now");

        return $this;
    }


    /**
     * Sets the value of id.
     *
     * @param integer $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}