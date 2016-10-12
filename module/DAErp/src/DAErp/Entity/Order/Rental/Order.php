<?php
namespace R2Erp\Entity\Order\Rental;

use Doctrine\ORM\Mapping as ORM;
use R2Erp\Entity\Order\OrderSuperClass;

/**
 *
 * @ORM\Table(name="r2_erp_order_rental_orders")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Order extends OrderSuperClass {

	/**
	 * @ORM\ManyToMany(targetEntity="R2Erp\Entity\Order\Rental\Rental")
	 * @ORM\JoinTable(name="r2_erp_sale_order_rentals",
	 *      joinColumns={@ORM\JoinColumn(name="order_rental_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="rental_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $rentals;

	/**
	 * @ORM\OneToOne(targetEntity="R2Erp\Entity\Customer\Customer")
	 * @ORM\JoinColumn(name="customer_id", referencedColumnName="id", nullable=false)
	 **/
	public $customer;

	public function __construct(array $options = array()) {
		parent::__construct($options);
		$this->setPaymentType('SALE');
	}

}