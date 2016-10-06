<?php
namespace R2Erp\Entity\Shipper;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="r2_erp_shippers")
 * @ORM\Entity
 */
class Shipper {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	public $id;

	/**
	 * @ORM\ManyToOne(targetEntity="R2Base\Entity\Company")
	 * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=true)
	 **/
	public $company;

	public function __construct() {

	}

}