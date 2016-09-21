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
	 * @ORM\OneToOne(targetEntity="R2Base\Entity\Person")
	 * @ORM\JoinColumn(name="person_id", referencedColumnName="id", nullable=true)
	 **/
	private $person;

	/**
	 * @ORM\OneToOne(targetEntity="R2Base\Entity\Company")
	 * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=true)
	 **/
	private $company;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="notes", type="text", nullable=false)
	 */
	private $notes;

	/**
     * @ManyToMany(targetEntity="User", mappedBy="groups")
     */
    private $products;

	public function __construct() {

	}

}