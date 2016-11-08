<?php
namespace DAErp\Entity\Inventory\Warehouse;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Inventory\Warehouse\TransferenceInterface;

/**
 *
 * @ORM\Table(name="daerp_inventory_warehouse_transferences")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Transference implements TransferenceInterface
{
	/**
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

    /**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\User\UserInterface")
     * @ORM\JoinColumn(name="vendor_id", referencedColumnName="id", nullable=true)
     **/
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Inventory\Warehouse\StorageInterface")
     * @ORM\JoinColumn(name="from_storage_id", referencedColumnName="id", nullable=false)
     */
    private $fromStorage;

    /**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Inventory\Warehouse\StorageInterface", cascade={"persist"})
     * @ORM\JoinColumn(name="to_storage_id", referencedColumnName="id", nullable=false)
     */
    private $toStorage;

    /**
     * @var string
     *
     * @ORM\Column(name="quantity", type="float", nullable=true)
     */
    private $quantity;

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
     * Gets the value of fromStorage.
     *
     * @return mixed
     */
    public function getFromStorage()
    {
        return $this->fromStorage;
    }

    /**
     * Sets the value of fromStorage.
     *
     * @param mixed $fromStorage the from storage
     *
     * @return self
     */
    public function setFromStorage($fromStorage)
    {
        $this->fromStorage = $fromStorage;

        return $this;
    }

    /**
     * Gets the value of toStorage.
     *
     * @return mixed
     */
    public function getToStorage()
    {
        return $this->toStorage;
    }

    /**
     * Sets the value of toStorage.
     *
     * @param mixed $toStorage the to storage
     *
     * @return self
     */
    public function setToStorage($toStorage)
    {
        $this->toStorage = $toStorage;

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
     * @return self
     *
     * @ORM\PrePersist
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime("now");

        return $this;
    }
}




