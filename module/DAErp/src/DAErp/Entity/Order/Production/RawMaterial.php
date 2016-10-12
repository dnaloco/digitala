<?php
namespace R2Erp\Entity\Order\Production;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="r2_erp_order_production_raw_materials")
 * @ORM\Entity
 */
class RawMaterial {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @ORM\ManyToOne(targetEntity="R2Erp\Entity\Order\Store\Store")
	 * @ORM\JoinColumn(name="store_id", referencedColumnName="id", nullable=false)
	 **/
	private $store;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="quantity", type="float", nullable=true)
	 */
	private $quantity;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="is_received", type="boolean", nullable=true)
	 */
	private $isReceived;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="created_at", type="datetime", nullable=false)
	 */
	private $createdAt;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="updated_at", type="datetime", nullable=false)
	 */
	private $updatedAt;

	public function __construct(array $options = array()) {
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}

}