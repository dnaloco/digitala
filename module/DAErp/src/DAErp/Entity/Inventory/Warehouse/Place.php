<?php
namespace DAErp\Entity\Inventory\Warehouse;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Inventory\Warehouse\PlaceInterface;

/**
 *
 * @ORM\Table(name="daerp_inventory_parked_places")
 * @ORM\Entity
 */
class Place implements PlaceInterface
{
	/**
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="description", type="text")
	 */
	private $description;

    /**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Inventory\Warehouse\WarehouseInterface", inversedBy="places")
     * @ORM\JoinColumn(name="warehouse_id", referencedColumnName="id")
     */
	private $warehouse;

    /**
	 * @var string
	 *
	 * @ORM\Column(name="status", type="enum_devolutionstatus", nullable=true)
	 */
    private $destination;

	public function __construct(array $options = array()) {
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}



    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the value of description.
     *
     * @param string $description the description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets the value of warehouse.
     *
     * @return mixed
     */
    public function getWarehouse()
    {
        return $this->warehouse;
    }

    /**
     * Sets the value of warehouse.
     *
     * @param mixed $warehouse the warehouse
     *
     * @return self
     */
    public function setWarehouse($warehouse)
    {
        $this->warehouse = $warehouse;

        return $this;
    }


    /**
     * Gets the value of destination.
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Sets the value of destination.
     *
     * @param string $destination the destination
     *
     * @return self
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }
}




