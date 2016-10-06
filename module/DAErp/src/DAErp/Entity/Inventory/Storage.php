<?php
namespace R2Erp\Entity\Inventory;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 *
 * @ORM\Table(name="r2_erp_inventory_storages")
 * @ORM\Entity
 */
class Storage {
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
	 * @var string
	 *
	 * @ORM\Column(name="qtde", type="float", nullable=true)
	 */
	private $qtde;

	/**
	 * @ORM\ManyToOne(targetEntity="R2Erp\Entity\Inventory\Location")
	 * @ORM\JoinColumn(name="location_id", referencedColumnName="id", nullable=true)
	 **/
	private $location;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="originSale", type="string", length=20, nullable=false)
	 */
	private $originSale;

	public function __construct(array $options = array()) {
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}
}