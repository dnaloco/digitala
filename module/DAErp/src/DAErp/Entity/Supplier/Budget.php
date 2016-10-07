<?php
namespace DAErp\Entity\Supplier;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\Entity\Erp\Supplier\BudgetInterface;

/**
 * @ORM\Table(name="daerp_supplier_budgets")
 * @ORM\Entity
 */
class Budget implements BudgetInterface
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
	 * @ORM\ManyToMany(targetEntity="DACore\Entity\Erp\Supplier\ProductBudgetInterface")
	 * @ORM\JoinTable(name="daerp_supplier_budgets_product_budgets",
	 *      joinColumns={@ORM\JoinColumn(name="budget_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="product_budget_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $productBudgets;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\Entity\Erp\Supplier\SupplierInterface", inversedBy="budgets")
     * @ORM\JoinColumn(name="supplier_id", referencedColumnName="id")
     */
	private $supplier;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="validity", type="datetime", nullable=false)
	 */
	private $validity;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="total", type="decimal", precision=8, nullable=false)
	 */
	private $total;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="discount_percentage", type="decimal", precision=8, nullable=true)
	 */
	private $discountPercentage;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="total_with_discount", type="decimal", precision=8, nullable=true)
	 */
	private $totalWithDiscount;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Base\PersonInterface")
     * @@ORM\JoinColumn(name="main_contact_id", referencedColumnName="id")
     */
	private $mainContact;

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

		$this->createdAt = new \DateTime("now");
		$this->updatedAt = new \DateTime("now");

		$this->productBudgets = new ArrayCollection();


		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

  
}