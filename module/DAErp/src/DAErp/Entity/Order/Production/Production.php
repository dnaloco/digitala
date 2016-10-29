<?php

namespace DAErp\Entity\Order\Production;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Order\Production\ProductionInterface;
/**
 *
 * @ORM\Table(name="daerp_order_productions")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Production
implements ProductionInterface
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
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Order\Production\ProcessInterface")
	 * @ORM\JoinColumn(name="production_process", referencedColumnName="id", nullable=false)
	 **/
	private $productionProcess;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="is_finished", type="boolean", nullable=true)
	 */
	private $isFinished;

	/**
	 * @ORM\OneToOne(targetEntity="DACore\IEntities\Erp\Order\Store\OrderInterface")
	 * @ORM\JoinColumn(name="store_order_id", referencedColumnName="id", nullable=true)
	 **/
	private $storeOrder;

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
     * Gets the value of productionProcess.
     *
     * @return mixed
     */
    public function getProductionProcess()
    {
        return $this->productionProcess;
    }

    /**
     * Sets the value of productionProcess.
     *
     * @param mixed $productionProcess the production process
     *
     * @return self
     */
    public function setProductionProcess($productionProcess)
    {
        $this->productionProcess = $productionProcess;

        return $this;
    }

    /**
     * Gets the value of isFinished.
     *
     * @return string
     */
    public function getIsFinished()
    {
        return $this->isFinished;
    }

    /**
     * Sets the value of isFinished.
     *
     * @param string $isFinished the is finished
     *
     * @return self
     */
    public function setIsFinished($isFinished)
    {
        $this->isFinished = $isFinished;

        return $this;
    }

    /**
     * Gets the value of storeOrder.
     *
     * @return mixed
     */
    public function getStoreOrder()
    {
        return $this->storeOrder;
    }

    /**
     * Sets the value of storeOrder.
     *
     * @param mixed $storeOrder the store order
     *
     * @return self
     */
    public function setStoreOrder($storeOrder)
    {
        $this->storeOrder = $storeOrder;

        return $this;
    }

    /**
     * Gets the value of createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets the value of createdAt.
     *
     * @param \DateTime $createdAt the created at
     *
     * @return self
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Gets the value of updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets the value of updatedAt.
     *
     * @param \DateTime $updatedAt the updated at
     *
     * @return self
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
