<?php
namespace DAErp\Entity\Supplier;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\Entity\Erp\Supplier\ProductBudgetInterface;

/**
 * @ORM\Table(name="daerp_supplier_store_budgets")
 * @ORM\Entity
 */
class ProductBudget implements ProductBudgetInterface
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
     * @ORM\ManyToOne(targetEntity="DACore\Entity\Erp\Product\ProductInterface")
     * @@ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
	private $product;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="unit_price", type="decimal", precision=8, nullable=true)
	 */
	private $unitPrice;

	/**
     * @var string
     *
     * @ORM\Column(name="quantity", type="float", nullable=true)
     */
	private $quantity;

     public function __construct(array $data = array()) {
          (new Hydrator\ClassMethods)->hydrate($data, $this);
     }

}