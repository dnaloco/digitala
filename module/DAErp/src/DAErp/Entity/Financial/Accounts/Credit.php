<?php
namespace DAErp\Entity\Financial\Accounts;

use Doctrine\ORM\Mapping as ORM;
use R2Erp\Entity\Financial\AccountSuperClass;
use Zend\Stdlib\Hydrator;

use DACore\IEntities\Erp\Financial\Accounts\CreditInterface;

/**
 *
 * @ORM\Table(name="daerp_financial_accounts_credits")
 * @ORM\Entity
 */
class Credit extends AccountSuperClass
implements CreditInterface
{
	/**
	 *
	 * @ORM\Column(name="pay_day", type="datetime", nullable=false)
	 */
	private $payDay;

	public function __construct(array $data = array()) {
		parent::__construct($data);
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

    /**
     * Gets the value of payDay.
     *
     * @return mixed
     */
    public function getPayDay()
    {
        return $this->payDay;
    }

    /**
     * Sets the value of payDay.
     *
     * @param mixed $payDay the pay day
     *
     * @return self
     */
    public function setPayDay($payDay)
    {
        $this->payDay = $payDay;

        return $this;
    }
}