<?php
namespace DAErp\Entity\Order\Store;


use Doctrine\ORM\Mapping as ORM;
use DAErp\Entity\Order\OrderSuperclass;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Order\Store\OrderInterface;
/**
 *
 * @ORM\Table(name="daerp_store_orders")
 * @ORM\Entity
 */
class Order extends OrderSuperclass implements OrderInterface
{
	/**
	 * @ORM\ManyToMany(targetEntity="DAErp\IEntities\Order\Store\Store")
	 * @ORM\JoinTable(name="daerp_store_order_stores",
	 *      joinColumns={@ORM\JoinColumn(name="order_store_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="store_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $stores;

	public function __construct() {
		$this->paymentType = 'OUTCOME';
		$this->stores = new ArrayCollection();
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}

	

    /**
     * Gets the value of stores.
     *
     * @return mixed
     */
    public function getStores()
    {
        return $this->stores;
    }

    /**
     * Sets the value of stores.
     *
     * @param mixed $stores the stores
     *
     * @return self
     */
    public function setStores($stores)
    {
        $this->stores = $stores;

        return $this;
    }
}