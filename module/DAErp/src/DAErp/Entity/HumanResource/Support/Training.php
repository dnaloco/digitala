<?php
namespace DAErp\Entity\HumanResource\Support;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\HumanResource\Support\TrainingInterface;

/**
 *
 * @ORM\Table(name="daerp_human_resource_support_trainings")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Training implements TrainingInterface
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
     * @var \DateTime
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    protected $name;

	public function __construct(array $data = array())
    {
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
     * Gets the value of name.
     *
     * @return \DateTime
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param \DateTime $name the name
     *
     * @return self
     */
    public function setName(\DateTime $name)
    {
        $this->name = $name;

        return $this;
    }
}
