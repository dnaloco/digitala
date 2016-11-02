<?php
namespace DAErp\Entity\Order\Sale;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Order\Sale\SaleInterface;
/**
 *
 * @ORM\Table(name="daerp_order_sale_sales")
 * @ORM\Entity
 */
class Sale
implements SaleInterface
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
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Order\Store\StoreInterface")
	 * @ORM\JoinColumn(name="store_id", referencedColumnName="id", nullable=true)
	 **/
	private $store;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="quantity", type="float", nullable=false)
	 */
	private $quantity;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="unit_price", type="decimal", precision=7, scale=2, nullable=false)
	 */
	private $unitPrice;

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
	 * @ORM\Column(name="total_price", type="decimal", precision=7, scale=2, nullable=false)
	 */
	private $totalPrice;

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
}