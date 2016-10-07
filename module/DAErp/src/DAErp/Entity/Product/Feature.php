<?php
namespace DAErp\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\Entity\Erp\Product\FeatureInterface;
/**
 *
 * @ORM\Table(name="daerp_product_features")
 * @ORM\Entity
 */
class Feature implements FeatureInterface
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
     * @ORM\ManyToOne(targetEntity="DACore\Entity\Erp\Product\GroupInterface")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     */
	private $group;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="value", type="decimal", precision=8, nullable=false)
	 */
	private $value;

	public function __construct(array $data = array()) {
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

  
}