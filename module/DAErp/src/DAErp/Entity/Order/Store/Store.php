<?php
namespace DAErp\Entity\Order\Store;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Order\Store\StoreInterface;

/**
 *
 * @ORM\Table(name="daerp_stores")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Store implements StoreInterface
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
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Product\ProductInterface", inversedBy="stores")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;

    /**
	 * @var string
	 *
	 * @ORM\Column(name="reference", type="string", length=60, unique=true, nullable=true)
	 */
	private $reference;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="quantity", type="float", nullable=true)
	 */
	private $quantity;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="minimal_qtde_on_stock", type="float", nullable=true)
	 */
	private $minimalQtdeOnStock;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="unit_cost", type="decimal", precision=8, nullable=true)
	 */
	private $unitCost;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="unit_price", type="decimal", precision=8, scale=2, nullable=true)
	 */
	private $unitPrice;

	/**
     * @var string
     *
     * @ORM\Column(name="discount", type="decimal", precision=8, nullable=true)
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
     * @ORM\Column(name="total_with_discount", type="decimal", precision=8, nullable=true)
     */
    private $totalWithDiscount;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="shelf_life", type="datetime", nullable=false)
	 */
	private $shelfLife;

	/**
     * @ORM\OneToMany(targetEntity="DACore\IEntities\Erp\Inventory\Warehouse\StorageInterface", mappedBy="store")
     */
	private $storages;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="enum_storetatus", nullable=false)
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

	public function __construct(array $data = array())
	{
        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");

		$this->storages = new ArrayCollection();

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
     * Gets the value of product.
     *
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Sets the value of product.
     *
     * @param mixed $product the product
     *
     * @return self
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Gets the value of reference.
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Sets the value of reference.
     *
     * @param string $reference the reference
     *
     * @return self
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

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
     * Gets the value of minimalQtdeOnStock.
     *
     * @return string
     */
    public function getMinimalQtdeOnStock()
    {
        return $this->minimalQtdeOnStock;
    }

    /**
     * Sets the value of minimalQtdeOnStock.
     *
     * @param string $minimalQtdeOnStock the minimal qtde on stock
     *
     * @return self
     */
    public function setMinimalQtdeOnStock($minimalQtdeOnStock)
    {
        $this->minimalQtdeOnStock = $minimalQtdeOnStock;

        return $this;
    }

    /**
     * Gets the value of unitCost.
     *
     * @return string
     */
    public function getUnitCost()
    {
        return $this->unitCost;
    }

    /**
     * Sets the value of unitCost.
     *
     * @param string $unitCost the unit cost
     *
     * @return self
     */
    public function setUnitCost($unitCost)
    {
        $this->unitCost = $unitCost;

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
     * Gets the value of shelfLife.
     *
     * @return \DateTime
     */
    public function getShelfLife()
    {
        return $this->shelfLife;
    }

    /**
     * Sets the value of shelfLife.
     *
     * @param \DateTime $shelfLife the shelf life
     *
     * @return self
     */
    public function setShelfLife(\DateTime $shelfLife)
    {
        $this->shelfLife = $shelfLife;

        return $this;
    }

    /**
     * Gets the value of storages.
     *
     * @return mixed
     */
    public function getStorages()
    {
        return $this->storages;
    }

    /**
     * Sets the value of storages.
     *
     * @param mixed $storages the storages
     *
     * @return self
     */
    public function setStorages($storages)
    {
        $this->storages = $storages;

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
     * @return self
     * 
     * @ORM\PrePersist
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime("now");

        return $this;
    }

}