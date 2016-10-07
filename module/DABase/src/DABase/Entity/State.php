<?php
namespace DABase\Entity;

use DACore\IEntities\Base\StateInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Estado
 *
 * @ORM\Table(name="dabase_states")
 * @ORM\Entity
 */
class State implements StateInterface
{
	/**
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
	protected $id;

	/**
	 * @ORM\Column(name="ibge_code", type="integer", nullable=false)
	 */
	protected $ibgeCode;

	/**
	 * @ORM\Column(name="name", type="string", length=75, nullable=false)
	 */
	protected $name;

	/**
	 * @ORM\Column(name="code", type="string", length=5, nullable=false)
	 */
	protected $code;

	/**
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Base\CountryInterface")
	 * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
	 **/
	protected $country;

	public function __construct(array $data = array())
	{
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

}
