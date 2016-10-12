<?php
namespace DAErp\Entity\Manufacturer;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\MyBusiness\SubsidiaryInterface;
/**
 *
 * @ORM\Table(name="daerp_mybusiness_subsidiaries")
 * @ORM\Entity
 */
class Subsidiary implements SubsidiaryInterface
{
	/**
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @ORM\OneToOne(targetEntity="DACore\IEntities\Base\CompanyInterface", cascade={"persist", "remove"})
	 * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=false)
	 **/
	private $company;

	/**
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\HumanResource\PartnerSuperclassInterface")
     * @ORM\JoinTable(name="daerp_mybusiness_matrix_partners",
     *      joinColumns={@ORM\JoinColumn(name="matrix_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="partner_id", referencedColumnName="id")}
     *      )
     **/
    private $partners;


	public function __construct(array $data = array()) {
		$this->partners = new ArrayCollection();

		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

}