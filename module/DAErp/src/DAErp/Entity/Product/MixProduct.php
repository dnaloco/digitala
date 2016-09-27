<?php
namespace DAErp\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\Entity\Erp\Product\MixProductInterface;

/**
 *
 * @ORM\Table(name="r2_erp_mix_products")
 * @ORM\Entity
 */
class MixProduct implements MixProductInterface
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
     * @ORM\ManyToMany(targetEntity="DACore\Entity\Erp\Product\ProductInterface")
     * @ORM\JoinTable(name="daerp_mix_product_products",
     *      joinColumns={@ORM\JoinColumn(name="mix_product_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id", unique=true)}
     *      )
     */
	private $products;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="discount", type="decimal", precision=2, nullable=false)
	 */
	private $discount;

	// valor integral, subtração, porcentagem.
	private $discountType;

	/**
	 * @var Boolean
	 *
	 * @ORM\Column(name="is_highlighted", type="boolean", nullable=true)
	 */
	private $isHighlighted;

	/**
	 * @var Booleam
	 *
	 * @ORM\Column(name="is_Launch", type="boolean", nullable=true)
	 */
	private $isLaunch;

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

	public function __construct(array $data = array()) {
		(new Hydrator\ClassMethods)->hydrate($options, $this);
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
     * Gets the joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="phonenumber_id", referencedColumnName="id", unique=true)}
).
     *
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Sets the joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="phonenumber_id", referencedColumnName="id", unique=true)}
).
     *
     * @param mixed $products the products
     *
     * @return self
     */
    public function setProducts($products)
    {
        $this->products = $products;

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
     * @return mixed
     */
    public function getDiscountType()
    {
        return $this->discountType;
    }

    /**
     * Sets the value of discountType.
     *
     * @param mixed $discountType the discount type
     *
     * @return self
     */
    public function setDiscountType($discountType)
    {
        $this->discountType = $discountType;

        return $this;
    }

    /**
     * Gets the value of isHighlighted.
     *
     * @return bool
     */
    public function getIsHighlighted()
    {
        return $this->isHighlighted;
    }

    /**
     * Sets the value of isHighlighted.
     *
     * @param bool $isHighlighted the is highlighted
     *
     * @return self
     */
    public function setIsHighlighted(bool $isHighlighted)
    {
        $this->isHighlighted = $isHighlighted;

        return $this;
    }

    /**
     * Gets the value of isLaunch.
     *
     * @return bool
     */
    public function getIsLaunch()
    {
        return $this->isLaunch;
    }

    /**
     * Sets the value of isLaunch.
     *
     * @param bool $isLaunch the is launch
     *
     * @return self
     */
    public function setIsLaunch(bool $isLaunch)
    {
        $this->isLaunch = $isLaunch;

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
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}