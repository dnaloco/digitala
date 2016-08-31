<?php
namespace DABase\Entity;

use DACore\Entity\Base\EmailInterface;

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
     * @ORM\Column(name="answerable", type="string", length=100, nullable=true)
     */
	protected $answerable;

	/**
     * @var string
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
     * Gets the value of answerable.
     *
     * @return string
     */
    public function getAnswerable()
    {
        return $this->answerable;
    }

    /**
     * Sets the value of answerable.
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
     * Gets the value of address.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the value of address.
     *
     * @param string $address the address
     *
     * @return self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }
}