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
 */
class Coupon implements CouponInterface
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
	 * @ORM\Column(name="discount", type="decimal", precision=8, nullable=false)
	 */
	private $discount;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="start_date", type="datetime")
	 */
	private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_time", type="time")
     */
    private $startTime;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="finish_date", type="datetime")
	 */
	private $finishDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_time", type="time")
     */
    private $endTime;

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
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Product\MixProductInterface")
	 * @ORM\JoinTable(name="daerp_product_mix_product_coupons",
	 *      joinColumns={@ORM\JoinColumn(name="coupon_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="mix_product", referencedColumnName="id")}
	 *      )
	 **/
	private $mixProducts;

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
     *
     * @ORM\Column(name="auto", type="boolean", nullable=false)
     */
    private $auto;

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
        $this->auto = false;
		$this->createdAt = new \DateTime("now");
		$this->updatedAt = new \DateTime("now");

		$this->products = new ArrayCollection();
		$this->mixProducts = new ArrayCollection();
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
     * Gets the value of startTime.
     *
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Sets the value of startTime.
     *
     * @param \DateTime $startTime the start time
     *
     * @return self
     */
    public function setStartTime(\DateTime $startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Gets the value of finishDate.
     *
     * @return \DateTime
     */
    public function getFinishDate()
    {
        return $this->finishDate;
    }

    /**
     * Sets the value of finishDate.
     *
     * @param \DateTime $finishDate the finish date
     *
     * @return self
     */
    public function setFinishDate(\DateTime $finishDate)
    {
        $this->finishDate = $finishDate;

        return $this;
    }

    /**
     * Gets the value of endTime.
     *
     * @return \DateTime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Sets the value of endTime.
     *
     * @param \DateTime $endTime the end time
     *
     * @return self
     */
    public function setEndTime(\DateTime $endTime)
    {
        $this->endTime = $endTime;

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
     * Gets the value of mixProducts.
     *
     * @return mixed
     */
    public function getMixProducts()
    {
        return $this->mixProducts;
    }

    /**
     * Sets the value of mixProducts.
     *
     * @param mixed $mixProducts the mix products
     *
     * @return self
     */
    public function setMixProducts($mixProducts)
    {
        $this->mixProducts = $mixProducts;

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
     * Gets the value of auto.
     *
     * @return mixed
     */
    public function getAuto()
    {
        return $this->auto;
    }

    /**
     * Sets the value of auto.
     *
     * @param mixed $auto the auto
     *
     * @return self
     */
    public function setAuto($auto)
    {
        $this->auto = $auto;

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