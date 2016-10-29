<?php
namespace DAErp\Entity\HumanResource\Recruitment;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\HumanResource\Recruitment\CurriculumInterface;

/**
 *
 * @ORM\Table(name="daerp_human_resource_recruitment_curriculums")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Curriculum implements CurriculumInterface
{
	/**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
	private $id;

	/**
     * @ORM\OneToOne(targetEntity="DACore\IEntities\Base\PersonInterface")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
	private $person;

	/**
     * @ORM\OneToOne(targetEntity="DACore\IEntities\Base\ImageInterface", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     */
	protected $image;

	/**
     * @ORM\OneToOne(targetEntity="DACore\IEntities\Base\FileInterface", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="file_id", referencedColumnName="id")
     */
    private $file;

	/**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=false)
     */
    protected $updatedAt;
	
	public function __construct(array $data = array())
    {
        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");

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
     * Gets the value of image.
     *
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the value of image.
     *
     * @param mixed $image the image
     *
     * @return self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Gets the value of file.
     *
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Sets the value of file.
     *
     * @param mixed $file the file
     *
     * @return self
     */
    public function setFile($file)
    {
        $this->file = $file;

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
     * Sets the value of createdAt.
     *
     * @param \DateTime $createdAt the created at
     *
     * @return self
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
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
     * 
     * @ORM\PrePersist
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime("now");

        return $this;
    }
}
