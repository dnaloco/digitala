<?php
namespace DABase\Entity;

use DACore\IEntities\Base\DDIInterface;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Endereço
 *
 * @ORM\Table(name="dabase_DDIs")
 * @ORM\Entity
 */
class DDI implements DDIInterface
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
     *
     * @ORM\Column(name="DDI", type="string", length=255, nullable=false)
     */
	private $DDI;

	public function __construct(array $data = array())
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
     * Gets the value of DDI.
     *
     * @return mixed
     */
    public function getDDI()
    {
        return $this->DDI;
    }

    /**
     * Sets the value of DDI.
     *
     * @param mixed $DDI the 
     *
     * @return self
     */
    public function setDDI($DDI)
    {
        $this->DDI = $DDI;

        return $this;
    }
}