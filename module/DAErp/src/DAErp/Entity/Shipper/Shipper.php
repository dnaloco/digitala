<?php
namespace DAErp\Entity\Shipper;


use Zend\Stdlib\Hydrator;
use Doctrine\ORM\Mapping as ORM;
use DACore\IEntities\Erp\Shipper\ShipperInterface;
/**
 *
 * @ORM\Table(name="daerp_shippers")
 * @ORM\Entity
 */
class Shipper implements ShipperInterface
{
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	public $id;

	/**
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Base\CompanyInterface")
	 * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=true)
	 **/
	public $company;

	public function __construct() {
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}


    /**
     * Gets the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param integer $id the id
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

    function getTimelyRatings()
    {

    }
}