<?php

namespace R2Erp\Entity\Order\Production;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 *
 * @ORM\Table(name="r2_erp_order_productions")
 * @ORM\Entity
 */
class Production {
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
	 * @ORM\ManyToOne(targetEntity="R2Erp\Entity\Order\Production\Process")
	 * @ORM\JoinColumn(name="production_process", referencedColumnName="id", nullable=false)
	 **/
	private $productionProcess;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="is_finished", type="boolean", nullable=true)
	 */
	private $isFinished;

	/**
	 * @ORM\OneToOne(targetEntity="R2Erp\Entity\Order\Store\Store")
	 * @ORM\JoinColumn(name="store_id", referencedColumnName="id", nullable=true)
	 **/
	private $store;

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

?>