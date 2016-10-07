<?php
namespace R2Erp\Entity\Inventory;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 *
 * @ORM\Table(name="r2_erp_inventory_reservations")
 * @ORM\Entity
 */
class Reservation {
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
	 * @ORM\JoinColumn(name="toCustomer", referencedColumnName="id", nullable=false)
	 **/
	private $toCustomer;

	/**
	 * @ORM\ManyToOne(targetEntity="R2User\Entity\User")
	 * @ORM\JoinColumn(name="user", referencedColumnName="id", nullable=true)
	 **/
	private $user;

	/**
	 * @ORM\ManyToOne(targetEntity="R2Erp\Entity\Order\Store\Store")
	 * @ORM\JoinColumn(name="store", referencedColumnName="id", nullable=false)
	 **/
	private $store;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="qtde", type="float", nullable=false)
	 */
	private $qtde;

	private $notes;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="createdAt", type="datetime", nullable=false)
	 */
	private $createdAt;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="updatedAt", type="datetime", nullable=false)
	 */
	private $updatedAt;

	public function __construct(array $options = array()) {
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}
}