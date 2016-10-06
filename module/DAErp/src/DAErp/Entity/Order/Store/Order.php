<?php
namespace DAErp\Entity\Order\Store;


use Doctrine\ORM\Mapping as ORM;
use DAErp\Entity\Order\OrderSuperClass;
use Zend\Stdlib\Hydrator;

/**
 *
 * @ORM\Table(name="daerp_store_orders")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Order extends OrderSuperClass {
	/**
	 * @ORM\ManyToMany(targetEntity="DAErp\Entity\Order\Store\Store")
	 * @ORM\JoinTable(name="daerp_store_order_stores",
	 *      joinColumns={@ORM\JoinColumn(name="order_store_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="store_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $stores;

	public function __construct() {
		$this->paymentType = 'OUTCOME';
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}

}