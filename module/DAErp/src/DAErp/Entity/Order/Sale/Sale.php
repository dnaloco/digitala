<?php
namespace R2Erp\Entity\Order\Sale;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 *
 * @ORM\Table(name="r2_erp_sale_sales")
 * @ORM\Entity
 */
class Sale {
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
	 * @ORM\JoinColumn(name="store_id", referencedColumnName="id", nullable=true)
	 **/
	private $store;

	/**
	 * @ORM\ManyToOne(targetEntity="R2Erp\Entity\Order\Store\ComboStore")
	 * @ORM\JoinColumn(name="combo_store_id", referencedColumnName="id", nullable=true)
	 **/
	private $comboStore;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="quantity", type="float", nullable=false)
	 */
	private $quantity;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="unit_price", type="decimal", precision=2, nullable=false)
	 */
	private $unitPrice;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="discount", type="decimal", precision=2, nullable=true)
	 */
	private $discount;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="total_price", type="decimal", precision=2, nullable=false)
	 */
	private $totalPrice;

	public function __construct(array $options = array()) {
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}

}