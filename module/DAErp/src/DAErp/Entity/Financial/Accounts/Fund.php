<?php
namespace R2Erp\Entity\Financial\Accounts;

use Doctrine\ORM\Mapping as ORM;
use R2Erp\Entity\Financial\AccountSuperClass;

/**
 *
 * @ORM\Table(name="r2_erp_financial_accounts_founds")
 * @ORM\Entity
 */
class Fund extends AccountSuperClass {
	/**
	 * @var string
	 *
	 * @ORM\Column(name="purpose", type="string", nullable=true)
	 */
	private $purpose;

	public function __construct(array $options = array()) {
		$this->__construct($options);
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}
}