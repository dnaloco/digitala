<?php
namespace DAErp\Entity\Order\Sale;

use Doctrine\ORM\Mapping as ORM;
use DAErp\Entity\Order\OrderSuperClass;
use DACore\IEntities\Erp\Order\Sale\OrderInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Zend\Stdlib\Hydrator;
/**
 *
 * @ORM\Table(name="daerp_order_sale_orders")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Order extends OrderSuperClass
implements OrderInterface
{

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Order\Sale\SaleInterface")
	 * @ORM\JoinTable(name="daerp_order_sale_orders_sales",
	 *      joinColumns={@ORM\JoinColumn(name="sale_order_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="sale_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $sales;

	/**
	 * @ORM\OneToOne(targetEntity="DACore\IEntities\Base\PersonInterface")
	 * @ORM\JoinColumn(name="customer_id", referencedColumnName="id", nullable=false)
	 **/
	public $customer;

	public function __construct(array $data = array()) {
		$this->sales = new ArrayCollection();
		$this->setPaymentType('venda');
		parent::__construct($data);
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}


    /**
     * Gets the value of sales.
     *
     * @return mixed
     */
    public function getSales()
    {
        return $this->sales;
    }

    /**
     * Sets the value of sales.
     *
     * @param mixed $sales the sales
     *
     * @return self
     */
    public function setSales($sales)
    {
        $this->sales = $sales;

        return $this;
    }

    /**
     * Gets the value of customer.
     *
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Sets the value of customer.
     *
     * @param mixed $customer the customer
     *
     * @return self
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }
}