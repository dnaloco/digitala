<?php
namespace DAErp\Entity\Financial\Accounts;

use Doctrine\ORM\Mapping as ORM;
use R2Erp\Entity\Financial\AccountSuperClass;
use Zend\Stdlib\Hydrator;

/**
 *
 * @ORM\Table(name="r2_erp_financial_accounts_comissions")
 * @ORM\Entity
 */
class Comission extends AccountSuperClass {

	/**
	 * @ORM\ManyToOne(targetEntity="R2Erp\Entity\Order\Sale\Order")
	 * @ORM\JoinColumn(name="$has_user_id", referencedColumnName="id", nullable=false)
	 */
	private $saleOrder;

	public function __construct(array $options = array()) {
		$this->__construct($options);
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}

}