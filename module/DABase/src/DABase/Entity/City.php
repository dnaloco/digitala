<?php 
namespace DABase\Entity;

use DACore\IEntities\Base\CityInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Cidade
 *
 * @ORM\Table(name="dabase_cities")
 * @ORM\Entity
 */
class City implements CityInterface
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
	protected $name;

	/**
	 *
     * estado
     *
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Base\StateInterface")
	 * @ORM\JoinColumn(name="state_id", referencedColumnName="id", nullable=false)
	 *
	 */
	protected $state;

	public function __construct(array $data)
	{
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}

}