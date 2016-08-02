<?php
namespace DAAcl\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="daacl_roles")
 */
class Role implements RoleInterface {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	protected $id;

	/**
	 * @ORM\ManyToOne(targetEntity="DAAcl\Entity\RoleInterface")
	 * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
	 */
	protected $parent;

	/**
	 * @ORM\Column(type="text")
	 * @var string
	 */
	protected $name;

	/**
	 * @ORM\Column(type="boolean", name="is_admin")
	 * @var boolean
	 */
	protected $isAdmin;

	/**
	 * @ORM\Column(type="datetime", name="created_at")
	 */
	protected $createdAt;

	/**
	 * @ORM\Column(type="datetime", name="updated_at")
	 */
	protected $updatedAt;

	public function __construct(array $options = array()) {
		$this->createdAt = new \DateTime("now");
		$this->updatedAt = new \DateTime("now");
		$this->isAdmin = 0;
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Gets the value of parent.
     *
     * @return mixed
     */
    public function getParent() : RoleInterface
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
    protected function setParent(RoleInterface $parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Gets the value of name.
     *
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param string $name the name
     *
     * @return self
     */
    protected function setName(string $name) 
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of isAdmin.
     *
     * @return boolean
     */
    public function getIsAdmin() : boolean
    {
        return $this->isAdmin;
    }

    /**
     * Sets the value of isAdmin.
     *
     * @param boolean $isAdmin the is admin
     *
     * @return self
     */
    protected function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * Gets the value of createdAt.
     *
     * @return mixed
     */
    public function getCreatedAt() : \DateTime
    {
        return $this->createdAt;
    }

    /**
     * Gets the value of updatedAt.
     *
     * @return mixed
     */
    public function getUpdatedAt() : \DateTime
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
    protected function setUpdatedAt()
    {
        $this->updatedAt = new \Datetime("now");

        return $this;
    }
}