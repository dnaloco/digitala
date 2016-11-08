<?php
namespace DAErp\Entity\Financial\Accounts;

use Doctrine\ORM\Mapping as ORM;
use DAErp\Entity\Financial\AccountSuperclass;
use Zend\Stdlib\Hydrator;

use DACore\IEntities\Erp\Financial\Accounts\BankInterface;
/**
 *
 * @ORM\Table(name="daerp_financial_accounts_banks")
 * @ORM\Entity
 */
class Bank extends AccountSuperclass
implements BankInterface
{
	/**
	 *
	 * @ORM\Column(name="name", type="string", length=100, nullable=false)
	 */
	private $name;

    /**
     *
     * @ORM\Column(name="code", type="smallint", nullable=false)
     */
    private $code;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Base\PersonInterface")
     * @ORM\JoinColumn(name="manager_id", referencedColumnName="id")
     */
	private $manager;

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
	 * @ORM\Column(name="digit", type="smallint", nullable=false)
	 */
	private $digit;

    /**
     * @ORM\OneToOne(targetEntity="DACore\IEntities\Base\AddressInterface", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id", nullable=true)
     **/
    private $address;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="saving_amount", type="decimal", precision=7, scale=2, nullable=false)
	 */
	private $savingAmount;

	public function __construct(array $data = array()) {
		parent::__construct($data);
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}


    /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of code.
     *
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets the value of code.
     *
     * @param mixed $code the code
     *
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Gets the value of manager.
     *
     * @return mixed
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * Sets the value of manager.
     *
     * @param mixed $manager the manager
     *
     * @return self
     */
    public function setManager($manager)
    {
        $this->manager = $manager;

        return $this;
    }

    /**
     * Gets the value of agency.
     *
     * @return mixed
     */
    public function getAgency()
    {
        return $this->agency;
    }

    /**
     * Sets the value of agency.
     *
     * @param mixed $agency the agency
     *
     * @return self
     */
    public function setAgency($agency)
    {
        $this->agency = $agency;

        return $this;
    }

    /**
     * Gets the value of number.
     *
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Sets the value of number.
     *
     * @param mixed $number the number
     *
     * @return self
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Gets the value of digit.
     *
     * @return mixed
     */
    public function getDigit()
    {
        return $this->digit;
    }

    /**
     * Sets the value of digit.
     *
     * @param mixed $digit the digit
     *
     * @return self
     */
    public function setDigit($digit)
    {
        $this->digit = $digit;

        return $this;
    }

    /**
     * Gets the value of address.
     *
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the value of address.
     *
     * @param mixed $address the address
     *
     * @return self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Gets the value of savingAmount.
     *
     * @return string
     */
    public function getSavingAmount()
    {
        return $this->savingAmount;
    }

    /**
     * Sets the value of savingAmount.
     *
     * @param string $savingAmount the saving amount
     *
     * @return self
     */
    public function setSavingAmount($savingAmount)
    {
        $this->savingAmount = $savingAmount;

        return $this;
    }
}