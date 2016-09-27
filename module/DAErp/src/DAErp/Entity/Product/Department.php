<?php
namespace DAErp\Entity\Product;

use DACore\Entity\Erp\Product\DepartmentInterface;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
/**
 *
 * @ORM\Table(name="daerp_product_departments")
 * @ORM\Entity
 */
class Department implements DepartmentInterface
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

	public function __construct(array $data = array()) {
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
     * Gets the value of name.
     *
     * @return string
     */
    public function getName()
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
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of seoDescription.
     *
     * @return string
     */
    public function getSeoDescription()
    {
        return $this->seoDescription;
    }

    /**
     * Sets the value of seoDescription.
     *
     * @param string $seoDescription the seo description
     *
     * @return self
     */
    public function setSeoDescription($seoDescription)
    {
        $this->seoDescription = $seoDescription;

        return $this;
    }

    /**
     * Gets the value of isDisabled.
     *
     * @return string
     */
    public function getIsDisabled()
    {
        return $this->isDisabled;
    }

    /**
     * Sets the value of isDisabled.
     *
     * @param string $isDisabled the is disabled
     *
     * @return self
     */
    public function setIsDisabled($isDisabled)
    {
        $this->isDisabled = $isDisabled;

        return $this;
    }
}