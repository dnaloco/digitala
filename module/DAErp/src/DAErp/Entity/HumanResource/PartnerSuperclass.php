<?php
namespace DAErp\Entity\HumanResource;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\HumanResource\PartnerSuperclassInterface;

/**
 * @ORM\Table(name="daerp_human_resource_superclass_partners")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap(
 * 		{
 *   		"PartnerSuperclass" = "PartnerSuperclass",
 *   		"CopartnerPartner" = "DAErp\Entity\HumanResource\Partner\Copartner",
 *   		"EmployeePartner" = "DAErp\Entity\HumanResource\Partner\Employee",
 *      })
 */
class PartnerSuperclass implements PartnerSuperclassInterface
{
	/**
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
	private $id;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Base\PersonInterface")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
	private $person;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\HumanResource\Organization\OccupationInterface")
     * @ORM\JoinColumn(name="occupation_id", referencedColumnName="id")
     */
	private $occupation;


	/**
     * @ORM\OneToMany(targetEntity="DACore\IEntities\Erp\Financial\AccountSuperclassInterface", mappedBy="partner")
     */
	private $accounts;

	/**
	 *
	 * @ORM\Column(name="on_comission", type="boolean")
	 */
	private $onComission;

	/**
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Order\Expense\OrderInterface")
     * @ORM\JoinTable(name="daerp_human_resource_superclass_partners_comissions",
     *      joinColumns={@ORM\JoinColumn(name="partner_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="comission_id", referencedColumnName="id", unique=true)}
     *      )
     */
	private $comissions;

	/**
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Order\Expense\OrderInterface")
     * @ORM\JoinTable(name="daerp_human_resource_superclass_partners_rewards",
     *      joinColumns={@ORM\JoinColumn(name="partner_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="reward_id", referencedColumnName="id", unique=true)}
     *      )
     */
	private $rewards;

	/**
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Order\Expense\OrderInterface")
     * @ORM\JoinTable(name="daerp_human_resource_superclass_partners_benefits",
     *      joinColumns={@ORM\JoinColumn(name="partner_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="benefit_id", referencedColumnName="id", unique=true)}
     *      )
     */
	private $benefits;

	/**
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Order\Expense\OrderInterface")
     * @ORM\JoinTable(name="daerp_human_resource_superclass_partners_salaries",
     *      joinColumns={@ORM\JoinColumn(name="partner_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="salary_id", referencedColumnName="id", unique=true)}
     *      )
     */
	private $salaries;

	/**
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Order\Expense\OrderInterface")
     * @ORM\JoinTable(name="daerp_human_resource_superclass_partners_profit_shares",
     *      joinColumns={@ORM\JoinColumn(name="partner_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="profit_share_id", referencedColumnName="id", unique=true)}
     *      )
     */
	private $profitShares;

	/**
     * @var \DateTime
     *
     * @ORM\Column(name="hired_date", type="datetime", nullable=false)
     */
	private $hiredDate;

	/**
     * @var \DateTime
     *
     * @ORM\Column(name="fired_date", type="datetime", nullable=false)
     */
	private $firedDate;

    // TODO: criar enum de status de funcionário;
    private $status;

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

    public function __construct(array $data)
    {
        $this->accounts = new ArrayCollection();

        $this->comissions = new ArrayCollection();
        $this->rewards = new ArrayCollection();
        $this->benefits = new ArrayCollection();
        $this->salaries = new ArrayCollection();
        $this->profitShares = new ArrayCollection();

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
     * Gets the value of person.
     *
     * @return mixed
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Sets the value of person.
     *
     * @param mixed $person the person
     *
     * @return self
     */
    public function setPerson($person)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Gets the value of occupation.
     *
     * @return mixed
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * Sets the value of occupation.
     *
     * @param mixed $occupation the occupation
     *
     * @return self
     */
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;

        return $this;
    }

    /**
     * Gets the value of accounts.
     *
     * @return mixed
     */
    public function getAccounts()
    {
        return $this->accounts;
    }

    /**
     * Sets the value of accounts.
     *
     * @param mixed $accounts the accounts
     *
     * @return self
     */
    public function setAccounts($accounts)
    {
        $this->accounts = $accounts;

        return $this;
    }

