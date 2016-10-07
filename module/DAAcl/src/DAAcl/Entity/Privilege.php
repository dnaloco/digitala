<?php
namespace DAAcl\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Acl\PrivilegeInterface;

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
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Acl\RoleInterface")
	 * @ORM\JoinColumn(name="role_id", referencedColumnName="id")
	 */
	protected $role;

	/**
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Acl\ResourceInterface")
	 * @ORM\JoinColumn(name="resource_id", referencedColumnName="id")
	 */
	protected $resource;

	/**
	 * @ORM\Column(type="text")
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

	public function __construct(array $data = array()) {
		$this->createdAt = new \DateTime("now");
		$this->updatedAt = new \DateTime("now");
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

}