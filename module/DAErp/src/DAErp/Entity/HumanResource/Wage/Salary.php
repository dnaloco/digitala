<?php
namespace DAErp\Entity\HumanResource\Wage;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\HumanResource\Wage\SalaryInterface;

/**
 *
 * @ORM\Table(name="daerp_human_resource_wage_salaries")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Salary
implements SalaryInterface
{
	/**
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
	private $id;

	/**
     * @var string
     *
     * @ORM\Column(name="cost_by", type="enum_costby", nullable=true)
     */
	private $costBy;

	/**
	 *
	 * @ORM\Column(name="cost", type="decimal", precision=7, scale=2, nullable=false)
	 */
	private $cost;

	/**
     * @var string
     *
     * @ORM\Column(name="pay_days", type="array", nullable=true)
     */
	private $payDays;

	/**
     * @ORM\OneToOne(targetEntity="DACore\IEntities\Erp\HumanResource\PartnerSuperclassInterface", inversedBy="registeredSalary")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
	private $partner;

	/**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=false)
     */
    protected $updatedAt;

    public function __construct(array $data = array())
    {
        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");

        (new Hydrator\ClassMethods)->hydrate($data, $this);
    }



    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of costBy.
     *
     * @return string
     */
    public function getCostBy()
    {
        return $this->costBy;
    }

    /**
     * Sets the value of costBy.
     *
     * @param string $costBy the cost by
     *
     * @return self
     */
    public function setCostBy($costBy)
    {
        $this->costBy = $costBy;

        return $this;
    }

    /**
     * Gets the value of cost.
     *
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Sets the value of cost.
     *
     * @param mixed $cost the cost
     *
     * @return self
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Gets the value of payDays.
     *
     * @return string
     */
    public function getPayDays()
    {
        return $this->payDays;
    }

    /**
     * Sets the value of payDays.
     *
     * @param string $payDays the pay days
     *
     * @return self
     */
    public function setPayDays($payDays)
    {
        $this->payDays = $payDays;

        return $this;
    }

    /**
     * Gets the value of partner.
     *
     * @return mixed
     */
    public function getPartner()
    {
        return $this->partner;
    }

    /**
     * Sets the value of partner.
     *
     * @param mixed $partner the partner
     *
     * @return self
     */
    public function setPartner($partner)
    {
        $this->partner = $partner;

        return $this;
    }

    /**
     * Gets the value of createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets the value of createdAt.
     *
     * @param \DateTime $createdAt the created at
     *
     * @return self
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Gets the value of updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets the value of updatedAt.
     *
     * @param \DateTime $updatedAt the updated at
     *
     * @return self
     * 
     * @ORM\PrePersist
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime("now");

        return $this;
    }
}