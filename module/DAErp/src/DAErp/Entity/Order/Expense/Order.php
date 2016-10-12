<?php
namespace R2Erp\Entity\Order\Expense;

use Doctrine\ORM\Mapping as ORM;
use R2Erp\Entity\Order\OrderSuperClass;
use Zend\Stdlib\Hydrator;

/**
 *
 * @ORM\Table(name="r2_erp_order_expense_orders")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Order extends OrderSuperClass {
	/**
	 * @ORM\ManyToMany(targetEntity="R2Erp\Entity\Order\Expense\Expense")
	 * @ORM\JoinTable(name="r2_erp_store_order_expenses",
	 *      joinColumns={@ORM\JoinColumn(name="order_store_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="store_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $expenses;

	public function __construct() {
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}

}