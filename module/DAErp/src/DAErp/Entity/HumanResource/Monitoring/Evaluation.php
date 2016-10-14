<?php
namespace DAErp\Entity\HumanResource\Monitoring;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\HumanResource\Monitoring\EvaluationInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @ORM\Table(name="daerp_human_resource_monitoring_evaluations")
 * @ORM\Entity
 */
class Evaluation
implements EvaluationInterface
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
     * @ORM\Column(name="title", type="string", length=60, nullable=false)
     */
	private $title;

	/**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
	private $description;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\HumanResource\Monitoring\EvaluationRatingInterface")
	 * @ORM\JoinTable(name="daerp_human_resource_monitoring_evaluations_evaluation_ratings",
	 *      joinColumns={@ORM\JoinColumn(name="evaluation_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="rating_id", referencedColumnName="id", unique=true)}
	 *      )
	 */
	private $ratings;

	public function __construct(array $data = array()) {

		$this->ratings = new ArrayCollection();

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
     * Gets the value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the value of description.
     *
     * @param string $description the description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets the joinColumns={@ORM\JoinColumn(name="evaluation_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="rating_id", referencedColumnName="id", unique=true)}
).
     *
     * @return mixed
     */
    public function getRatings()
    {
        return $this->ratings;
    }

    /**
     * Sets the joinColumns={@ORM\JoinColumn(name="evaluation_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="rating_id", referencedColumnName="id", unique=true)}
).
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
}