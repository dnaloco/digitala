<?php
namespace DABase\Entity;

use DACore\IEntities\Base\TelephoneInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Telefone
 *
 * @ORM\Table(name="dabase_telephones")
 * @ORM\Entity
 */
class Telephone implements TelephoneInterface
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
     * logradouro
     *
     * @ORM\Column(name="answerable", type="string", length=100, nullable=true)
     */
	protected $answerable;

	/**
     *
     *
     * @ORM\Column(name="type", type="enum_telephonetype", nullable=true)
     */
	protected $type;

	/**
     *
     * @ORM\Column(name="number", type="integer", nullable=false)
     */
	protected $number;

	/**
     *
     *
     * @ORM\Column(name="mobile_operator", type="enum_mobileoperator", nullable=true)
     */
	protected $mobileOperator;

	/**
     *
     * @ORM\Column(name="DDD", type="smallint", nullable=false)
     */
	protected $DDD;

	/**
     *
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
	protected $notes;

	public function __construct(array $data)
	{
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

}