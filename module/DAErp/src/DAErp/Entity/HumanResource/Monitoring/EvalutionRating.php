<?php
namespace DAErp\Entity\HumanResource\Monitoring;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\HumanResource\Monitoring\EvaluationRatingInterface;

/**
 *
 * @ORM\Table(name="daerp_human_resource_monitoring_evaluation_ratings")
 * @ORM\Entity
 */
class Evaluation
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
     * @ORM\JoinColumn(name="appraiser_id", referencedColumnName="id", nullable=true)
     **/
	private $appraiser;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\HumanResource\PartnerSuperclassInterface")
     * @ORM\JoinColumn(name="appraiser_id", referencedColumnName="id", nullable=true)
     **/
	private $partner;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="rating", type="decimal", precision=8, nullable=false)
	 */
	private $rating;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="notes", type="text", nullable=false)
	 */
	private $notes;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="created_at", type="datetime", nullable=false)
	 */
	private $createdAt;

	public function __construct(array $options = array()) {
		$this->createdAt = new \DateTime("now");

		(new Hydrator\ClassMethods)->hydrate($options, $this);

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
     * Gets the value of appraiser.
     *
     * @return mixed
     */
    public function getAppraiser()
    {
        return $this->appraiser;
    }

    /**
     * Sets the value of appraiser.
     *
     * @param mixed $appraiser the appraiser
     *
     * @return self
     */
    public function setAppraiser($appraiser)
    {
        $this->appraiser = $appraiser;

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
     * Gets the value of rating.
     *
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Sets the value of rating.
     *
     * @param string $rating the rating
     *
     * @return self
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

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
}