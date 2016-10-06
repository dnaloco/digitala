<?php
namespace R2Erp\Entity\Supplier;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="r2_erp_suppliers")
 * @ORM\Entity
 */
class Supplier {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @ORM\OneToOne(targetEntity="R2Base\Entity\Company")
	 * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=true)
	 **/
	private $company;

	private $quality;

	public function __construct() {

	}

}