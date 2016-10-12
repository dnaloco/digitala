<?php
namespace R2Erp\Entity\Order\Production;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="r2_erp_order_production_process")
 * @ORM\Entity
 */
class ProductionProcess {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @ORM\ManyToOne(targetEntity="R2Erp\Entity\Product\Product")
	 * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=false)
	 **/
	private $product;

	/**
	 * @ORM\ManyToMany(targetEntity="R2Erp\Entity\Order\Production\Process")
	 * @ORM\JoinTable(name="r2_erp_production_process",
	 *      joinColumns={@ORM\JoinColumn(name="production_process_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="process_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $processes;

	public function __construct(array $options = array()) {
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}
}