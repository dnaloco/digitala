<?php
namespace R2Erp\Entity\Inventory;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use Doctrine\Common\Collections\ArrayCollection;
use DACore\IEntities\Erp\Inventory\Parked\DevolutionInterface;
/**
 *
 * @ORM\Table(name="daerp_inventory_parked_devolutions")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Devolution implements DevolutionInterface
{
	/**
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Base\PersonInterface")
	 * @ORM\JoinColumn(name="from_customer_id", referencedColumnName="id", nullable=false)
	 **/
	private $fromCustomer;

	/**
	 * @ORM\ManyToOne(targetEntity="DACore\Entity\User\UserInterface")
	 * @ORM\JoinColumn(name="vendor_id", referencedColumnName="id", nullable=true)
	 **/
	private $vendor;

//@ORM\ManyToOne(targetEntity="R2Erp\Entity\Order\Sale\Order")
//@ORM\JoinColumn(name="sale_order_id", referencedColumnName="id", nullable=false)
	//private $saleOrder;

	/**
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Order\Store\StoreInterface")
	 * @ORM\JoinColumn(name="store_id", referencedColumnName="id", nullable=false)
	 **/
	private $store;

    /**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Inventory\Warehouse\StorageInterface", inversedBy="devolutions")
     * @ORM\JoinColumn(name="devolution_id", referencedColumnName="id")
     */
	private $storage;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Order\Store\StoreInterface")
	 * @ORM\JoinTable(name="daerp_inventory_parked_devolution_replaceds",
	 *      joinColumns={@ORM\JoinColumn(name="devolution_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="replaced_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $replaceds;

	/**
	 *
	 * @ORM\Column(name="quantity", type="float", nullable=false)
	 */
	private $quantity;

	/**
	 *
	 * @ORM\Column(name="devolution_date", type="datetime", nullable=false)
	 */
	private $devolutionDate;

	/**
	 *
	 * @ORM\Column(name="reason", type="text", nullable=false)
	 */
	private $reason;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="status", type="enum_devolutionstatus", nullable=true)
	 */
	private $status;

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

        $this->replaceds = new ArrayCollection();

		(new Hydrator\ClassMethods)->hydrate($options, $this);
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
     * Gets the value of fromCustomer.
     *
     * @return mixed
     */
    public function getFromCustomer()
    {
        return $this->fromCustomer;
    }

    /**
     * Sets the value of fromCustomer.
     *
     * @param mixed $fromCustomer the from customer
     *
     * @return self
     */
    public function setFromCustomer($fromCustomer)
    {
        $this->fromCustomer = $fromCustomer;

        return $this;
    }

    /**
     * Gets the value of vendor.
     *
     * @return mixed
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * Sets the value of vendor.
     *
     * @param mixed $vendor the vendor
     *
     * @return self
     */
    public function setVendor($vendor)
    {
        $this->vendor = $vendor;

        return $this;
    }

    /**
     * Gets the value of saleOrder.
     *
     * @return mixed
     */
    public function getSaleOrder()
    {
        return $this->saleOrder;
    }

    /**
     * Sets the value of saleOrder.
     *
     * @param mixed $saleOrder the sale order
     *
     * @return self
     */
    public function setSaleOrder($saleOrder)
    {
        $this->saleOrder = $saleOrder;

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
     * Gets the value of storage.
     *
     * @return mixed
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * Sets the value of storage.
     *
     * @param mixed $storage the storage
     *
     * @return self
     */
    public function setStorage($storage)
    {
        $this->storage = $storage;

        return $this;
    }

    /**
     * Gets the value of replaceds.
     *
     * @return mixed
     */
    public function getReplaceds()
    {
        return $this->replaceds;
    }

    /**
     * Sets the value of replaceds.
     *
     * @param mixed $replaceds the replaceds
     *
     * @return self
     */
    public function setReplaceds($replaceds)
    {
        $this->replaceds = $replaceds;

        return $this;
    }

    /**
     * Gets the value of quantity.
     *
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets the value of quantity.
     *
     * @param mixed $quantity the quantity
     *
     * @return self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Gets the value of devolutionDate.
     *
     * @return mixed
     */
    public function getDevolutionDate()
    {
        return $this->devolutionDate;
    }

    /**
     * Sets the value of devolutionDate.
     *
     * @param mixed $devolutionDate the devolution date
     *
     * @return self
     */
    public function setDevolutionDate($devolutionDate)
    {
        $this->devolutionDate = $devolutionDate;

        return $this;
    }

    /**
     * Gets the value of reason.
     *
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Sets the value of reason.
     *
     * @param mixed $reason the reason
     *
     * @return self
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Gets the value of status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the value of status.
     *
     * @param string $status the status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

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