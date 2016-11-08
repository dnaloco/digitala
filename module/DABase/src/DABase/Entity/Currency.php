<?php
namespace DABase\Entity;

use DACore\IEntities\Base\CurrencyInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Moeda
 *
 * @ORM\Table(name="dabase_currencies")
 * @ORM\Entity
 */
class Currency implements CurrencyInterface
{
	/**
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
	private $id;

	/**
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=false)
     */
	private $name;

    /**
     *
     * @ORM\Column(name="code", type="string", length=5, nullable=false)
     */
    private $code;

	/**
     *
     * @ORM\Column(name="major_symbol", type="string", length=5, nullable=false)
     */
	private $majorSymbol;

    /**
     *
     * @ORM\Column(name="minor_symbol", type="string", length=5, nullable=false)
     */
    private $minorSymbol;

	/**
	 *
	 * @ORM\Column(name="rate", precision=7, scale=2, nullable=false)
	 */
	private $rate;

    /**
     *
     * @ORM\Column(name="standard", type="boolean", unique=true)
     */
    private $standard;

	public function __construct(array $data)
	{
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
     * Gets the value of majorSymbol.
     *
     * @return mixed
     */
    public function getMajorSymbol()
    {
        return $this->majorSymbol;
    }

    /**
     * Sets the value of majorSymbol.
     *
     * @param mixed $majorSymbol the major symbol
     *
     * @return self
     */
    public function setMajorSymbol($majorSymbol)
    {
        $this->majorSymbol = $majorSymbol;

        return $this;
    }

    /**
     * Gets the value of minorSymbol.
     *
     * @return mixed
     */
    public function getMinorSymbol()
    {
        return $this->minorSymbol;
    }

    /**
     * Sets the value of minorSymbol.
     *
     * @param mixed $minorSymbol the minor symbol
     *
     * @return self
     */
    public function setMinorSymbol($minorSymbol)
    {
        $this->minorSymbol = $minorSymbol;

        return $this;
    }

    /**
     * Gets the value of rate.
     *
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Sets the value of rate.
     *
     * @param mixed $rate the rate
     *
     * @return self
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Gets the value of standard.
     *
     * @return mixed
     */
    public function getStandard()
    {
        return $this->standard;
    }

    /**
     * Sets the value of standard.
     *
     * @param mixed $standard the standard
     *
     * @return self
     */
    public function setStandard($standard)
    {
        $this->standard = $standard;

        return $this;
    }
}