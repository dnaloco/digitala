<?php
namespace DABase\Entity;

use DACore\Entity\Base\TelephoneInterface;

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
     * logradouro
     *
     * @ORM\Column(name="answerable", type="string", length=100, nullable=true)
     */
	protected $answerable;

	/**
     * @var \DACore\Enum\TelephoneType
     *
     *
     * @ORM\Column(name="type", type="enum_telephonetype", nullable=true)
     */
	protected $type;

	/**
     * @var integer
     *
     * número
     *
     * @ORM\Column(name="number", type="integer", nullable=false)
     */
	protected $number;

	/**
     * @var \DACore\Enum\TelephoneType
     *
     *
     * @ORM\Column(name="mobile_operator", type="enum_mobileoperator", nullable=true)
     */
	protected $mobileOperator;

	/**
     * @var integer
     *
     * número
     *
     * @ORM\Column(name="DDD", type="smallint", nullable=false)
     */
	protected $DDD;

	/**
     * @var string
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
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Gets the logradouro.
     *
     * @return string
     */
    public function getAnswerable()
    {
        return $this->answerable;
    }

    /**
     * Sets the logradouro.
     *
     * @param string $answerable the answerable
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
     * @return \DACore\Enum\TelephoneType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the value of type.
     *
     * @param \DACore\Enum\TelephoneType $type the type
     *
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;

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
     * Gets the value of mobileOperator.
     *
     * @return \DACore\Enum\TelephoneType
     */
    public function getMobileOperator()
    {
        return $this->mobileOperator;
    }

    /**
     * Sets the value of mobileOperator.
     *
     * @param \DACore\Enum\TelephoneType $mobileOperator the mobile operator
     *
     * @return self
     */
    public function setMobileOperator($mobileOperator)
    {
        $this->mobileOperator = $mobileOperator;

        return $this;
    }

    /**
     * Gets the número.
     *
     * @return integer
     */
    public function getDDD()
    {
        return $this->DDD;
    }

    /**
     * Sets the número.
     *
     * @param integer $DDD the 
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
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Sets the value of notes.
     *
     * @param string $notes the notes
     *
     * @return self
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }
}