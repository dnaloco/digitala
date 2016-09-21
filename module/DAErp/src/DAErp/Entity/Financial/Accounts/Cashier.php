<?php
namespace DAErp\Entity\Financial\Accounts;

use Doctrine\ORM\Mapping as ORM;
use R2Erp\Entity\Financial\AccountSuperClass;
use Zend\Stdlib\Hydrator;

/**
 *
 * @ORM\Table(name="r2_erp_financial_accounts_cashiers")
 * @ORM\Entity
 */
class Cashier extends AccountSuperClass {
	private $oneCentAmount;
	private $fiveCentAmount;
	private $tenCentAmount;
	private $twentyCentAmount;
	private $twentyFiveCentAmount;
	private $fiftyCentAmount;
	private $oneAmount;
	private $twoAmount;
	private $fiveAmount;
	private $tenAmount;
	private $twentyAmount;
	private $fiftyAmount;
	private $hundredAmount;

	public function __construct(array $options = array()) {
		$this->__construct($options);
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}
}