    /**
     * Gets the value of onComission.
     *
     * @return mixed
     */
    public function getOnComission()
    {
        return $this->onComission;
    }

    /**
     * Sets the value of onComission.
     *
     * @param mixed $onComission the on comission
     *
     * @return self
     */
    public function setOnComission($onComission)
    {
        $this->onComission = $onComission;

        return $this;
    }

    /**
     * Gets the joinColumns={@ORM\JoinColumn(name="partner_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="comission_id", referencedColumnName="id", unique=true)}
).
     *
     * @return mixed
     */
    public function getComissions()
    {
        return $this->comissions;
    }

    /**
     * Sets the joinColumns={@ORM\JoinColumn(name="partner_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="comission_id", referencedColumnName="id", unique=true)}
).
     *
     * @param mixed $comissions the comissions
     *
     * @return self
     */
    public function setComissions($comissions)
    {
        $this->comissions = $comissions;

        return $this;
    }

    /**
     * Gets the joinColumns={@ORM\JoinColumn(name="partner_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="reward_id", referencedColumnName="id", unique=true)}
).
     *
     * @return mixed
     */
    public function getRewards()
    {
        return $this->rewards;
    }

    /**
     * Sets the joinColumns={@ORM\JoinColumn(name="partner_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="reward_id", referencedColumnName="id", unique=true)}
).
     *
     * @param mixed $rewards the rewards
     *
     * @return self
     */
    public function setRewards($rewards)
    {
        $this->rewards = $rewards;

        return $this;
    }

    /**
     * Gets the joinColumns={@ORM\JoinColumn(name="partner_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="benefit_id", referencedColumnName="id", unique=true)}
).
     *
     * @return mixed
     */
    public function getBenefits()
    {
        return $this->benefits;
    }

    /**
     * Sets the joinColumns={@ORM\JoinColumn(name="partner_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="benefit_id", referencedColumnName="id", unique=true)}
).
     *
     * @param mixed $benefits the benefits
     *
     * @return self
     */
    public function setBenefits($benefits)
    {
        $this->benefits = $benefits;

        return $this;
    }

    /**
     * Gets the joinColumns={@ORM\JoinColumn(name="partner_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="benefit_id", referencedColumnName="id", unique=true)}
).
     *
     * @return mixed
     */
    public function getSalaries()
    {
        return $this->salaries;
    }

    /**
     * Sets the joinColumns={@ORM\JoinColumn(name="partner_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="benefit_id", referencedColumnName="id", unique=true)}
).
     *
     * @param mixed $salaries the salaries
     *
     * @return self
     */
    public function setSalaries($salaries)
    {
        $this->salaries = $salaries;

        return $this;
    }

    /**
     * Gets the joinColumns={@ORM\JoinColumn(name="partner_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="profit_share_id", referencedColumnName="id", unique=true)}
).
     *
     * @return mixed
     */
    public function getProfitShares()
    {
        return $this->profitShares;
    }

    /**
     * Sets the joinColumns={@ORM\JoinColumn(name="partner_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="profit_share_id", referencedColumnName="id", unique=true)}
).
     *
     * @param mixed $profitShares the profit shares
     *
     * @return self
     */
    public function setProfitShares($profitShares)
    {
        $this->profitShares = $profitShares;

        return $this;
    }

    /**
     * Gets the value of hiredDate.
     *
     * @return \DateTime
     */
    public function getHiredDate()
    {
        return $this->hiredDate;
    }

    /**
     * Sets the value of hiredDate.
     *
     * @param \DateTime $hiredDate the hired date
     *
     * @return self
     */
    public function setHiredDate(\DateTime $hiredDate)
    {
        $this->hiredDate = $hiredDate;

        return $this;
    }

    /**
     * Gets the value of firedDate.
     *
     * @return \DateTime
     */
    public function getFiredDate()
    {
        return $this->firedDate;
    }

    /**
     * Sets the value of firedDate.
     *
     * @param \DateTime $firedDate the fired date
     *
     * @return self
     */
    public function setFiredDate(\DateTime $firedDate)
    {
        $this->firedDate = $firedDate;

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