<?php
namespace DAErp\Entity\Supplier;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Supplier\BudgetInterface;

/**
 * @ORM\Table(name="daerp_supplier_budgets")
 * @ORM\Entity
 */
class Budget implements BudgetInterface
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
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Supplier\ProductBudgetInterface")
	 * @ORM\JoinTable(name="daerp_supplier_budgets_product_budgets",
	 *      joinColumns={@ORM\JoinColumn(name="budget_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="product_budget_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $productBudgets;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Supplier\SupplierInterface", inversedBy="budgets")
     * @ORM\JoinColumn(name="supplier_id", referencedColumnName="id")
     */
	private $supplier;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="validity", type="datetime", nullable=false)
	 */
	private $validity;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="total", type="decimal", precision=7, scale=2, nullable=false)
	 */
	private $total;

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
	 * @ORM\Column(name="total_with_discount", type="decimal", precision=7, scale=2, nullable=true)
	 */
	private $totalWithDiscount;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Base\PersonInterface")
     * @@ORM\JoinColumn(name="main_contact_id", referencedColumnName="id")
     */
	private $mainContact;

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

		$this->createdAt = new \DateTime("now");
		$this->updatedAt = new \DateTime("now");

		$this->productBudgets = new ArrayCollection();


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
     * Gets the value of productBudgets.
     *
     * @return mixed
     */
    public function getProductBudgets()
    {
        return $this->productBudgets;
    }

    /**
     * Sets the value of productBudgets.
     *
     * @param mixed $productBudgets the product budgets
     *
     * @return self
     */
    public function setProductBudgets($productBudgets)
    {
        $this->productBudgets = $productBudgets;

        return $this;
    }

    /**
     * Gets the value of supplier.
     *
     * @return mixed
     */
    public function getSupplier()
    {
        return $this->supplier;
    }

    /**
     * Sets the value of supplier.
     *
     * @param mixed $supplier the supplier
     *
     * @return self
     */
    public function setSupplier($supplier)
    {
        $this->supplier = $supplier;

        return $this;
    }

    /**
     * Gets the value of validity.
     *
     * @return \DateTime
     */
    public function getValidity()
    {
        return $this->validity;
    }

    /**
     * Sets the value of validity.
     *
     * @param \DateTime $validity the validity
     *
     * @return self
     */
    public function setValidity(\DateTime $validity)
    {
        $this->validity = $validity;

        return $this;
    }

    /**
     * Gets the value of total.
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Sets the value of total.
     *
     * @param string $total the total
     *
     * @return self
     */
    public function setTotal($total)
    {
        $this->total = $total;

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
     * Gets the value of mainContact.
     *
     * @return mixed
     */
    public function getMainContact()
    {
        return $this->mainContact;
    }

    /**
     * Sets the value of mainContact.
     *
     * @param mixed $mainContact the main contact
     *
     * @return self
     */
    public function setMainContact($mainContact)
    {
        $this->mainContact = $mainContact;

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