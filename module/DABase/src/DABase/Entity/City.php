<?php 
namespace DABase\Entity;

use DACore\IEntities\Base\CityInterface;

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
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
	protected $id;

	/**
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
	protected $name;

	/**
	 *
     * estado
     *
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Base\StateInterface")
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
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
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
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Sets the estado.
     *
     * @param mixed $state the state
     *
     * @return self
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }
}