<?php
namespace DAErp\Entity\Manufacturer;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 *
 * @ORM\Table(name="daerp_manufacturers")
 * @ORM\Entity
 */
class Manufacturer {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	public $id;

	/**
	 * @ORM\OneToOne(targetEntity="DACore\Entity\Base\CompanyInterface", cascade={"persist", "remove"})
	 * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=true)
	 **/
	public $company;

	public function __construct(array $options = array()) {
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param int $id
	 * @return Manufacturer
	 */
	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCompany() {
		return $this->company;
	}

	/**
	 * @param mixed $company
	 * @return Manufacturer
	 */
	public function setCompany($company) {
		$this->company = $company;
		return $this;
	}

}