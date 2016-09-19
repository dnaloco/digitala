<?php
namespace R2Erp\Entity\Order;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * @ORM\Table(name="r2_erp_super_orders")
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap(
 * 		{
 *   		"OrderSuperClass" = "OrderSuperClass",
 *     		"StoreOrder" = "R2Erp\Entity\Order\Store\Order",
 *     		"SaleOrder" = "R2Erp\Entity\Order\Sale\Order",
 *     		"ExpenseOrder" = "R2Erp\Entity\Order\Expense\Order",
 *       	"RentalOrder" = "R2Erp\Entity\Order\Rental\Order",
 *       	"ProductionOrder" = "R2Erp\Entity\Order\Production\Order",
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

	/**
	 * @ORM\ManyToOne(targetEntity="R2User\Entity\User")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
	 **/
	private $user;

	/**
	 * @ORM\ManyToOne(targetEntity="R2Erp\Entity\Shipper\Shipper")
	 * @ORM\JoinColumn(name="supplier_id", referencedColumnName="id", nullable=true)
	 **/
	private $shipper;

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
	 * @ORM\ManyToOne(targetEntity="R2Erp\Entity\Order\Expense\Expense")
	 * @ORM\JoinColumn(name="shipping_expense_id", referencedColumnName="id", nullable=true)
	 **/
	private $shippingExpense;

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
	 * @ORM\ManyToMany(targetEntity="R2Erp\Entity\Financial\Tax")
	 * @ORM\JoinTable(name="r2_erp_sale_order_taxes",
	 *      joinColumns={@ORM\JoinColumn(name="sale_order_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="sale_tax_id", referencedColumnName="id", unique=false)}
	 *      )
	 **/
	private $taxes;

	/**
	 * @ORM\OneToMany(targetEntity="R2Erp\Entity\Financial\Payment", mappedBy="order_super_class")
	 */
	private $payments;

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