<?php
namespace DABase\Entity;

use DACore\IEntities\Base\EmailInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Email
 *
 * @ORM\Table(name="dabase_emails")
 * @ORM\Entity
 */
class Email implements EmailInterface
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
     * @ORM\Column(name="answerable", type="string", length=100, nullable=true)
     */
	protected $answerable;

	/**
     *
     * @ORM\Column(name="address", type="string", unique=true, nullable=false)
     */
	protected $address;

	public function __construct(array $data)
	{
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

}