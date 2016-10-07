<?php
namespace DAErp\Entity\Manufacturer;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Manufacturer\ManufacturerInterface;
/**
 *
 * @ORM\Table(name="daerp_manufacturers")
 * @ORM\Entity
 */
class Manufacturer implements ManufacturerInterface
{
	/**
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	public $id;

	/**
	 * @ORM\OneToOne(targetEntity="DACore\IEntities\Base\CompanyInterface", cascade={"persist", "remove"})
	 * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=false)
	 **/
	public $company;

	/**
     * @ORM\OneToMany(targetEntity="DACore\IEntities\Erp\Product\ProductInterface", mappedBy="manufacturer")
     */
	public $products;

	public function __construct(array $data = array()) {
		$this->products = new ArrayCollection();

		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

}