<?php
namespace DAErp\Entity\Order\Store;


use Doctrine\ORM\Mapping as ORM;
use DAErp\Entity\Order\OrderSuperclass;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Order\Store\OrderInterface;
use Doctrine\Common\Collections\ArrayCollection;
/**
 *
 * @ORM\Table(name="daerp_store_orders")
 * @ORM\Entity
 */
class Order extends OrderSuperclass implements OrderInterface
{
	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Order\Store\StoreInterface")
	 * @ORM\JoinTable(name="daerp_store_order_stores",
	 *      joinColumns={@ORM\JoinColumn(name="order_store_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="store_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $stores;

    /**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Supplier\SupplierInterface")
     * @ORM\JoinColumn(name="supplier_id", referencedColumnName="id", nullable=false)
     **/
    private $supplier;

    /**
     * @ORM\OneToOne(targetEntity="DACore\IEntities\Erp\Order\Production\ProductionInterface", mappedBy="storeOrder")
     */
    private $production;

	public function __construct(array $data = array()) {
        parent::__construct($data);
		$this->setPaymentType('compra');
		$this->stores = new ArrayCollection();
		(new Hydrator\ClassMethods)->hydrate($data, $this);
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

    /**
     * Gets the value of production.
     *
     * @return mixed
     */
    public function getProduction()
    {
        return $this->production;
    }

    /**
     * Sets the value of production.
     *
     * @param mixed $production the production
     *
     * @return self
     */
    public function setProduction($production)
    {
        $this->production = $production;

        return $this;
    }
}