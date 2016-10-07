<?php
namespace DAAcl\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Acl\RoleInterface;

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
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Acl\RoleInterface")
	 * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
	 */
	protected $parent;

	/**
	 * @ORM\Column(type="text")
	 */
	protected $name;

	/**
	 * @ORM\Column(type="boolean", name="is_admin")
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

	public function __construct(array $data = array()) {
		$this->createdAt = new \DateTime("now");
		$this->updatedAt = new \DateTime("now");
		$this->isAdmin = 0;
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}


}