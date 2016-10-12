<?php
namespace DAErp\Entity\HumanResource\Partner;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\HumanResource\Partner\EmployeeInterface;
use DAErp\Entity\HumanResource\PartnerSuperclass;
/**
 *
 * @ORM\Table(name="daerp_human_resource_partner_employees")
 * @ORM\Entity
 */
class Employee extends PartnerSuperclass
implements EmployeeInterface
{
	/**
     * @ORM\OneToOne(targetEntity="DACore\IEntities\Erp\HumanResource\Wage\SalaryInterface", mappedBy="partner")
     */
	private $registeredSalary;

	/**
     * @ORM\OneToMany(targetEntity="DACore\IEntities\Erp\HumanResource\Wage\BenefitInterface", mappedBy="partner")
     */
	private $registeredBenefits;

	public function __construct(array $data = array()) {
		parent::__construct($data);

		$this->registeredBenefits = new ArrayCollection();

		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

    /**
     * Gets the value of registeredSalary.
     *
     * @return mixed
     */
    public function getRegisteredSalary()
    {
        return $this->registeredSalary;
    }

    /**
     * Sets the value of registeredSalary.
     *
     * @param mixed $registeredSalary the registered salary
     *
     * @return self
     */
    public function setRegisteredSalary($registeredSalary)
    {
        $this->registeredSalary = $registeredSalary;

        return $this;
    }

    /**
     * Gets the value of registeredBenefits.
     *
     * @return mixed
     */
    public function getRegisteredBenefits()
    {
        return $this->registeredBenefits;
    }

    /**
     * Sets the value of registeredBenefits.
     *
     * @param mixed $registeredBenefits the registered benefits
     *
     * @return self
     */
    public function setRegisteredBenefits($registeredBenefits)
    {
        $this->registeredBenefits = $registeredBenefits;

        return $this;
    }
}