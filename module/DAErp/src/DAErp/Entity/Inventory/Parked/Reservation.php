<?php
namespace DAErp\Entity\Inventory\Parked;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Inventory\Parked\ReservationInterface;

/**
 *
 * @ORM\Table(name="daerp_inventory_parked_reservations")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Reservation implements ReservationInterface
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
	 * @ORM\JoinColumn(name="to_customer_id", referencedColumnName="id", nullable=false)
	 **/
	private $toCustomer;

	/**
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\User\UserInterface")
	 * @ORM\JoinColumn(name="vendor_id", referencedColumnName="id", nullable=true)
	 **/
	private $user;

	/**
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Order\Store\StoreInterface")
	 * @ORM\JoinColumn(name="store", referencedColumnName="id", nullable=false)
	 **/
	private $store;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Inventory\Warehouse\StorageInterface", inversedBy="reservations")
     * @ORM\JoinColumn(name="reservation_id", referencedColumnName="id")
     */
	private $storage;

	/**
	 *
	 * @ORM\Column(name="status", type="enum_reservationstatus", nullable=false)
	 */
	private $status;

	/**
	 *
	 * @ORM\Column(name="quantity", type="float", nullable=false)
	 */
	private $quantity;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="keep_up_until", type="datetime", nullable=false)
	 */
	private $keepUpUntil;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="createdAt", type="datetime", nullable=false)
	 */
	private $createdAt;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="updatedAt", type="datetime", nullable=false)
	 */
	private $updatedAt;

	public function __construct(array $options = array()) {
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
    public function getToCustomer()
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
    public function setToCustomer($fromCustomer)
    {
        $this->fromCustomer = $fromCustomer;

        return $this;
    }

    /**
     * Gets the value of user.
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Sets the value of user.
     *
     * @param mixed $user the user
     *
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;

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
     * Gets the value of status.
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the value of status.
     *
     * @param mixed $status the status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

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
     * Gets the value of keepUpUntil.
     *
     * @return \DateTime
     */
    public function getKeepUpUntil()
    {
        return $this->keepUpUntil;
    }

    /**
     * Sets the value of keepUpUntil.
     *
     * @param \DateTime $keepUpUntil the keep up until
     *
     * @return self
     */
    public function setKeepUpUntil(\DateTime $keepUpUntil)
    {
        $this->keepUpUntil = $keepUpUntil;

        return $this;
    }

    /**
     * Gets the value of createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets the value of createdAt.
     *
     * @param \DateTime $createdAt the created at
     *
     * @return self
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Gets the value of updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets the value of updatedAt.
     *
     * @param \DateTime $updatedAt the updated at
     *
     * @ORM\PrePersist
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime("now");

        return $this;
    }
}