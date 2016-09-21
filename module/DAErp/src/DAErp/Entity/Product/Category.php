<?php
namespace R2Erp\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 *
 * @ORM\Table(name="daerp_product_categories")
 * @ORM\Entity
 */
class Category {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=30, nullable=false)
	 */
	private $name;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="seo_description", type="string", length=255, nullable=true)
	 */
	private $seoDescription;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="is_disabled", type="boolean", nullable=true)
	 */
	private $isDisabled;

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
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getSeoDescription() {
		return $this->seoDescription;
	}

	/**
	 * @param string $seoDescription
	 */
	public function setSeoDescription($seoDescription) {
		$this->seoDescription = $seoDescription;
	}

	/**
	 * @return string
	 */
	public function getIsDisabled() {
		return $this->isDisabled;
	}

	/**
	 * @param string $isDisabled
	 */
	public function setIsDisabled($isDisabled) {
		$this->isDisabled = $isDisabled;
	}

}