<?php
namespace DAErp\Entity\Order\Production;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Order\Production\RawMaterialInterface;
/**
 *
 * @ORM\Table(name="daerp_order_production_raw_materials")
 * @ORM\Entity
 */
class RawMaterial
implements RawMaterialInterface
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
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Order\Store\StoreInterface")
	 * @ORM\JoinColumn(name="store_id", referencedColumnName="id", nullable=false)
	 **/
	private $store;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="quantity", type="float", nullable=true)
	 */
	private $quantity;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="is_received", type="boolean", nullable=true)
	 */
	private $isReceived;

	public function __construct(array $data = array()) {
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
     * Gets the value of store.
     *
     * @return mixed
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * Sets the value of store.
     *
     * @param mixed $store the store
     *
     * @return self
     */
    public function setStore($store)
    {
        $this->store = $store;

        return $this;
    }

    /**
     * Gets the value of quantity.
     *
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets the value of quantity.
     *
     * @param string $quantity the quantity
     *
     * @return self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Gets the value of isReceived.
     *
     * @return string
     */
    public function getIsReceived()
    {
        return $this->isReceived;
    }

    /**
     * Sets the value of isReceived.
     *
     * @param string $isReceived the is received
     *
     * @return self
     */
    public function setIsReceived($isReceived)
    {
        $this->isReceived = $isReceived;

        return $this;
    }
}