<?php
namespace DABase\Entity;

use DACore\IEntities\Base\CurrencyInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Moeda
 *
 * @ORM\Table(name="dabase_currencies")
 * @ORM\Entity
 */
class Currency implements CurrencyInterface
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
     * @ORM\Column(name="name", type="string", length=30, nullable=false)
     */
	protected $name;

	/**
     *
     * @ORM\Column(name="symbol", type="string", length=5, nullable=false)
     */
	protected $symbol;

	/**
	 *
	 * @ORM\Column(name="rate", type="decimal", precision=8, nullable=false)
	 */
	protected $rate;

    /**
     *
     * @ORM\Column(name="standard", type="boolean", unique=true)
     */
    protected $standard;

	public function __construct(array $data)
	{
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

}