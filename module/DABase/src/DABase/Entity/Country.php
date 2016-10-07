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
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
	protected $name;

	/**
	 * @ORM\Column(name="code", type="string", length=10, nullable=false)
	 */
	protected $code;

	public function __construct(array $data)
	{
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}


}