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
	private $id;

	/**
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Base\CompanyInterface")
	 * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=true)
	 **/
	private $company;

	/**
     * @ORM\OneToMany(targetEntity="DACore\IEntities\Erp\Shipper\TimelyRatingInterface", mappedBy="shipper")
     */
    private $ratings;

    /**
	 * @var string
	 *
	 * @ORM\Column(name="title", type="enum_shipperstatus", length=50, nullable=true)
	 */
	private $status;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="notes", type="text", nullable=true)
	 */
	private $notes;

	public function __construct(array $data = array()) {
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

    /**
     * Gets the value of ratings.
     *
     * @return mixed
     */
    public function getRatings()
    {
        return $this->ratings;
    }

    /**
     * Sets the value of ratings.
     *
     * @param mixed $ratings the ratings
     *
     * @return self
     */
    public function setRatings($ratings)
    {
        $this->ratings = $ratings;

        return $this;
    }

    /**
     * Gets the value of status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the value of status.
     *
     * @param string $status the status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Gets the value of notes.
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Sets the value of notes.
     *
     * @param string $notes the notes
     *
     * @return self
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }
}