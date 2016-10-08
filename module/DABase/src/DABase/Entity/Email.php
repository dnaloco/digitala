<?php
namespace DABase\Entity;

use DACore\IEntities\Base\EmailInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Email
 *
 * @ORM\Table(name="dabase_emails")
 * @ORM\Entity
 */
class Email implements EmailInterface
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
     * @ORM\Column(name="answerable", type="string", length=100, nullable=true)
     */
	protected $answerable;

	/**
     *
     * @ORM\Column(name="address", type="string", unique=true, nullable=false)
     */
	protected $address;

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
     * Gets the value of answerable.
     *
     * @return mixed
     */
    public function getAnswerable()
    {
        return $this->answerable;
    }

    /**
     * Sets the value of answerable.
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
     * Gets the value of address.
     *
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the value of address.
     *
     * @param mixed $address the address
     *
     * @return self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }
}