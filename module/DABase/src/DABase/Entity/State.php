<?php
namespace DABase\Entity;

use DACore\Entity\Base\StateInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Estado
 *
 * @ORM\Table(name="dabase_states")
 * @ORM\Entity
 */
class State implements StateInterface
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
	 * @ORM\Column(name="ibge_code", type="integer", nullable=false)
	 */
	protected $ibgeCode;

	/**
	 * @ORM\Column(name="name", type="string", length=75, nullable=false)
	 */
	protected $name;

	/**
	 * @ORM\Column(name="code", type="string", length=5, nullable=false)
	 */
	protected $code;

	/**
	 * @ORM\ManyToOne(targetEntity="DACore\Entity\Base\CountryInterface")
	 * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
	 **/
	protected $country;

	public function __construct(array $data)
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
     * Gets the value of ibgeCode.
     *
     * @return mixed
     */
    public function getIbgeCode()
    {
        return $this->ibgeCode;
    }

    /**
     * Sets the value of ibgeCode.
     *
     * @param mixed $ibgeCode the ibge code
     *
     * @return self
     */
    public function setIbgeCode($ibgeCode)
    {
        $this->ibgeCode = $ibgeCode;

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
     * Gets the value of code.
     *
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets the value of code.
     *
     * @param mixed $code the code
     *
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Gets the value of country.
     *
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Sets the value of country.
     *
     * @param mixed $country the country
     *
     * @return self
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }
}
