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
	protected $id;

	/**
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=false)
     */
	protected $name;

	/**
     *
     * @ORM\Column(name="symbol", type="string", length=5, nullable=false)
     */
	protected $symbol;

	/**
	 *
	 * @ORM\Column(name="rate", precision=7, scale=2, nullable=false)
	 */
	protected $rate;

    /**
     *
     * @ORM\Column(name="standard", type="boolean", unique=true)
     */
    protected $standard;

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
     * Gets the value of symbol.
     *
     * @return mixed
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * Sets the value of symbol.
     *
     * @param mixed $symbol the symbol
     *
     * @return self
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;

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