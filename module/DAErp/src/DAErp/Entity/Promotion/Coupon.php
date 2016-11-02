<?php
namespace DAErp\Entity\Promotion;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Promotion\CouponInterface;

/**
 *
 * @ORM\Table(name="daerp_promotion_coupons")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Coupon
implements CouponInterface
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
	 * @var string
	 *
	 * @ORM\Column(name="coupon", type="string", length=32, nullable=false)
	 */
	private $coupon;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="description", type="string", length=255, nullable=true)
	 */
	private $description;

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
	 * @var \DateTime
	 *
	 * @ORM\Column(name="start_date", type="datetime")
	 */
	private $startDate;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="end_date", type="datetime")
	 */
	private $endDate;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="quantity", type="integer")
	 */
	private $quantity;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="unlimited", type="boolean")
	 */
	private $unlimited;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Product\ProductInterface")
	 * @ORM\JoinTable(name="daerp_product_product_coupons",
	 *      joinColumns={@ORM\JoinColumn(name="coupon_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")}
	 *      )
	 **/
	private $products;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Product\DepartmentInterface")
	 * @ORM\JoinTable(name="daerp_product_department_coupons",
	 *      joinColumns={@ORM\JoinColumn(name="coupon_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="department_id", referencedColumnName="id")}
	 *      )
	 **/
	private $departments;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Product\CategoryInterface")
	 * @ORM\JoinTable(name="daerp_product_category_coupons",
	 *      joinColumns={@ORM\JoinColumn(name="coupon_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")}
	 *      )
	 **/
	private $categories;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="status", type="enum_promotionstatus")
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

		$this->products = new ArrayCollection();
		$this->departments = new ArrayCollection();
		$this->categories = new ArrayCollection();

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
     * Gets the value of coupon.
     *
     * @return string
     */
    public function getCoupon()
    {
        return $this->coupon;
    }

    /**
     * Sets the value of coupon.
     *
     * @param string $coupon the coupon
     *
     * @return self
     */
    public function setCoupon($coupon)
    {
        $this->coupon = $coupon;

        return $this;
    }

    /**
     * Gets the value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the value of description.
     *
     * @param string $description the description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

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
     * Gets the value of startDate.
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Sets the value of startDate.
     *
     * @param \DateTime $startDate the start date
     *
     * @return self
     */
    public function setStartDate(\DateTime $startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Gets the value of endDate.
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Sets the value of endDate.
     *
     * @param \DateTime $endDate the end date
     *
     * @return self
     */
    public function setEndDate(\DateTime $endDate)
    {
        $this->endDate = $endDate;

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
     * Gets the value of unlimited.
     *
     * @return string
     */
    public function getUnlimited()
    {
        return $this->unlimited;
    }

    /**
     * Sets the value of unlimited.
     *
     * @param string $unlimited the unlimited
     *
     * @return self
     */
    public function setUnlimited($unlimited)
    {
        $this->unlimited = $unlimited;

        return $this;
    }

    /**
     * Gets the value of products.
     *
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Sets the value of products.
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
     * Gets the value of departments.
     *
     * @return mixed
     */
    public function getDepartments()
    {
        return $this->departments;
    }

    /**
     * Sets the value of departments.
     *
     * @param mixed $departments the departments
     *
     * @return self
     */
    public function setDepartments($departments)
    {
        $this->departments = $departments;

        return $this;
    }

    /**
     * Gets the value of categories.
     *
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Sets the value of categories.
     *
     * @param mixed $categories the categories
     *
     * @return self
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Gets the value of status.
     *
     * @return \DateTime
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the value of status.
     *
     * @param \DateTime $status the status
     *
     * @return self
     */
    public function setStatus(\DateTime $status)
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