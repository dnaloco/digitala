<?php
namespace DAErp\Entity\HumanResource\Organization;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\HumanResource\Organization\OccupationInterface;

/**
 *
 * @ORM\Table(name="daerp_human_resource_organization_occupations")
 * @ORM\Entity
 */
class Occupation implements OccupationInterface
{
	/**
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=60, nullable=false)
     */
	private $title;

	/**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
	private $description;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\HumanResource\Organization\DepartmentInterface")
     * @ORM\JoinColumn(name="department_id", referencedColumnName="id")
     */
	private $department;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\HumanResource\Organization\BurdenInterface")
	 * @ORM\JoinTable(name="daerp_human_resource_organization_occupations_burdens",
	 *      joinColumns={@ORM\JoinColumn(name="occupation_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="burden_id", referencedColumnName="id")}
	 *      )
	 */
	private $burdens;

	/**
     * @ORM\OneToMany(targetEntity="DACore\IEntities\Erp\HumanResource\Organization\OccupationInterface", mappedBy="parent")
     */
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\HumanResource\Organization\OccupationInterface", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;
	
	public function __construct(array $data = array()) {

		$this->burdens = new ArrayCollection();
		$this->children = new ArrayCollection();

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
     * Gets the value of department.
     *
     * @return mixed
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Sets the value of department.
     *
     * @param mixed $department the department
     *
     * @return self
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Gets the joinColumns={@ORM\JoinColumn(name="occupation_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="burden_id", referencedColumnName="id", unique=true)}
).
     *
     * @return mixed
     */
    public function getBurdens()
    {
        return $this->burdens;
    }

    /**
     * Sets the joinColumns={@ORM\JoinColumn(name="occupation_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="burden_id", referencedColumnName="id", unique=true)}
).
     *
     * @param mixed $burdens the burdens
     *
     * @return self
     */
    public function setBurdens($burdens)
    {
        $this->burdens = $burdens;

        return $this;
    }

    /**
     * Gets the value of children.
     *
     * @return mixed
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Sets the value of children.
     *
     * @param mixed $children the children
     *
     * @return self
     */
    public function setChildren($children)
    {
        $this->children = $children;

        return $this;
    }

    /**
     * Gets the value of parent.
     *
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Sets the value of parent.
     *
     * @param mixed $parent the parent
     *
     * @return self
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }
}