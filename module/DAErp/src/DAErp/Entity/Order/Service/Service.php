<?php
namespace DAErp\Entity\Order\Service;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use Doctrine\Common\Collections\ArrayCollection;
use DACore\IEntities\Erp\Order\Service\ServiceInterface;
/**
 *
 * @ORM\Table(name="daerp_order_service_services")
 * @ORM\Entity
 */
class Service
implements ServiceInterface
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
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Order\Expense\ExpenseInterface")
     * @ORM\JoinTable(name="daerp_order_services_expenses",
     *      joinColumns={@ORM\JoinColumn(name="expense_order_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="expense_id", referencedColumnName="id", unique=true)}
     *      )
     **/
	private $expenses;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="time_quantity", type="float", nullable=false)
	 */
	private $timeQuantity;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="time_price", type="decimal", precision=7, scale=2, nullable=false)
	 */
	private $unitPrice;

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
	 * @ORM\Column(name="total_price", type="decimal", precision=7, scale=2, nullable=false)
	 */
	private $totalPrice;

	public function __construct(array $data = array()) {
        $this->expenses = new ArrayCollection();
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
     * Gets the value of expenses.
     *
     * @return mixed
     */
    public function getExpenses()
    {
        return $this->expenses;
    }

    /**
     * Sets the value of expenses.
     *
     * @param mixed $expenses the expenses
     *
     * @return self
     */
    public function setExpenses($expenses)
    {
        $this->expenses = $expenses;

        return $this;
    }

    /**
     * Gets the value of timeQuantity.
     *
     * @return string
     */
    public function getTimeQuantity()
    {
        return $this->timeQuantity;
    }

    /**
     * Sets the value of timeQuantity.
     *
     * @param string $timeQuantity the time quantity
     *
     * @return self
     */
    public function setTimeQuantity($timeQuantity)
    {
        $this->timeQuantity = $timeQuantity;

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
     * Gets the value of totalPrice.
     *
     * @return string
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Sets the value of totalPrice.
     *
     * @param string $totalPrice the total price
     *
     * @return self
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }
}