<?php
namespace DAFamilyBudget\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\FamilyBudget\BillingInterface;
/**
 * @ORM\Table(name="dafb_billings")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Billing
implements BillingInterface
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
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\FamilyBudget\CategoryInterface", inversedBy="features")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
	private $category;

	/**
	 *
	 * @ORM\Column(name="payment_date", type="datetime", nullable=false)
	 */
	private $paymentDate;

	/**
	 * @ORM\Column(name="payment_method", type="enum_paymentmethod", nullable=false)
	 */
	private $paymentMethod;

	/**
	 *
	 * @ORM\Column(name="amount_income", type="decimal", precision=7, scale=2, nullable=true)
	 */
	private $amountIncome;

	/**
	 *
	 * @ORM\Column(name="amount_outcome", type="decimal", precision=7, scale=2, nullable=true)
	 */
	private $amountOutcome;

	/**
	 *
	 * @ORM\Column(name="created_at", type="datetime", nullable=false)
	 */
	private $createdAt;

	/**
	 *
	 * @ORM\Column(name="updated_at", type="datetime", nullable=false)
	 */
	private $updatedAt;

	public function __construct(array $data = array()) {
		$this->createdAt = new \DateTime("now");
		$this->updatedAt = new \DateTime("now");

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
     * Gets the value of category.
     *
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets the value of category.
     *
     * @param mixed $category the category
     *
     * @return self
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Gets the value of paymentDate.
     *
     * @return mixed
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * Sets the value of paymentDate.
     *
     * @param mixed $paymentDate the payment date
     *
     * @return self
     */
    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    /**
     * Gets the value of paymentMethod.
     *
     * @return mixed
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Sets the value of paymentMethod.
     *
     * @param mixed $paymentMethod the payment method
     *
     * @return self
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * Gets the value of amountIncome.
     *
     * @return mixed
     */
    public function getAmountIncome()
    {
        return $this->amountIncome;
    }

    /**
     * Sets the value of amountIncome.
     *
     * @param mixed $amountIncome the amount income
     *
     * @return self
     */
    public function setAmountIncome($amountIncome)
    {
        $this->amountIncome = $amountIncome;

        return $this;
    }

    /**
     * Gets the value of amountOutcome.
     *
     * @return mixed
     */
    public function getAmountOutcome()
    {
        return $this->amountOutcome;
    }

    /**
     * Sets the value of amountOutcome.
     *
     * @param mixed $amountOutcome the amount outcome
     *
     * @return self
     */
    public function setAmountOutcome($amountOutcome)
    {
        $this->amountOutcome = $amountOutcome;

        return $this;
    }

    /**
     * Gets the value of createdAt.
     *
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets the value of createdAt.
     *
     * @param mixed $createdAt the created at
     *
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Gets the value of updatedAt.
     *
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets the value of updatedAt.
     *
     * @param mixed $updatedAt the updated at
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