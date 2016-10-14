<?php
namespace DAErp\Entity\Order\Production;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Order\Production\ProductProcessInterface;
use Doctrine\Common\Collections\ArrayCollection;
/**
 *
 * @ORM\Table(name="daerp_order_production_product_processes")
 * @ORM\Entity
 */
class ProductProcess
implements ProductProcessInterface
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
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Product\ProductInterface")
	 * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=false)
	 **/
	private $product;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Order\Production\ProcessInterface")
	 * @ORM\JoinTable(name="daerp_production_product_processes_processes",
	 *      joinColumns={@ORM\JoinColumn(name="production_process_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="process_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $processes;

	public function __construct(array $data = array()) {
		$this->processes = new ArrayCollection();
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

	

    /**
     * Gets the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param integer $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of product.
     *
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Sets the value of product.
     *
     * @param mixed $product the product
     *
     * @return self
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Gets the value of processes.
     *
     * @return mixed
     */
    public function getProcesses()
    {
        return $this->processes;
    }

    /**
     * Sets the value of processes.
     *
     * @param mixed $processes the processes
     *
     * @return self
     */
    public function setProcesses($processes)
    {
        $this->processes = $processes;

        return $this;
    }
}