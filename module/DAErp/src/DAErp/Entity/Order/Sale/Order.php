<?php
namespace R2Erp\Entity\Order\Sale;

use Doctrine\ORM\Mapping as ORM;
use R2Erp\Entity\Order\OrderSuperClass;

/**
 *
 * @ORM\Table(name="r2_erp_sale_orders")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Order extends OrderSuperClass {

	/**
	 * @ORM\ManyToMany(targetEntity="R2Erp\Entity\Order\Sale\Sale")
	 * @ORM\JoinTable(name="r2_erp_sale_order_sales",
	 *      joinColumns={@ORM\JoinColumn(name="order_sale_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="sale_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $sales;

	/**
	 * @ORM\OneToOne(targetEntity="R2User\Entity\User")
	 * @ORM\JoinColumn(name="customer_id", referencedColumnName="id", nullable=false)
	 **/
	private $customer;

	public function __construct(array $options = array()) {
		parent::__construct($options);
		$this->setPaymentType('SALE');

	}

}