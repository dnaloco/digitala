<?php
namespace DAErp\Entity\MyBusiness;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\MyBusiness\MatrixInterface;
/**
 *
 * @ORM\Table(name="daerp_mybusiness_matrix")
 * @ORM\Entity
 */
class Matrix implements MatrixInterface
{
	/**
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @ORM\OneToOne(targetEntity="DACore\IEntities\Base\CompanyInterface", cascade={"persist", "remove"})
	 * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=false)
	 **/
	private $company;

	/**
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\HumanResource\PartnerSuperclassInterface")
     * @ORM\JoinTable(name="daerp_mybusiness_matrix_partners",
     *      joinColumns={@ORM\JoinColumn(name="matrix_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="partner_id", referencedColumnName="id")}
     *      )
     **/
    private $partners;

	public function __construct(array $data = array()) {
		$this->partners = new ArrayCollection();

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
     * Gets the value of company.
     *
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Sets the value of company.
     *
     * @param mixed $company the company
     *
     * @return self
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Gets the value of partners.
     *
     * @return mixed
     */
    public function getPartners()
    {
        return $this->partners;
    }

    /**
     * Sets the value of partners.
     *
     * @param mixed $partners the partners
     *
     * @return self
     */
    public function setPartners($partners)
    {
        $this->partners = $partners;

        return $this;
    }
}