<?php
namespace DAAcl\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="daacl_privileges")
 */
class Privilege implements PrivilegeInterface {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	protected $id;

	/**
	 * @ORM\ManyToOne(targetEntity="DAAcl\Entity\RoleInterface")
	 * @ORM\JoinColumn(name="role_id", referencedColumnName="id")
	 */
	protected $role;

	/**
	 * @ORM\ManyToOne(targetEntity="DAAcl\Entity\ResourceInterface")
	 * @ORM\JoinColumn(name="resource_id", referencedColumnName="id")
	 */
	protected $resource;

	/**
	 * @ORM\Column(type="text")
	 * @var string
	 */
	protected $name;

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
     * Gets the value of role.
     *
     * @return mixed
     */
    public function getRole() : RoleInterface
    {
        return $this->role;
    }

    /**
     * Sets the value of role.
     *
     * @param mixed $role the role
     *
     * @return self
     */
    protected function setRole(\DAAcl\Entity\RoleInterface $role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Gets the value of resource.
     *
     * @return mixed
     */
    public function getResource() : ResourceInterface
    {
        return $this->resource;
    }

    /**
     * Sets the value of resource.
     *
     * @param mixed $resource the resource
     *
     * @return self
     */
    protected function setResource($resource)
    {
        $this->resource = $resource;

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
    protected function setName($name)
    {
        $this->name = $name;

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