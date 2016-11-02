<?php
namespace DAErp\Entity\Order\Rental;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Order\Rental\RentalInterface;
/**
 *
 * @ORM\Table(name="daerp_order_rentals")
 * @ORM\Entity
 */
class Rental
implements RentalInterface
{
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @ORM\OneToOne(targetEntity="DACore\IEntities\Erp\Order\Store\StoreInterface")
	 * @ORM\JoinColumn(name="store_id", referencedColumnName="id", nullable=false)
	 **/
	private $store;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="unit_price", type="decimal", precision=7, scale=2, nullable=false)
	 */
	private $unitPrice;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="total_price", type="decimal", precision=7, scale=2, nullable=false)
	 */
	private $totalPrice;

	/**
     * @var string
     *
     * @ORM\Column(name="discount", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $discount;

    /**
     * @var string
     *
     * @ORM\Column(name="discount_type", type="enum_discounttype", nullable=true)
     */
    private $discountType;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="cost", type="decimal", precision=7, scale=2, nullable=false)
	 */
	private $cost;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="quantity", type="float", nullable=false)
	 */
	private $quantity;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="expected_devolution", type="datetime", nullable=false)
	 */
	private $expectedDevolution;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="devolution_date", type="datetime", nullable=false)
	 */
	private $devolutionDate;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="rate_delay", type="decimal", precision=7, scale=2, nullable=false)
	 */
	public $rateDelay;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="origin_sale", type="enum_originsale", length=20, nullable=false)
	 */
	private $originSale;

	public function __construct(array $data = array()) {
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

	

    /**
     * Gets the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param integer $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of store.
     *
     * @return mixed
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * Sets the value of store.
     *
     * @param mixed $store the store
     *
     * @return self
     */
    public function setStore($store)
    {
        $this->store = $store;

        return $this;
    }

    /**
     * Gets the value of unitPrice.
     *
     * @return string
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * Sets the value of unitPrice.
     *
     * @param string $unitPrice the unit price
     *
     * @return self
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * Gets the value of totalPrice.
     *
     * @return string
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Sets the value of totalPrice.
     *
     * @param string $totalPrice the total price
     *
     * @return self
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * Gets the value of discount.
     *
     * @return string
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Sets the value of discount.
     *
     * @param string $discount the discount
     *
     * @return self
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Gets the value of discountType.
     *
     * @return string
     */
    public function getDiscountType()
    {
        return $this->discountType;
    }

    /**
     * Sets the value of discountType.
     *
     * @param string $discountType the discount type
     *
     * @return self
     */
    public function setDiscountType($discountType)
    {
        $this->discountType = $discountType;

        return $this;
    }

    /**
     * Gets the value of cost.
     *
     * @return string
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Sets the value of cost.
     *
     * @param string $cost the cost
     *
     * @return self
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Gets the value of quantity.
     *
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets the value of quantity.
     *
     * @param string $quantity the quantity
     *
     * @return self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Gets the value of expectedDevolution.
     *
     * @return \DateTime
     */
    public function getExpectedDevolution()
    {
        return $this->expectedDevolution;
    }

    /**
     * Sets the value of expectedDevolution.
     *
     * @param \DateTime $expectedDevolution the expected devolution
     *
     * @return self
     */
    public function setExpectedDevolution(\DateTime $expectedDevolution)
    {
        $this->expectedDevolution = $expectedDevolution;

        return $this;
    }

    /**
     * Gets the value of devolutionDate.
     *
     * @return \DateTime
     */
    public function getDevolutionDate()
    {
        return $this->devolutionDate;
    }

    /**
     * Sets the value of devolutionDate.
     *
     * @param \DateTime $devolutionDate the devolution date
     *
     * @return self
     */
    public function setDevolutionDate(\DateTime $devolutionDate)
    {
        $this->devolutionDate = $devolutionDate;

        return $this;
    }

    /**
     * Gets the value of rateDelay.
     *
     * @return string
     */
    public function getRateDelay()
    {
        return $this->rateDelay;
    }

    /**
     * Sets the value of rateDelay.
     *
     * @param string $rateDelay the rate delay
     *
     * @return self
     */
    public function setRateDelay($rateDelay)
    {
        $this->rateDelay = $rateDelay;

        return $this;
    }

    /**
     * Gets the value of originSale.
     *
     * @return string
     */
    public function getOriginSale()
    {
        return $this->originSale;
    }

    /**
     * Sets the value of originSale.
     *
     * @param string $originSale the origin sale
     *
     * @return self
     */
    public function setOriginSale($originSale)
    {
        $this->originSale = $originSale;

        return $this;
    }
}