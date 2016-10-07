<?php
namespace R2Erp\Entity\Inventory;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 *
 * @ORM\Table(name="r2_erp_inventory_devolutions")
 * @ORM\Entity
 */
class Devolution {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @ORM\ManyToOne(targetEntity="R2Erp\Entity\Customer\Customer")
	 * @ORM\JoinColumn(name="from_customer_id", referencedColumnName="id", nullable=false)
	 **/
	private $fromCustomer;

	/**
	 * @ORM\ManyToOne(targetEntity="R2User\Entity\User")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
	 **/
	private $user;

	/**
	 * @ORM\ManyToOne(targetEntity="R2Erp\Entity\Order\Sale\Order")
	 * @ORM\JoinColumn(name="sale_order_id", referencedColumnName="id", nullable=false)
	 **/
	private $saleOrder;

	/**
	 * @ORM\ManyToOne(targetEntity="R2Erp\Entity\Order\Store\Store")
	 * @ORM\JoinColumn(name="store_id", referencedColumnName="id", nullable=false)
	 **/
	private $store;

	/**
	 * @ORM\ManyToMany(targetEntity="R2Erp\Entity\Order\Store\Store")
	 * @ORM\JoinTable(name="r2_erp_inventory_devolution_substituteds",
	 *      joinColumns={@ORM\JoinColumn(name="inventory_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="substituted_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $storeSubstituteds;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="quantity", type="float", nullable=false)
	 */
	private $quantity;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="devolution_date", type="datetime", nullable=false)
	 */
	private $devolutionDate;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="reason", type="text", nullable=false)
	 */
	private $reason;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="notes", type="text", nullable=true)
	 */
	private $notes;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="devolution_status", type="string", length=20, nullable=false)
	 */
	private $devolutionStatus;

	public function __construct(array $options = array()) {
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}

}