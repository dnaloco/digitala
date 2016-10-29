<?php
namespace DAErp\Entity\Promotion;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Promotion\MarketPromotionInterface;

/**
 *
 * @ORM\Table(name="daerp_promotion_market_promotions")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class MarketPromotion
implements MarketPromotionInterface
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
	 * @ORM\Column(name="description", type="string", length=255, nullable=true)
	 */
	private $description;

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
	 * @var \DateTime
	 *
	 * @ORM\Column(name="start_time", type="time")
	 */
	private $startTime;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="start_date", type="datetime")
	 */
	private $startDate;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="end_time", type="time")
	 */
	private $endTime;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="end_date", type="datetime")
	 */
	private $endDate;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="week_days", type="array")
	 */
	private $weekDays;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Product\ProductInterface")
	 * @ORM\JoinTable(name="daerp_promotion_market_promotion_products",
	 *      joinColumns={@ORM\JoinColumn(name="market_promotion_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")}
	 *      )
	 **/
	private $products;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Product\DepartmentInterface")
	 * @ORM\JoinTable(name="daerp_promotion_market_promotion_departments",
	 *      joinColumns={@ORM\JoinColumn(name="market_promotion_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="department_id", referencedColumnName="id")}
	 *      )
	 **/
	private $departments;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Product\CategoryInterface")
	 * @ORM\JoinTable(name="daerp_promotion_market_promotion_categories",
	 *      joinColumns={@ORM\JoinColumn(name="market_promotion_id", referencedColumnName="id")},
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
     * Gets the value of weekDays.
     *
     * @return \DateTime
     */
    public function getWeekDays()
    {
        return $this->weekDays;
    }

    /**
     * Sets the value of weekDays.
     *
     * @param \DateTime $weekDays the week days
     *
     * @return self
     */
    public function setWeekDays(\DateTime $weekDays)
    {
        $this->weekDays = $weekDays;

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