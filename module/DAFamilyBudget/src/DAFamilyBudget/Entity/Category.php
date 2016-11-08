<?php
namespace DAFamilyBudget\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\FamilyBudget\CategoryInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @ORM\Table(name="dafb_categories")
 * @ORM\Entity
 */
class Category
implements CategoryInterface
{
	/**
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\User\UserInterface")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
	 **/
	private $user;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="title", type="string", length=255, nullable=false)
	 */
	private $title;

	/**
	 * @ORM\Column(name="type", type="enum_billingtype", nullable=false)
	 */
	private $type;

	/**
	 *
	 * @ORM\Column(name="intended_bill_amount_per_month", type="decimal", precision=7, scale=2, nullable=true)
	 */
	private $intendedBillAmountPerMonth;

	/**
     * @ORM\OneToMany(targetEntity="DACore\IEntities\FamilyBudget\BillingInterface", mappedBy="category")
     */
    private $billings;

	public function __construct(array $data = array()) {

		$this->billings = new ArrayCollection();
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
     * Gets the value of user.
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Sets the value of user.
     *
     * @param mixed $user the user
     *
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Gets the value of title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the value of title.
     *
     * @param string $title the title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Gets the value of type.
     *
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the value of type.
     *
     * @param mixed $type the type
     *
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Gets the value of intendedBillAmountPerMonth.
     *
     * @return mixed
     */
    public function getIntendedBillAmountPerMonth()
    {
        return $this->intendedBillAmountPerMonth;
    }

    /**
     * Sets the value of intendedBillAmountPerMonth.
     *
     * @param mixed $intendedBillAmountPerMonth the intended bill amount per month
     *
     * @return self
     */
    public function setIntendedBillAmountPerMonth($intendedBillAmountPerMonth)
    {
        $this->intendedBillAmountPerMonth = $intendedBillAmountPerMonth;

        return $this;
    }

    /**
     * Gets the value of billings.
     *
     * @return mixed
     */
    public function getBillings()
    {
        return $this->billings;
    }

    /**
     * Sets the value of billings.
     *
     * @param mixed $billings the billings
     *
     * @return self
     */
    public function setBillings($billings)
    {
        $this->billings = $billings;

        return $this;
    }
}