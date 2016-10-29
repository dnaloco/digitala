<?php
namespace DAErp\Entity\Order\Expense;

use Doctrine\ORM\Mapping as ORM;
use DAErp\Entity\Order\OrderSuperclass;
use Zend\Stdlib\Hydrator;
use Doctrine\Common\Collections\ArrayCollection;
use DACore\IEntities\Erp\Order\Expense\OrderInterface;
/**
 *
 * @ORM\Table(name="daerp_order_expense_orders")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Order extends OrderSuperclass
implements OrderInterface
{
	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Order\Expense\ExpenseInterface")
	 * @ORM\JoinTable(name="daerp_order_expense_orders_expenses",
	 *      joinColumns={@ORM\JoinColumn(name="expense_order_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="expense_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $expenses;

	public function __construct(array $data = array()) {
        $this->expenses = new ArrayCollection();
        
        $this->setPaymentType('despesa');

        parent::__construct($data);
		(new Hydrator\ClassMethods)->hydrate($data, $this);
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
}