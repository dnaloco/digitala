<?php
namespace DAErp\Entity\Shipper;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Shipper\TimelyRatingInterface;
/**
 *
 * @ORM\Table(name="daerp_shipper_timely_ratings")
 * @ORM\Entity
 */
class TimelyRating implements TimelyRatingInterface
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
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\User\UserInterface")
     * @ORM\JoinColumn(name="appraiser_id", referencedColumnName="id", nullable=true)
     **/
    private $appraiser;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="rating", type="integer", nullable=false)
	 */
	private $rating;

    /**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Order\OrderSuperclassInterface")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     */
	private $order;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Shipper\ShipperInterface", inversedBy="ratings")
     * @ORM\JoinColumn(name="shipper_id", referencedColumnName="id")
     */
    private $shipper;

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

	public function __construct(array $data = array()) {
		$this->createdAt = new \DateTime("now");
		
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
     * Gets the value of appraiser.
     *
     * @return mixed
     */
    public function getAppraiser()
    {
        return $this->appraiser;
    }

    /**
     * Sets the value of appraiser.
     *
     * @param mixed $appraiser the appraiser
     *
     * @return self
     */
    public function setAppraiser($appraiser)
    {
        $this->appraiser = $appraiser;

        return $this;
    }

    /**
     * Gets the value of rating.
     *
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Sets the value of rating.
     *
     * @param string $rating the rating
     *
     * @return self
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Gets the value of order.
     *
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Sets the value of order.
     *
     * @param mixed $order the order
     *
     * @return self
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Gets the value of shipper.
     *
     * @return mixed
     */
    public function getShipper()
    {
        return $this->shipper;
    }

    /**
     * Sets the value of shipper.
     *
     * @param mixed $shipper the shipper
     *
     * @return self
     */
    public function setShipper($shipper)
    {
        $this->shipper = $shipper;

        return $this;
    }

    /**
     * Gets the value of notes.
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Sets the value of notes.
     *
     * @param string $notes the notes
     *
     * @return self
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

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
}