<?php
namespace DABase\Entity;

use DACore\Entity\Base\GoodTagInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Bens
 *
 * @ORM\Table(name="dabase_good_tags")
 * @ORM\Entity
 */
class GoodTag implements GoodTagInterface
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
     * @ORM\Column(name="name", type="string", length=100, nullable=false, unique=true)
     */
	protected $name;

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
     * Gets the value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param string $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

}
