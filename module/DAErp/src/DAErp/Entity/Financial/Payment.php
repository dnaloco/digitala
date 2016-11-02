<?php
namespace DAErp\Entity\Financial;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Financial\PaymentInterface;

/**
 *
 * @ORM\Table(name="daerp_financial_payments")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Payment implements PaymentInterface
{
	/**
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

    /**
     *
     * @ORM\Column(name="installments", type="smallint", nullable=false)
     */
    private $installments;

    /**
     *
     * @ORM\Column(name="installment_index", type="smallint", nullable=false)
     */
    private $installmentIndex;

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
	 * @ORM\Column(name="invoice_date", type="datetime", nullable=true)
	 */
	private $invoiceDate;

	/**
	 *
	 * @ORM\Column(name="expiration_date", type="datetime", nullable=true)
	 */
	private $expirationDate;

	/**
	 *
	 * @ORM\Column(name="payment_date", type="datetime", nullable=true)
	 */
	private $paymentDate;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Order\OrderSuperclassInterface", inversedBy="payments")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     */
	private $order;

	/**
	 * @ORM\Column(name="payment_method", type="enum_paymentmethod", nullable=false)
	 */
	private $paymentMethod;

	/**
	 * @ORM\Column(name="payment_type", type="enum_paymenttype", nullable=false)
	 */
	private $paymentType;

	/**
	 * @ORM\Column(name="status", type="enum_paymentstatus", nullable=false)
	 */
	private $status;

	/**
	 *
	 * @ORM\Column(name="credit_card_auth_code", type="string", nullable=true)
	 */
	private $creditCardAuthCode;

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

	public function __construct(array $options = array()) {
		$this->createdAt = new \DateTime("now");
		$this->updatedAt = new \DateTime("now");
		$this->invoiceDate = $this->createdAt;
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}


    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of installments.
     *
     * @return mixed
     */
    public function getInstallments()
    {
        return $this->installments;
    }

    /**
     * Sets the value of installments.
     *
     * @param mixed $installments the installments
     *
     * @return self
     */
    public function setInstallments($installments)
    {
        $this->installments = $installments;

        return $this;
    }

    /**
     * Gets the value of installmentIndex.
     *
     * @return mixed
     */
    public function getInstallmentIndex()
    {
        return $this->installmentIndex;
    }

    /**
     * Sets the value of installmentIndex.
     *
     * @param mixed $installmentIndex the installment index
     *
     * @return self
     */
    public function setInstallmentIndex($installmentIndex)
    {
        $this->installmentIndex = $installmentIndex;

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
     * Gets the value of invoiceDate.
     *
     * @return mixed
     */
    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }

    /**
     * Sets the value of invoiceDate.
     *
     * @param mixed $invoiceDate the invoice date
     *
     * @return self
     */
    public function setInvoiceDate($invoiceDate)
    {
        $this->invoiceDate = $invoiceDate;

        return $this;
    }

    /**
     * Gets the value of expirationDate.
     *
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * Sets the value of expirationDate.
     *
     * @param mixed $expirationDate the expiration date
     *
     * @return self
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;

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
     * Gets the value of order.
     *
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Sets the value of order.
     *
     * @param mixed $order the order
     *
     * @return self
     */
    public function setOrder($order)
    {
        $this->order = $order;

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
     * Gets the value of paymentType.
     *
     * @return mixed
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * Sets the value of paymentType.
     *
     * @param mixed $paymentType the payment type
     *
     * @return self
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    /**
     * Gets the value of status.
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the value of status.
     *
     * @param mixed $status the status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Gets the value of creditCardAuthCode.
     *
     * @return mixed
     */
    public function getCreditCardAuthCode()
    {
        return $this->creditCardAuthCode;
    }

    /**
     * Sets the value of creditCardAuthCode.
     *
     * @param mixed $creditCardAuthCode the credit card auth code
     *
     * @return self
     */
    public function setCreditCardAuthCode($creditCardAuthCode)
    {
        $this->creditCardAuthCode = $creditCardAuthCode;

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