<?php
namespace DAErp\Entity\Supplier;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\Entity\Erp\Supplier\SupplierInterface;

/**
 *
 * @ORM\Table(name="daerp_supplier_suppliers")
 * @ORM\Entity
 */
class Supplier implements SupplierInterface
{
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @ORM\OneToOne(targetEntity="DACore\IEntities\Base\CompanyInterface")
	 * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=true)
	 **/
	private $company;

	/**
     * @ORM\ManyToMany(targetEntity="DACore\Entity\Erp\Product\ProductInterface", mappedBy="suppliers")
     */
	private $products;

	/**
     * @ORM\OneToMany(targetEntity="DACore\Entity\Erp\Supplier\BudgetInterface", mappedBy="supplier")
     */
	private $budgets;

	/**
     * @ORM\ManyToMany(targetEntity="DACore\Entity\Erp\Supplier\QualityRatingInterface")
     * @ORM\JoinTable(name="daerp_supplier_suppliers_quality_ratings",
     *      joinColumns={@ORM\JoinColumn(name="supplier_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="quality_rating_id", referencedColumnName="id")}
     *      )
     */
	private $qualityRatings;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="title", type="string", length=50, nullable=false)
	 */
	private $status;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="notes", type="text", nullable=true)
	 */
	private $notes;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="created_at", type="datetime", nullable=false)
	 */
	private $createdAt;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="updated_at", type="datetime", nullable=false)
	 */
	private $updatedAt;

	public function __construct(array $data = array()) {
		$this->status = 'cadastrado';
		$this->createdAt = new \DateTime("now");
		$this->updatedAt = new \DateTime("now");

		$this->budgets = new ArrayCollection();
		$this->qualityRatings = new ArrayCollection();

		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

}