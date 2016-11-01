<?php
namespace DABase\Entity;

use DACore\IEntities\Base\AddressInterface;
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
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
	protected $id;

	/**
     *
     *
     * @ORM\Column(name="type", type="enum_addresstype", nullable=false)
     */
	protected $type;

	/**
     *
     * cidade
	 *
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Base\CityInterface")
	 * @ORM\JoinColumn(name="city_id", referencedColumnName="id", nullable=false)
	 */
	protected $city;

	/**
     *
     * logradouro
     *
     * @ORM\Column(name="address_1", type="string", length=200, nullable=false)
     */
	protected $address1;

	/**
     *
     * complemento
     *
     * @ORM\Column(name="address_2", type="string", length=60, nullable=true)
     */
	protected $address2;

	/**
     * número
     *
     * @ORM\Column(name="number", type="integer", nullable=false)
     */
	protected $number;

	/**
     *
     * bairro
     *
     * @ORM\Column(name="district", type="string", length=100, nullable=false)
     */
	protected $district;

	/**
     *
     * cep
     *
     * @ORM\Column(name="postal_code", type="string", length=15, nullable=false)
     */
	protected $postalCode;

    /**
     *
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
    protected $notes;

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
     * Gets the value of type.
     *
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the value of type.
     *
     * @param mixed $type the type
     *
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Gets the cidade.
     *
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the cidade.
     *
     * @param mixed $city the city
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
     * @return mixed
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Sets the logradouro.
     *
     * @param mixed $address1 the address1
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
     * @return mixed
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Sets the complemento.
     *
     * @param mixed $address2 the address2
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
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Sets the número.
     *
     * @param mixed $number the number
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
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Sets the bairro.
     *
     * @param mixed $district the district
     *
     * @return self
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Gets the cep.
     *
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Sets the cep.
     *
     * @param mixed $postalCode the postal code
     *
     * @return self
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Gets the value of notes.
     *
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Sets the value of notes.
     *
     * @param mixed $notes the notes
     *
     * @return self
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }
}