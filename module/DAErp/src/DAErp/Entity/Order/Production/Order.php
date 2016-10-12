<?php
namespace R2Erp\Entity\Order\Production;

use Doctrine\ORM\Mapping as ORM;
use R2Erp\Entity\Order\OrderSuperClass;

/**
 *
 * @ORM\Table(name="r2_erp_order_production_orders")
 * @ORM\Entity
 */
class Order extends OrderSuperClass {

	/**
	 * @ORM\ManyToMany(targetEntity="R2Erp\Entity\Order\Production\RawMaterial")
	 * @ORM\JoinTable(name="r2_erp_production_raw_materials",
	 *      joinColumns={@ORM\JoinColumn(name="order_production_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="raw_material_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $rawMaterials;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="sub_items", type="array", nullable=true)
	 */
	private $subItems;

	/**
	 * @ORM\OneToOne(targetEntity="R2Erp\Entity\Order\Production\Production")
	 * @ORM\JoinColumn(name="production", referencedColumnName="id", nullable=false)
	 **/
	private $production;

	public function __construct(array $options = array()) {
		parent::__construct($options);
		$this->setPaymentType('SALE');
	}

}