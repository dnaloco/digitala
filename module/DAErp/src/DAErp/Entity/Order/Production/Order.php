<?php
namespace DAErp\Entity\Order\Production;

use Doctrine\ORM\Mapping as ORM;
use DAErp\Entity\Order\OrderSuperclass;
use DACore\IEntities\Erp\Order\Production\OrderInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Zend\Stdlib\Hydrator;
/**
 *
 * @ORM\Table(name="daerp_order_production_superclass_orders")
 * @ORM\Entity
 */
class Order extends OrderSuperclass
implements OrderInterface
{

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Order\Production\RawMaterialInterface")
	 * @ORM\JoinTable(name="daerp_order_production_orders_raw_materials",
	 *      joinColumns={@ORM\JoinColumn(name="production_order_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="raw_material_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $rawMaterials;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="sub_items", type="array", nullable=true)
	 */
	private $subItems;

	/**
	 * @ORM\OneToOne(targetEntity="DACore\IEntities\Erp\Order\Production\ProductionInterface")
	 * @ORM\JoinColumn(name="production", referencedColumnName="id", nullable=false)
	 **/
	private $production;

	public function __construct(array $data = array()) {
        $this->rawMaterials = new ArrayCollection();
		parent::__construct($data);
		
	}

    /**
     * Gets the value of rawMaterials.
     *
     * @return mixed
     */
    public function getRawMaterials()
    {
        return $this->rawMaterials;
    }

    /**
     * Sets the value of rawMaterials.
     *
     * @param mixed $rawMaterials the raw materials
     *
     * @return self
     */
    public function setRawMaterials($rawMaterials)
    {
        $this->rawMaterials = $rawMaterials;

        return $this;
    }

    /**
     * Gets the value of subItems.
     *
     * @return string
     */
    public function getSubItems()
    {
        return $this->subItems;
    }

    /**
     * Sets the value of subItems.
     *
     * @param string $subItems the sub items
     *
     * @return self
     */
    public function setSubItems($subItems)
    {
        $this->subItems = $subItems;

        return $this;
    }

    /**
     * Gets the value of production.
     *
     * @return mixed
     */
    public function getProduction()
    {
        return $this->production;
    }

    /**
     * Sets the value of production.
     *
     * @param mixed $production the production
     *
     * @return self
     */
    public function setProduction($production)
    {
        $this->production = $production;

        return $this;
    }
}