<?php
namespace DAErp\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\Entity\Erp\Product\GroupInterface;
/**
 *
 * @ORM\Table(name="daerp_product_groups")
 * @ORM\Entity
 */
class Group implements GroupInterface
{
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=255, nullable=false)
	 */
	private $name;

	public function __construct(array $data = array())
	{
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

 
}