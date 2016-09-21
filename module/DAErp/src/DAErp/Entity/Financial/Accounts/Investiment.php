<?php
namespace R2Erp\Entity\Financial\Accounts;

use Doctrine\ORM\Mapping as ORM;
use R2Erp\Entity\Financial\AccountSuperClass;
use Zend\Stdlib\Hydrator;

/**
 *
 * @ORM\Table(name="r2_erp_financial_accounts_investiments")
 * @ORM\Entity
 */
class Investiment extends AccountSuperClass {
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="expires", type="datetime", nullable=false)
	 */
	private $expires;

	public function __construct(array $options = array()) {
		$this->__construct($options);
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}

}