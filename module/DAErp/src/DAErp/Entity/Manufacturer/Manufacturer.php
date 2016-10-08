<?php
namespace DAErp\Entity\Manufacturer;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Manufacturer\ManufacturerInterface;
/**
 *
 * @ORM\Table(name="daerp_manufacturer_manufacturers")
 * @ORM\Entity
 */
class Manufacturer implements ManufacturerInterface
{
	/**
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	public $id;

	/**
	 * @ORM\OneToOne(targetEntity="DACore\IEntities\Base\CompanyInterface", cascade={"persist", "remove"})
	 * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=false)
	 **/
	public $company;

	/**
     * @ORM\OneToMany(targetEntity="DACore\IEntities\Erp\Product\ProductInterface", mappedBy="manufacturer")
     */
	public $products;

	public function __construct(array $data = array()) {
		$this->products = new ArrayCollection();

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