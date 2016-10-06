<?php
namespace DAErp\Entity\Order;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * @ORM\Table(name="daerp_super_orders")
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap(
 * 		{
 *   		"OrderSuperClass" = "OrderSuperClass",
 *       	"StoreOrder" = "DAErp\Entity\Order\Store\Order"
 *      })
 */
class OrderSuperClass {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	private $noNF;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date_approved", type="datetime", nullable=false)
	 */
	private $dateApproved;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="shipping_type", type="string", length=15, nullable=true)
	 */
	private $shippingType;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="shipping_cost", type="decimal", precision=2, nullable=true)
	 */
	private $shippingCost;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date_shipped", type="datetime", nullable=false)
	 */
	private $dateShipped;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="expected_delivery_date", type="datetime", nullable=false)
	 */
	private $expectedDeliveryDate;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date_delivered", type="datetime", nullable=false)
	 */
	private $dateDelivered;



	/**
	 * @var string
	 *
	 * @ORM\Column(name="total_order_cost", type="decimal", precision=2, nullable=false)
	 */
	private $totalOrderCost;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="discount", type="decimal", precision=2, nullable=true)
	 */
	private $discount;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="payment_type", type="text", nullable=false)
	 */
	private $paymentType;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="order_reason", type="text", nullable=true)
	 */
	private $orderReason;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="created_at", type="datetime", nullable=false)
	 */
	private $createdAt;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="updated_at", type="datetime", nullable=false)
	 */
	private $updatedAt;

	public function __construct(array $options = array()) {
		$this->$taxes = new ArrayCollection();
		$this->$payments = new ArrayCollection();

		$this->createdAt = new \DateTime("now");
		$this->updatedAt = new \DateTime("now");

		(new Hydrator\ClassMethods)->hydrate($options, $this);

	}

}