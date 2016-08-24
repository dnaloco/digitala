<?php
namespace DABase\Entity;

use DACore\Entity\Base\AddressInterface;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

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
     * @var \DACore\Enum\Addresstype
     *
     * tipo de endereco('residential', 'comercial', 'delivery', 'billing', 'work')
     *
     * @ORM\Column(name="type", type="enum_addresstype", nullable=false)
     */
	protected $type;

	/**
	 * @var \DACore\Entity\Base\CityInterface
     *
     * cidade
	 *
	 * @ORM\ManyToOne(targetEntity="DACore\Entity\Base\CityInterface")
	 * @ORM\JoinColumn(name="state_id", referencedColumnName="id", nullable=false)
	 */
	protected $city;


	/**
     * @var string
     *
     * logradouro
     *
     * @ORM\Column(name="address_1", type="string", length=200, nullable=false)
     */
	protected $address1;

	/**
     * @var string
     *
     * complemento
     *
     * @ORM\Column(name="address_2", type="string", length=60, nullable=true)
     */
	protected $address2;

	/**
     * @var integer
     *
     * número
     *
     * @ORM\Column(name="number", type="integer", nullable=false)
     */
	protected $number;

	/**
     * @var string
     *
     * bairro
     *
     * @ORM\Column(name="residential_area", type="string", length=100, nullable=false)
     */
	protected $residentialArea;

	/**
     * @var string
     *
     * cep
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
     * Gets the tipo de endereco('residential', 'comercial', 'delivery', 'billing', 'work').
     *
     * @return \DACore\Enum\Addresstype
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the tipo de endereco('residential', 'comercial', 'delivery', 'billing', 'work').
     *
     * @param \DACore\Enum\Addresstype $type the type
     *
     * @return self
     */
    public function setType(\DACore\Enum\Addresstype $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Gets the cidade.
     *
     * @return \DACore\Entity\Base\CityInterface
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the cidade.
     *
     * @param \DACore\Entity\Base\CityInterface $city the city
     *
     * @return self
     */
    public function setCity(\DACore\Entity\Base\CityInterface $city)
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
     * @return string
     */
    public function getResidentialArea()
    {
        return $this->residentialArea;
    }

    /**
     * Sets the bairro.
     *
     * @param string $residentialArea the residential area
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
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Sets the cep.
     *
     * @param string $postalCode the postal code
     *
     * @return self
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }
}