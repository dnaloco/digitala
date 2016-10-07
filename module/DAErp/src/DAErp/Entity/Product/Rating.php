<?php
namespace DAErp\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\Entity\Erp\Product\RatingInterface;

/**
 *
 * @ORM\Table(name="daerp_product_ratings")
 * @ORM\Entity
 */
class Rating implements RatingInterface
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
	 * @ORM\Column(name="rating", type="decimal", precision=8, nullable=false)
	 */
	private $rating;

	public function __construct(array $data = array()) {
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}

}