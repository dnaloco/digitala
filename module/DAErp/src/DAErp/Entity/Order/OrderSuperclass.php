<?php
namespace DAErp\Entity\Order;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Order\OrderSuperclassInterface;
/**
 * @ORM\Table(name="daerp__order_superclass_orders")
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap(
 * 		{
 *   		"OrderSuperclass" = "OrderSuperclass",
 *       	"StoreOrder" = "DAErp\Entity\Order\Store\Order"
 *      })
 */
class OrderSuperclass implements OrderSuperclassInterface
{
	/**
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 *
	 * @ORM\Column(name="no_NF", type="string", length=50, nullable=true)
	 */
	private $noNF;

	/**
	 * @ORM\ManyToOne(targetEntity="DACore\Entity\User\UserInterface")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
	 **/
	private $user;

	/**
	 *
	 * @ORM\Column(name="date_approved", type="datetime", nullable=false)
	 */
	private $dateApproved;

	/**
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Shipper\ShipperInterface")
	 * @ORM\JoinColumn(name="shipper_id", referencedColumnName="id", nullable=true)
	 **/
	private $shipper;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="shipping_type", type="enum_shippingtype", nullable=true)
	 */
	private $shippingType;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="shipping_cost", type="decimal", precision=8, nullable=true)
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
	 * @ORM\Column(name="total_order_cost", type="decimal", precision=8, nullable=false)
	 */
	private $totalOrderCost;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="discount_percentage", type="decimal", precision=8, nullable=true)
	 */
	private $discountPercentage;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="total_with_discount", type="decimal", precision=8, nullable=true)
	 */
	private $totalWithDiscount;

	/**
     * @ORM\OneToMany(targetEntity="DACore\IEntities\Erp\Financial\PaymentInterface", mappedBy="order")
     */
	private $payments;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="payment_type", type="enum_paymenttype", nullable=false)
	 */
	private $paymentType;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="order_reason", type="text", nullable=true)
	 */
	private $orderReason;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="enum_ordertatus", nullable=false)
     */
    private $status;

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
		$this->createdAt = new \DateTime("now");
		$this->updatedAt = new \DateTime("now");

		$this->$payments = new ArrayCollection();

		(new Hydrator\ClassMethods)->hydrate($options, $this);

	}

	

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of noNF.
     *
     * @return mixed
     */
    public function getNoNF()
    {
        return $this->noNF;
    }

    /**
     * Sets the value of noNF.
     *
     * @param mixed $noNF the no
     *
     * @return self
     */
    public function setNoNF($noNF)
    {
        $this->noNF = $noNF;

        return $this;
    }

    /**
     * Gets the value of user.
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Sets the value of user.
     *
     * @param mixed $user the user
     *
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Gets the value of dateApproved.
     *
     * @return mixed
     */
    public function getDateApproved()
    {
        return $this->dateApproved;
    }

    /**
     * Sets the value of dateApproved.
     *
     * @param mixed $dateApproved the date approved
     *
     * @return self
     */
    public function setDateApproved($dateApproved)
    {
        $this->dateApproved = $dateApproved;

        return $this;
    }

    /**
     * Gets the value of shipper.
     *
     * @return mixed
     */
    public function getShipper()
    {
        return $this->shipper;
    }

    /**
     * Sets the value of shipper.
     *
     * @param mixed $shipper the shipper
     *
     * @return self
     */
    public function setShipper($shipper)
    {
        $this->shipper = $shipper;

        return $this;
    }

    /**
     * Gets the value of shippingType.
     *
     * @return string
     */
    public function getShippingType()
    {
        return $this->shippingType;
    }

    /**
     * Sets the value of shippingType.
     *
     * @param string $shippingType the shipping type
     *
     * @return self
     */
    public function setShippingType($shippingType)
    {
        $this->shippingType = $shippingType;

        return $this;
    }

    /**
     * Gets the value of shippingCost.
     *
     * @return string
     */
    public function getShippingCost()
    {
        return $this->shippingCost;
    }

    /**
     * Sets the value of shippingCost.
     *
     * @param string $shippingCost the shipping cost
     *
     * @return self
     */
    public function setShippingCost($shippingCost)
    {
        $this->shippingCost = $shippingCost;

        return $this;
    }

    /**
     * Gets the value of dateShipped.
     *
     * @return \DateTime
     */
    public function getDateShipped()
    {
        return $this->dateShipped;
    }

    /**
     * Sets the value of dateShipped.
     *
     * @param \DateTime $dateShipped the date shipped
     *
     * @return self
     */
    public function setDateShipped(\DateTime $dateShipped)
    {
        $this->dateShipped = $dateShipped;

        return $this;
    }

    /**
     * Gets the value of expectedDeliveryDate.
     *
     * @return \DateTime
     */
    public function getExpectedDeliveryDate()
    {
        return $this->expectedDeliveryDate;
    }

    /**
     * Sets the value of expectedDeliveryDate.
     *
     * @param \DateTime $expectedDeliveryDate the expected delivery date
     *
     * @return self
     */
    public function setExpectedDeliveryDate(\DateTime $expectedDeliveryDate)
    {
        $this->expectedDeliveryDate = $expectedDeliveryDate;

        return $this;
    }

    /**
     * Gets the value of dateDelivered.
     *
     * @return \DateTime
     */
    public function getDateDelivered()
    {
        return $this->dateDelivered;
    }

    /**
     * Sets the value of dateDelivered.
     *
     * @param \DateTime $dateDelivered the date delivered
     *
     * @return self
     */
    public function setDateDelivered(\DateTime $dateDelivered)
    {
        $this->dateDelivered = $dateDelivered;

        return $this;
    }

    /**
     * Gets the value of totalOrderCost.
     *
     * @return string
     */
    public function getTotalOrderCost()
    {
        return $this->totalOrderCost;
    }

    /**
     * Sets the value of totalOrderCost.
     *
     * @param string $totalOrderCost the total order cost
     *
     * @return self
     */
    public function setTotalOrderCost($totalOrderCost)
    {
        $this->totalOrderCost = $totalOrderCost;

        return $this;
    }

    /**
     * Gets the value of discountPercentage.
     *
     * @return string
     */
    public function getDiscountPercentage()
    {
        return $this->discountPercentage;
    }

    /**
     * Sets the value of discountPercentage.
     *
     * @param string $discountPercentage the discount percentage
     *
     * @return self
     */
    public function setDiscountPercentage($discountPercentage)
    {
        $this->discountPercentage = $discountPercentage;

        return $this;
    }

    /**
     * Gets the value of totalWithDiscount.
     *
     * @return string
     */
    public function getTotalWithDiscount()
    {
        return $this->totalWithDiscount;
    }

    /**
     * Sets the value of totalWithDiscount.
     *
     * @param string $totalWithDiscount the total with discount
     *
     * @return self
     */
    public function setTotalWithDiscount($totalWithDiscount)
    {
        $this->totalWithDiscount = $totalWithDiscount;

        return $this;
    }

    /**
     * Gets the value of payments.
     *
     * @return mixed
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * Sets the value of payments.
     *
     * @param mixed $payments the payments
     *
     * @return self
     */
    public function setPayments($payments)
    {
        $this->payments = $payments;

        return $this;
    }

    /**
     * Gets the value of paymentType.
     *
     * @return string
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * Sets the value of paymentType.
     *
     * @param string $paymentType the payment type
     *
     * @return self
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    /**
     * Gets the value of orderReason.
     *
     * @return string
     */
    public function getOrderReason()
    {
        return $this->orderReason;
    }

    /**
     * Sets the value of orderReason.
     *
     * @param string $orderReason the order reason
     *
     * @return self
     */
    public function setOrderReason($orderReason)
    {
        $this->orderReason = $orderReason;

        return $this;
    }

    /**
     * Gets the value of status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the value of status.
     *
     * @param string $status the status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Gets the value of createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets the value of createdAt.
     *
     * @param \DateTime $createdAt the created at
     *
     * @return self
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Gets the value of updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets the value of updatedAt.
     *
     * @param \DateTime $updatedAt the updated at
     *
     * @ORM\PrePersist
     */
    public function setUpdatedAt()
    {
        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");

        return $this;
    }

    
}