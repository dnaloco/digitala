<?php
namespace DAErp\Entity\Financial\Accounts;

use Doctrine\ORM\Mapping as ORM;
use R2Erp\Entity\Financial\AccountSuperClass;
use Zend\Stdlib\Hydrator;

/**
 *
 * @ORM\Table(name="r2_erp_financial_accounts_banks")
 * @ORM\Entity
 */
class Bank extends AccountSuperClass {
	/**
	 *
	 * @ORM\Column(name="title", type="string", nullable=false)
	 */
	private $title;

	/**
	 *
	 * @ORM\Column(name="agency", type="integer", nullable=false)
	 */
	private $agency;

	/**
	 *
	 * @ORM\Column(name="number", type="integer", nullable=false)
	 */
	private $number;

	/**
	 *
	 * @ORM\Column(name="digit", type="integer", nullable=false)
	 */
	private $digit;

	private $currentAmount;

	private $savingAmount;

	public function __construct(array $options = array()) {
		$this->__construct($options);
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}

}