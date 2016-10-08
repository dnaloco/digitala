<?php
namespace R2Erp\Entity\Inventory;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Inventory\Warehouse\WarehouseInterface;

/**
 *
 * @ORM\Table(name="daerp_inventory_warehouse_warehouses")
 * @ORM\Entity
 */
class Warehouse implements WarehouseInterface
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
	 * @ORM\Column(name="description", type="text", nullable=true)
	 */
	private $description;

	/**
	 * @ORM\OneToOne(targetEntity="R2Base\Entity\Address", cascade={"persist", "remove"})
	 * @ORM\JoinColumn(name="address_id", referencedColumnName="id", nullable=true)
	 **/
	private $address;

	/**
	 * @ORM\ManyToOne(targetEntity="R2Base\Entity\Company")
	 * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=false)
	 **/
	private $company;

	/**
     * @OneToMany(targetEntity="Feature", mappedBy="product")
     */
	private $places;

	public function __construct(array $options = array()) {

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
     * Gets the value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the value of description.
     *
     * @param string $description the description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets the value of address.
     *
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the value of address.
     *
     * @param mixed $address the address
     *
     * @return self
     */
    public function setAddress($address)
    {
        $this->address = $address;

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
     * Gets the value of places.
     *
     * @return mixed
     */
    public function getPlaces()
    {
        return $this->places;
    }

    /**
     * Sets the value of places.
     *
     * @param mixed $places the places
     *
     * @return self
     */
    public function setPlaces($places)
    {
        $this->places = $places;

        return $this;
    }
}