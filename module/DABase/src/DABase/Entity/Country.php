<?php 
namespace DABase\Entity;

use DACore\IEntities\Base\CountryInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Pais
 *
 * @ORM\Table(name="dabase_countries")
 * @ORM\Entity
 */
class Country implements CountryInterface
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
     * @ORM\Column(name="name_en", type="string", length=100, nullable=false)
     */
	protected $nameEn;

    /**
     *
     * @ORM\Column(name="name_pt", type="string", length=100, nullable=false)
     */
    protected $namePt;

	/**
	 * @ORM\Column(name="initials", type="string", length=10, nullable=false)
	 */
	protected $initials;

    /**
     * @ORM\Column(name="bacen", type="smallint", nullable=false)
     */
    protected $bacen;

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
     * Gets the value of nameEn.
     *
     * @return mixed
     */
    public function getNameEn()
    {
        return $this->nameEn;
    }

    /**
     * Sets the value of nameEn.
     *
     * @param mixed $nameEn the name en
     *
     * @return self
     */
    public function setNameEn($nameEn)
    {
        $this->nameEn = $nameEn;

        return $this;
    }

    /**
     * Gets the value of namePt.
     *
     * @return mixed
     */
    public function getNamePt()
    {
        return $this->namePt;
    }

    /**
     * Sets the value of namePt.
     *
     * @param mixed $namePt the name pt
     *
     * @return self
     */
    public function setNamePt($namePt)
    {
        $this->namePt = $namePt;

        return $this;
    }

    /**
     * Gets the value of initials.
     *
     * @return mixed
     */
    public function getInitials()
    {
        return $this->initials;
    }

    /**
     * Sets the value of initials.
     *
     * @param mixed $initials the initials
     *
     * @return self
     */
    public function setInitials($initials)
    {
        $this->initials = $initials;

        return $this;
    }

    /**
     * Gets the value of bacen.
     *
     * @return mixed
     */
    public function getBacen()
    {
        return $this->bacen;
    }

    /**
     * Sets the value of bacen.
     *
     * @param mixed $bacen the bacen
     *
     * @return self
     */
    public function setBacen($bacen)
    {
        $this->bacen = $bacen;

        return $this;
    }
}