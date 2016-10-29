<?php 
namespace DABase\Entity;

use DACore\IEntities\Base\CompanyTypeInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Categoria de empresa
 *
 * @ORM\Table(name="dabase_company_types")
 * @ORM\Entity
 */
class CompanyType implements CompanyTypeInterface
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
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}