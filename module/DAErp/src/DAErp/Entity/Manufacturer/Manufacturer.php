<?php
namespace DAErp\Entity\Manufacturer;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\Entity\Erp\Manufacturer\ManufacturerInterface;
/**
 *
 * @ORM\Table(name="daerp_manufacturers")
 * @ORM\Entity
 */
class Manufacturer implements ManufacturerInterface
{
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

	/**
     * @ORM\OneToMany(targetEntity="DACore\Entity\Erp\Product\ProductInterface", mappedBy="manufacturer")
     */
	public $products;

	public function __construct(array $options = array()) {
		$this->products = new ArrayCollection();

		(new Hydrator\ClassMethods)->hydrate($options, $this);
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
     * Gets the value of company.
     *
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Sets the value of company.
     *
     * @param mixed $company the company
     *
     * @return self
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Gets the value of products.
     *
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Sets the value of products.
     *
     * @param mixed $products the products
     *
     * @return self
     */
    public function setProducts($products)
    {
        $this->products = $products;

        return $this;
    }
}