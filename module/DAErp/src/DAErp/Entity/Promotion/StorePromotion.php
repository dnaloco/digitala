<?php
namespace DAErp\Entity\Promotion;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Promotion\StorePromotionInterface;
/**
 *
 * @ORM\Table(name="daerp_promotion_store_promotions")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class StorePromotion
implements StorePromotionInterface
{
	/**
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Order\Store\StoreInterface")
	 * @ORM\JoinTable(name="daerp_promotion_store_promotions_stores",
	 *      joinColumns={@ORM\JoinColumn(name="store_promotion_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="store_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $stores;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="promotion_type", type="enum_promotiontype")
	 */
	private $promotionType;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="rules", type="array")
	 */
	private $rules;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="status", type="enum_promotionstatus")
	 */
	private $status;

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

	public function __construct(array $data = array())
	{
		$this->createdAt = new \DateTime("now");
		$this->updatedAt = new \DateTime("now");

		$this->stores = new ArrayCollection();

		(new Hydrator\ClassMethods)->hydrate($data, $this);
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
     * Gets the value of stores.
     *
     * @return mixed
     */
    public function getStores()
    {
        return $this->stores;
    }

    /**
     * Sets the value of stores.
     *
     * @param mixed $stores the stores
     *
     * @return self
     */
    public function setStores($stores)
    {
        $this->stores = $stores;

        return $this;
    }

    /**
     * Gets the value of promotionType.
     *
     * @return \DateTime
     */
    public function getPromotionType()
    {
        return $this->promotionType;
    }

    /**
     * Sets the value of promotionType.
     *
     * @param \DateTime $promotionType the promotion type
     *
     * @return self
     */
    public function setPromotionType(\DateTime $promotionType)
    {
        $this->promotionType = $promotionType;

        return $this;
    }

    /**
     * Gets the value of rules.
     *
     * @return \DateTime
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * Sets the value of rules.
     *
     * @param \DateTime $rules the rules
     *
     * @return self
     */
    public function setRules(\DateTime $rules)
    {
        $this->rules = $rules;

        return $this;
    }

    /**
     * Gets the value of status.
     *
     * @return \DateTime
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the value of status.
     *
     * @param \DateTime $status the status
     *
     * @return self
     */
    public function setStatus(\DateTime $status)
    {
        $this->status = $status;

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
     * 
     * @ORM\PrePersist
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime("now");

        return $this;
    }
}