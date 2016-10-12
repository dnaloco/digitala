<?php
namespace DAErp\Entity\HumanResource\Recruitment;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\HumanResource\Recruitment\CandidateInterface;

/**
 *
 * @ORM\Table(name="daerp_human_resource_recruitment_candidates")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Candidate implements CandidateInterface
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
     * @ORM\OneToOne(targetEntity="DACore\IEntities\Base\PersonInterface")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
	private $person;

	/**
     * @ORM\OneToOne(targetEntity="DACore\IEntities\Erp\HumanResource\Recruitment\CurriculumInterface")
     * @ORM\JoinColumn(name="curriculum_id", referencedColumnName="id")
     */
	private $curriculum;

	/**
     * @var string
     *
     * @ORM\Column(name="recruitment_step", type="enum_recruitmentstep", nullable=false)
     */
	private $recruitmentStep;

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
     * Gets the value of curriculum.
     *
     * @return mixed
     */
    public function getCurriculum()
    {
        return $this->curriculum;
    }

    /**
     * Sets the value of curriculum.
     *
     * @param mixed $curriculum the curriculum
     *
     * @return self
     */
    public function setCurriculum($curriculum)
    {
        $this->curriculum = $curriculum;

        return $this;
    }

    /**
     * Gets the value of recruitmentStep.
     *
     * @return string
     */
    public function getRecruitmentStep()
    {
        return $this->recruitmentStep;
    }

    /**
     * Sets the value of recruitmentStep.
     *
     * @param string $recruitmentStep the recruitment step
     *
     * @return self
     */
    public function setRecruitmentStep($recruitmentStep)
    {
        $this->recruitmentStep = $recruitmentStep;

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