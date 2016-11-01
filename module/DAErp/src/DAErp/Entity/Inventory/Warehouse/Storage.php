<?php
namespace DAErp\Entity\Inventory\Warehouse;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use Doctrine\Common\Collections\ArrayCollection;
use DACore\IEntities\Erp\Inventory\Warehouse\StorageInterface;

/**
 *
 * @ORM\Table(name="daerp_inventory_warehouse_storages")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Storage implements StorageInterface
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
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Order\Store\StoreInterface")
     * @ORM\JoinColumn(name="store_id", referencedColumnName="id", nullable=false)
     **/
	private $store;

	/**
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Order\Store\OrderInterface")
	 * @ORM\JoinColumn(name="order_id", referencedColumnName="id", nullable=true)
	 **/
	private $orderIn;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Order\OrderSuperclassInterface")
	 * @ORM\JoinTable(name="daerp_inventory_warehouse_storage_ordersout",
	 *      joinColumns={@ORM\JoinColumn(name="order_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="storage_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $ordersOut;

    /**
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Order\Production\RawMaterialInterface")
     * @ORM\JoinTable(name="daerp_inventory_warehouse_storage_raw_materials",
     *      joinColumns={@ORM\JoinColumn(name="raw_material_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="storage_id", referencedColumnName="id", unique=true)}
     *      )
     **/

    /**
     * @ORM\OneToMany(targetEntity="DACore\IEntities\Erp\Order\Production\RawMaterialInterface", mappedBy="storage")
     */
    private $rawMaterials;

	/**
     * @ORM\OneToMany(targetEntity="DACore\IEntities\Erp\Inventory\Parked\DevolutionInterface", mappedBy="storage")
     */
	private $devolutions;

	/**
     * @ORM\OneToMany(targetEntity="DACore\IEntities\Erp\Inventory\Parked\ReservationInterface", mappedBy="storage")
     */
	private $reservations;

	/**
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Inventory\Parked\DiscrepancyInterface")
     * @ORM\JoinTable(name="daerp_inventory_warehouse_storage_discrepancies",
     *      joinColumns={@ORM\JoinColumn(name="discrepancy_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="storage_id", referencedColumnName="id", unique=true)}
     *      )
     **/
	private $discrepancies;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Inventory\Parked\LocationInterface")
	 * @ORM\JoinTable(name="daerp_inventory_warehouse_storage_locations",
	 *      joinColumns={@ORM\JoinColumn(name="location_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="storage_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $locations;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="quantity", type="float", nullable=true)
	 */
	private $quantity;

	/**
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Inventory\Warehouse\PlaceInterface")
	 * @ORM\JoinColumn(name="place_id", referencedColumnName="id", nullable=true)
	 **/
	private $place;

	/**
	 *
	 * @ORM\Column(name="created_at", type="datetime", nullable=false)
	 */
	private $createdAt;

	/**
	 *
	 * @ORM\Column(name="updated_at", type="datetime", nullable=false)
	 */
	private $updatedAt;

	public function __construct(array $options = array()) {
		$this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");

        $this->ordersOut = new ArrayCollection();
        $this->devolutions = new ArrayCollection();
        $this->reservations = new ArrayCollection();
        $this->discrepancies = new ArrayCollection();
        $this->locations = new ArrayCollection();

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
     * Gets the value of store.
     *
     * @return mixed
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * Sets the value of store.
     *
     * @param mixed $store the store
     *
     * @return self
     */
    public function setStore($store)
    {
        $this->store = $store;

        return $this;
    }

    /**
     * Gets the value of orderIn.
     *
     * @return mixed
     */
    public function getOrderIn()
    {
        return $this->orderIn;
    }

    /**
     * Sets the value of orderIn.
     *
     * @param mixed $orderIn the order in
     *
     * @return self
     */
    public function setOrderIn($orderIn)
    {
        $this->orderIn = $orderIn;

        return $this;
    }

    /**
     * Gets the value of ordersOut.
     *
     * @return mixed
     */
    public function getOrdersOut()
    {
        return $this->ordersOut;
    }

    /**
     * Sets the value of ordersOut.
     *
     * @param mixed $ordersOut the orders out
     *
     * @return self
     */
    public function setOrdersOut($ordersOut)
    {
        $this->ordersOut = $ordersOut;

        return $this;
    }

    /**
     * Gets the value of devolutions.
     *
     * @return mixed
     */
    public function getDevolutions()
    {
        return $this->devolutions;
    }

    /**
     * Sets the value of devolutions.
     *
     * @param mixed $devolutions the devolutions
     *
     * @return self
     */
    public function setDevolutions($devolutions)
    {
        $this->devolutions = $devolutions;

        return $this;
    }

    /**
     * Gets the value of reservations.
     *
     * @return mixed
     */
    public function getReservations()
    {
        return $this->reservations;
    }

    /**
     * Sets the value of reservations.
     *
     * @param mixed $reservations the reservations
     *
     * @return self
     */
    public function setReservations($reservations)
    {
        $this->reservations = $reservations;

        return $this;
    }

    /**
     * Gets the joinColumns={@JoinColumn(name="user_id", referencedColumnName="id")},
inverseJoinColumns={@JoinColumn(name="phonenumber_id", referencedColumnName="id", unique=true)}
).
     *
     * @return mixed
     */
    public function getDiscrepancies()
    {
        return $this->discrepancies;
    }

    /**
     * Sets the joinColumns={@JoinColumn(name="user_id", referencedColumnName="id")},
inverseJoinColumns={@JoinColumn(name="phonenumber_id", referencedColumnName="id", unique=true)}
).
     *
     * @param mixed $discrepancies the discrepancies
     *
     * @return self
     */
    public function setDiscrepancies($discrepancies)
    {
        $this->discrepancies = $discrepancies;

        return $this;
    }

    /**
     * Gets the value of locations.
     *
     * @return mixed
     */
    public function getLocations()
    {
        return $this->locations;
    }

    /**
     * Sets the value of locations.
     *
     * @param mixed $locations the locations
     *
     * @return self
     */
    public function setLocations($locations)
    {
        $this->locations = $locations;

        return $this;
    }

    /**
     * Gets the value of quantity.
     *
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets the value of quantity.
     *
     * @param string $quantity the quantity
     *
     * @return self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Gets the value of place.
     *
     * @return mixed
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Sets the value of place.
     *
     * @param mixed $place the place
     *
     * @return self
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Gets the value of createdAt.
     *
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets the value of createdAt.
     *
     * @param mixed $createdAt the created at
     *
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Gets the value of updatedAt.
     *
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets the value of updatedAt.
     *
     * @param mixed $updatedAt the updated at
     *
     * @ORM\PrePersist
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime("now");

        return $this;
    }
}