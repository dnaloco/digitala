<?php
namespace R2Erp\Entity\Inventory;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="r2_erp_inventory_warehouses")
 * @ORM\Entity
 */
class Warehouse {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="description", type="text", nullable=true)
	 */
	private $description;

	/**
	 * @ORM\OneToOne(targetEntity="R2Base\Entity\Address", cascade={"persist", "remove"})
	 * @ORM\JoinColumn(name="address_id", referencedColumnName="id", nullable=true)
	 **/
	private $address;

	/**
	 * @ORM\ManyToOne(targetEntity="R2Base\Entity\Company")
	 * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=false)
	 **/
	private $company;

	private $storages;

	public function __construct(array $options = array()) {

	}
}