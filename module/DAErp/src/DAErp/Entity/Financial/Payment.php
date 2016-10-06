<?php
namespace R2Erp\Entity\Financial;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 *
 * @ORM\Table(name="r2_erp_financial_payments")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Payment {
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
	 * @ORM\Column(name="amount_income", type="decimal", precision=2, nullable=false)
	 */
	private $amountIncome;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="amount_outcome", type="decimal", precision=2, nullable=false)
	 */
	private $amountOutcome;

	/**
	 * @ORM\ManyToOne(targetEntity="R2Base\Entity\Currency")
	 * @ORM\JoinColumn(name="currency", referencedColumnName="id", nullable=false)
	 */
	private $currency;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="invoice_date", type="datetime", nullable=false)
	 */
	private $invoiceDate;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="expiration_date", type="datetime", nullable=false)
	 */
	private $expirationDate;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="payment_date", type="datetime", nullable=false)
	 */
	private $paymentDate;

	/**
	 * @ORM\ManyToOne(targetEntity="R2Erp\Entity\Order\OrderSuperClass", inversedBy="payments")
	 * @ORM\JoinColumn(name="order", referencedColumnName="id")
	 */
	private $order;

	/**
	 * @ORM\Column(name="payment_method", type="string", length=75, nullable=false)
	 */
	private $paymentMethod;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="credit_card_auth_code", type="string", nullable=true)
	 */
	private $creditCardAuthCode;

	/**
	 * @ORM\ManyToOne(targetEntity="R2Erp\Entity\Financial\AccountSuperClass")
	 * @ORM\JoinColumn(name="to_account", referencedColumnName="id", nullable=true)
	 **/
	private $toAccount;

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

	public function __construct(array $options = array()) {
		$this->createdAt = new \DateTime("now");
		$this->updatedAt = new \DateTime("now");
		$this->invoiceDate = $this->createdAt;
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}

}