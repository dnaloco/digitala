<?php
namespace DABase\Entity;

use DACore\IEntities\Base\TelephoneInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Telefone
 *
 * @ORM\Table(name="dabase_telephones")
 * @ORM\Entity
 */
class Telephone implements TelephoneInterface
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
     * logradouro
     *
     * @ORM\Column(name="answerable", type="string", length=100, nullable=true)
     */
	protected $answerable;

	/**
     *
     *
     * @ORM\Column(name="type", type="enum_telephonetype", nullable=true)
     */
	protected $type;

	/**
     *
     * @ORM\Column(name="number", type="integer", nullable=false)
     */
	protected $number;

	/**
     *
     *
     * @ORM\Column(name="mobile_operator", type="enum_mobileoperator", nullable=true)
     */
	protected $mobileOperator;

	/**
     *
     * @ORM\Column(name="DDD", type="smallint", nullable=false)
     */
	protected $DDD;

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
     * Gets the logradouro.
     *
     * @return mixed
     */
    public function getAnswerable()
    {
        return $this->answerable;
    }

    /**
     * Sets the logradouro.
     *
     * @param mixed $answerable the answerable
     *
     * @return self
     */
    public function setAnswerable($answerable)
    {
        $this->answerable = $answerable;

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
     * Gets the value of number.
     *
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Sets the value of number.
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
     * Gets the value of mobileOperator.
     *
     * @return mixed
     */
    public function getMobileOperator()
    {
        return $this->mobileOperator;
    }

    /**
     * Sets the value of mobileOperator.
     *
     * @param mixed $mobileOperator the mobile operator
     *
     * @return self
     */
    public function setMobileOperator($mobileOperator)
    {
        $this->mobileOperator = $mobileOperator;

        return $this;
    }

    /**
     * Gets the value of DDD.
     *
     * @return mixed
     */
    public function getDDD()
    {
        return $this->DDD;
    }

    /**
     * Sets the value of DDD.
     *
     * @param mixed $DDD the 
     *
     * @return self
     */
    public function setDDD($DDD)
    {
        $this->DDD = $DDD;

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