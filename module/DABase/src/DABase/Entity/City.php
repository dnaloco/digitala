<?php 
namespace DABase\Entity;

use DACore\Entity\Base\CityInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Cidade
 *
 * @ORM\Table(name="dabase_cities")
 * @ORM\Entity
 */
class City implements CityInterface
{
	/**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
	protected $id;

	/**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
	protected $name;

	/**
	 * @var \DACore\Entity\Base\StateInterface
	 *
     * estado
     *
	 * @ORM\ManyToOne(targetEntity="DACore\Entity\Base\StateInterface")
	 * @ORM\JoinColumn(name="state_id", referencedColumnName="id", nullable=false)
	 *
	 */
	protected $state;

	public function __construct(array $data)
	{
		(new Hydrator\ClassMethods)->hydrate($options, $this);
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
     * Gets the value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param string $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the estado.
     *
     * @return \DACore\Entity\Base\StateInterface
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Sets the estado.
     *
     * @param \DACore\Entity\Base\StateInterface $state the state
     *
     * @return self
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }
}