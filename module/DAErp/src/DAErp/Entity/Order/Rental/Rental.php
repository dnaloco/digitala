<?php
namespace R2Erp\Entity\Order\Rental;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 *
 * @ORM\Table(name="r2_erp_order_rentals")
 * @ORM\Entity
 */
class Rental {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @ORM\OneToOne(targetEntity="R2Erp\Entity\Order\Store\Store")
	 * @ORM\JoinColumn(name="store_id", referencedColumnName="id", nullable=false)
	 **/
	private $store;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="unit_price", type="decimal", precision=2, nullable=false)
	 */
	private $unitPrice;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="total_price", type="decimal", precision=2, nullable=false)
	 */
	private $totalPrice;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="discount", type="decimal", precision=2, nullable=false)
	 */
	private $discount;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="cost", type="decimal", precision=2, nullable=false)
	 */
	private $cost;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="quantity", type="float", nullable=false)
	 */
	private $quantity;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="expected_devolution", type="datetime", nullable=false)
	 */
	private $expectedDevolution;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="devolution_date", type="datetime", nullable=false)
	 */
	private $devolutionDate;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="rate_delay", type="decimal", precision=2, nullable=false)
	 */
	public $rateDelay;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="origin_sale", type="string", length=20, nullable=false)
	 */
	private $originSale;

	public function __construct(array $options = array()) {
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}

}