<?php
namespace DAErp\Entity\Order\Store;


use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 *
 * @ORM\Table(name="daerp_stores")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Store {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\Entity\Erp\Product\ProductInterface", inversedBy="stores")
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
	 * @ORM\Column(name="unit_cost", type="decimal", precision=2, nullable=true)
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
	 * @ORM\Column(name="unit_discount_price", type="decimal", precision=8, scale=2, nullable=true)
	 */
	private $discount;


	private $discountType;

// validade;
	private $shelfLife;
// promoções
	private $salesPromotions;
// devoluções
	private $devolutions;
// não achados
	private $discrepancies;
// aluguéis
	private $locations;
// reservas
	private $reservations;
// armazenamento
	private $storages;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="store_status", type="string", length=20, nullable=false)
	 */
	private $storeStatus;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="updated_at", type="datetime", nullable=false)
	 */
	private $updatedAt;

	public function __construct(array $options = array()) {
		$this->updatedAt = new \DateTime("now");
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param int $id
	 * @return Store
	 */
	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getProduct() {
		return $this->product;
	}

	/**
	 * @param mixed $product
	 * @return Store
	 */
	public function setProduct($product) {
		$this->product = $product;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getQuantity() {
		return $this->quantity;
	}

	/**
	 * @param string $quantity
	 * @return Store
	 */
	public function setQuantity($quantity) {
		$this->quantity = $quantity;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMinimalQtdeOnStock() {
		return $this->minimalQtdeOnStock;
	}

	/**
	 * @param string $minimalQtdeOnStock
	 * @return Store
	 */
	public function setMinimalQtdeOnStock($minimalQtdeOnStock) {
		$this->minimalQtdeOnStock = $minimalQtdeOnStock;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getInventory() {
		return $this->inventory;
	}

	/**
	 * @param mixed $inventory
	 * @return Store
	 */
	public function setInventory($inventory) {
		$this->inventory = $inventory;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUnitCost() {
		return $this->unitCost;
	}

	/**
	 * @param string $unitCost
	 * @return Store
	 */
	public function setUnitCost($unitCost) {
		$this->unitCost = $unitCost;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUnitPrice() {
		return $this->unitPrice;
	}

	/**
	 * @param string $unitPrice
	 * @return Store
	 */
	public function setUnitPrice($unitPrice) {
		$this->unitPrice = $unitPrice;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUnitDiscountPrice() {
		return $this->unitDiscountPrice;
	}

	/**
	 * @param string $unitDiscountPrice
	 * @return Store
	 */
	public function setUnitDiscountPrice($unitDiscountPrice) {
		$this->unitDiscountPrice = $unitDiscountPrice;
		return $this;
	}

	/**
	 * @return boolean
	 */
	public function isSellDiscountPrice() {
		return $this->sellDiscountPrice;
	}

	/**
	 * @param boolean $sellDiscountPrice
	 * @return Store
	 */
	public function setSellDiscountPrice($sellDiscountPrice) {
		$this->sellDiscountPrice = $sellDiscountPrice;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getStoreStatus() {
		return $this->storeStatus;
	}

	/**
	 * @param string $storeStatus
	 * @return Store
	 */
	public function setStoreStatus($storeStatus) {
		$this->storeStatus = $storeStatus->value();
		return $this;
	}

	/**
	 * Gets the value of updatedAt.
	 *
	 * @return \DateTime
	 */
	public function getUpdatedAt() {
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
	public function setUpdatedAt() {
		$this->updatedAt = new \Datetime("now");

		return $this;
	}
}