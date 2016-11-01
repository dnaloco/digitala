<?php
namespace DAErp\Entity\Supplier;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Supplier\SupplierInterface;

/**
 *
 * @ORM\Table(name="daerp_supplier_suppliers")
 * @ORM\Entity
 */
class Supplier implements SupplierInterface
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
	 * @ORM\OneToOne(targetEntity="DACore\IEntities\Base\CompanyInterface")
	 * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=true)
	 **/
	private $company;

	/**
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Product\ProductInterface", mappedBy="suppliers")
     */
	private $products;

	/**
     * @ORM\OneToMany(targetEntity="DACore\IEntities\Erp\Supplier\BudgetInterface", mappedBy="supplier")
     */
	private $budgets;

    /**
     * @ORM\OneToMany(targetEntity="DACore\IEntities\Erp\Supplier\QualityRatingInterface", mappedBy="supplier")
     */
	private $ratings;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="title", type="enum_supplierstatus", length=50, nullable=false)
	 */
	private $status;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="notes", type="text", nullable=true)
	 */
	private $notes;

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
		$this->status = 'cadastrado';
		$this->createdAt = new \DateTime("now");
		$this->updatedAt = new \DateTime("now");

        $this->products = new ArrayCollection();
		$this->budgets = new ArrayCollection();
		$this->qualityRatings = new ArrayCollection();

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
     * Gets the value of company.
     *
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Sets the value of company.
     *
     * @param mixed $company the company
     *
     * @return self
     */
    public function setCompany($company)
    {
        $this->company = $company;

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
     * Gets the value of budgets.
     *
     * @return mixed
     */
    public function getBudgets()
    {
        return $this->budgets;
    }

    /**
     * Sets the value of budgets.
     *
     * @param mixed $budgets the budgets
     *
     * @return self
     */
    public function setBudgets($budgets)
    {
        $this->budgets = $budgets;

        return $this;
    }

    /**
     * Gets the joinColumns={@ORM\JoinColumn(name="supplier_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="quality_rating_id", referencedColumnName="id")}
).
     *
     * @return mixed
     */
    public function getQualityRatings()
    {
        return $this->qualityRatings;
    }

    /**
     * Sets the joinColumns={@ORM\JoinColumn(name="supplier_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="quality_rating_id", referencedColumnName="id")}
).
     *
     * @param mixed $qualityRatings the quality ratings
     *
     * @return self
     */
    public function setQualityRatings($qualityRatings)
    {
        $this->qualityRatings = $qualityRatings;

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
     * Gets the value of notes.
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Sets the value of notes.
     *
     * @param string $notes the notes
     *
     * @return self
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

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