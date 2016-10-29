<?php

namespace DAErp\Entity\Order\Expense;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Order\Expense\ExpenseInterface;
/**
 *
 * @ORM\Table(name="daerp_order_expense_expenses")
 * @ORM\Entity
 */
class Expense implements ExpenseInterface
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
	 * @ORM\Column(name="title", type="string", length=15, nullable=false)
	 */
	private $title;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Order\Expense\ExpenseCateogoryInterface")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
	private $category;

	/**
	 * @var float
	 *
	 * @ORM\Column(name="consumption", type="float", nullable=false)
	 */
	private $consumption;

	/**
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Order\Store\StoreInterface")
	 * @ORM\JoinColumn(name="store", referencedColumnName="id", nullable=false)
	 **/
	private $store;

	/**
     * @ORM\Column(name="unit_type", type="enum_unittype", nullable=false)
     */
	private $unitType;

	/**
	 * @ORM\Column(name="description", type="text", nullable=false)
	 */
	private $description;

	/**
	 * @ORM\Column(name="expense_type", type="string", length=15, nullable=false)
	 */
	private $expenseType;

	public function __construct(array $data = array()) {
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
     * Gets the value of title.
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the value of title.
     *
     * @param mixed $title the title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

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
     * Gets the value of consumption.
     *
     * @return float
     */
    public function getConsumption()
    {
        return $this->consumption;
    }

    /**
     * Sets the value of consumption.
     *
     * @param float $consumption the consumption
     *
     * @return self
     */
    public function setConsumption($consumption)
    {
        $this->consumption = $consumption;

        return $this;
    }

    /**
     * Gets the value of store.
     *
     * @return mixed
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * Sets the value of store.
     *
     * @param mixed $store the store
     *
     * @return self
     */
    public function setStore($store)
    {
        $this->store = $store;

        return $this;
    }

    /**
     * Gets the value of unitType.
     *
     * @return mixed
     */
    public function getUnitType()
    {
        return $this->unitType;
    }

    /**
     * Sets the value of unitType.
     *
     * @param mixed $unitType the unit type
     *
     * @return self
     */
    public function setUnitType($unitType)
    {
        $this->unitType = $unitType;

        return $this;
    }

    /**
     * Gets the value of description.
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the value of description.
     *
     * @param mixed $description the description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets the value of expenseType.
     *
     * @return mixed
     */
    public function getExpenseType()
    {
        return $this->expenseType;
    }

    /**
     * Sets the value of expenseType.
     *
     * @param mixed $expenseType the expense type
     *
     * @return self
     */
    public function setExpenseType($expenseType)
    {
        $this->expenseType = $expenseType;

        return $this;
    }
}