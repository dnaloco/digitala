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
     * @ORM\OneToMany(targetEntity="DACore\IEntities\Erp\Order\Store\StoreInterface", mappedBy="storeOrder", cascade={"persist", "remove"})
     */
	private $stores;

    /**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Supplier\SupplierInterface")
     * @ORM\JoinColumn(name="supplier_id", referencedColumnName="id", nullable=true)
     **/
    private $supplier;

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
     * Gets the value of supplier.
     *
     * @return mixed
     */
    public function getSupplier()
    {
        return $this->supplier;
    }

    /**
     * Sets the value of supplier.
     *
     * @param mixed $supplier the supplier
     *
     * @return self
     */
    public function setSupplier($supplier)
    {
        $this->supplier = $supplier;

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