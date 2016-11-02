<?php
namespace DAErp\Entity\Supplier;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Supplier\ProductBudgetInterface;

/**
 * @ORM\Table(name="daerp_supplier_store_budgets")
 * @ORM\Entity
 */
class ProductBudget implements ProductBudgetInterface
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
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Product\ProductInterface")
     * @@ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
	private $product;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="unit_price", type="decimal", precision=7, scale=2, nullable=true)
	 */
	private $unitPrice;

	/**
     * @var string
     *
     * @ORM\Column(name="quantity", type="float", nullable=true)
     */
	private $quantity;

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
}