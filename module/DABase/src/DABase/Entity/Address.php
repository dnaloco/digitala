<?php
namespace DABase\Entity;

use DACore\Entity\Base\AddressInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Endereço
 *
 * @ORM\Table(name="dabase_addresses")
 * @ORM\Entity
 */
class Address implements AddressInterface
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
     * tipo de endereco('residential', 'comercial', 'delivery', 'billing', 'work')
     *
     * @var \DABase\Enum\EnumGenderType
     *
     * @ORM\Column(name="gender", type="enum_addresstype", nullable=false)
     */
	protected $type;

	/**
	 * país
	 *
	 * @var \DACore\Entity\Base\CountryInterface
	 *
	 * @ORM\ManyToOne(targetEntity="DACore\Entity\Base\CountryInterface")
	 * @ORM\JoinColumn(name="country_id", referencedColumnName="id", nullable=false)
	 *
	 */
	protected $country;

	/**
	 * estado
	 * 
	 * @var  \DACore\Entity\Base\StateInterface
	 *
	 * @ORM\ManyToOne(targetEntity="DACore\Entity\Base\StateInterface")
	 * @ORM\JoinColumn(name="state_id", referencedColumnName="id", nullable=false)
	 *
	 */
	protected $state;

	/**
	 * cidade
	 * 
	 * @var  \DACore\Entity\Base\CityInterface
	 * 
	 * @ORM\ManyToOne(targetEntity="DACore\Entity\Base\CityInterface")
	 * @ORM\JoinColumn(name="state_id", referencedColumnName="id", nullable=false)
	 *
	 */
	protected $city;


	/**
     * logradouro
     * @var string
     *
     * @ORM\Column(name="address_1", type="string", length=200, nullable=false)
     */
	protected $address1;

	/**
     * complemento
     * @var string
     *
     * @ORM\Column(name="address_2", type="string", length=60, nullable=true)
     */
	protected $address2;

	/**
     * número
     * @var integer
     *
     * @ORM\Column(name="number", type="integer", nullable=false)
     */
	protected $number;

	/**
     * bairro
     * @var integer
     *
     * @ORM\Column(name="residential_area", type="string", length=100, nullable=false)
     */
	protected $residentialArea;

	/**
     * cep
     * @var integer
     *
     * @ORM\Column(name="postal_code", type="string", length=15, nullable=false)
     */
	protected $postalCode;

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
     * Gets the tipo de endereco('residential', 'comercial', 'delivery', 'billing', 'work').
     *
     * @return \DABase\Enum\EnumGenderType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the tipo de endereco('residential', 'comercial', 'delivery', 'billing', 'work').
     *
     * @param \DABase\Enum\EnumGenderType $type the type
     *
     * @return self
     */
    public function setType(\DABase\Enum\EnumGenderType $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Gets the país.
     *
     * @return \DACore\Entity\Base\CountryInterface
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Sets the país.
     *
     * @param \DACore\Entity\Base\CountryInterface $country the country
     *
     * @return self
     */
    public function setCountry(\DACore\Entity\Base\CountryInterface $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Gets the estado.
     *
     * @return  \DACore\Entity\Base\StateInterface
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Sets the estado.
     *
     * @param  \DACore\Entity\Base\StateInterface $state the state
     *
     * @return self
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Gets the cidade.
     *
     * @return  \DACore\Entity\Base\CityInterface
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the cidade.
     *
     * @param  \DACore\Entity\Base\CityInterface $city the city
     *
     * @return self
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Gets the logradouro.
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Sets the logradouro.
     *
     * @param string $address1 the address1
     *
     * @return self
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Gets the complemento.
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Sets the complemento.
     *
     * @param string $address2 the address2
     *
     * @return self
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Gets the número.
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Sets the número.
     *
     * @param integer $number the number
     *
     * @return self
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Gets the bairro.
     *
     * @return integer
     */
    public function getResidentialArea()
    {
        return $this->residentialArea;
    }

    /**
     * Sets the bairro.
     *
     * @param integer $residentialArea the residential area
     *
     * @return self
     */
    public function setResidentialArea($residentialArea)
    {
        $this->residentialArea = $residentialArea;

        return $this;
    }

    /**
     * Gets the cep.
     *
     * @return integer
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Sets the cep.
     *
     * @param integer $postalCode the postal code
     *
     * @return self
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }
}