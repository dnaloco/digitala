<?php
namespace DABase\Entity;

use DACore\IEntities\Base\SocialNetworkInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Rede Social
 *
 * @ORM\Table(name="dabase_social_networks")
 * @ORM\Entity
 */
class SocialNetwork implements SocialNetworkInterface
{
	/**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     *
     * @ORM\Column(name="type", type="enum_socialtype", nullable=true)
     */
    protected $type;

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
