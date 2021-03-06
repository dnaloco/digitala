<?php
namespace DAErp\Entity\Financial\Accounts;

use Doctrine\ORM\Mapping as ORM;
use DAErp\Entity\Financial\AccountSuperclass;
use Zend\Stdlib\Hydrator;

use DACore\IEntities\Erp\Financial\Accounts\MoneyInterface;

/**
 *
 * @ORM\Table(name="daerp_financial_accounts_moneys")
 * @ORM\Entity
 */
class Money extends AccountSuperclass
implements MoneyInterface
{
	public function __construct(array $data = array()) {
		parent::__construct($data);
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}
}