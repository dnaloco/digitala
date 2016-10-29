<?php 
namespace DABase\Entity;

use DACore\IEntities\Base\CompanyCategoryInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Categoria de empresa
 *
 * @ORM\Table(name="dabase_company_categories")
 * @ORM\Entity
 */
class CompanyCategory implements CompanyCategoryInterface
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
     * @ORM\Column(name="name", type="string", length=100, nullable=false, unique=true)
     */
	protected $name;

	/**
     * @ORM\OneToMany(targetEntity="DACore\IEntities\Base\CompanyCategoryInterface", mappedBy="parent", cascade={"remove"})
     */
    private $children;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Base\CompanyCategoryInterface", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
	protected $parent;

	public function __construct(array $data)
	{
		$this->children = new \Doctrine\Common\Collections\ArrayCollection();

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