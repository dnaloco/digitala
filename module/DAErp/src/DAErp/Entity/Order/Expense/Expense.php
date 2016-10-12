<?php

namespace R2Erp\Entity\Order\Expense;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 *
 * @ORM\Table(name="daerp_order_expense_expenses")
 * @ORM\Entity
 */
class Expense {
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
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\HumanResource\Organization\DepartmentInterface")
     * @ORM\JoinColumn(name="department_id", referencedColumnName="id")
     */
	private $category;

	/**
	 * @var float
	 *
	 * @ORM\Column(name="consumption", type="float", nullable=false)
	 */
	private $consumption;

	/**
	 * @ORM\ManyToOne(targetEntity="R2Erp\Entity\Order\Store\Store")
	 * @ORM\JoinColumn(name="store", referencedColumnName="id", nullable=false)
	 **/
	private $store;

	/**
	 * @ORM\ManyToOne(targetEntity="R2Base\Entity\UnitType")
	 * @ORM\JoinColumn(name="unit_type", referencedColumnName="id", nullable=false)
	 **/
	private $unitType;

	/**
	 * @ORM\Column(name="description", type="text", nullable=false)
	 */
	private $description;

	/**
	 * @ORM\Column(name="expense_type", type="string", length=15, nullable=false)
	 */
	private $expenseType;

	public function __construct(array $options = array()) {
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}


}