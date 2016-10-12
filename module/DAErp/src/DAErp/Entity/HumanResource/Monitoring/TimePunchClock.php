<?php
namespace DAErp\Entity\HumanResource\Monitoring;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\HumanResource\Monitoring\TimePunchClockInterfarce;

/**
 *
 * @ORM\Table(name="daerp_human_resource_monitoring_time_punch_clocks")
 * @ORM\Entity
 */
class TimePunchClock
implements TimePunchClockInterfarce
{
	/**
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 *
	 * @ORM\Column(name="check_in", type="datetime", nullable=false)
	 */
	private $checkIn;

	/**
	 *
	 * @ORM\Column(name="check_out", type="datetime", nullable=false)
	 */
	private $checkOut;

	/**
	 *
	 * @ORM\Column(name="reason", type="datetime", nullable=false)
	 */
	private $reason;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\HumanResource\PartnerSuperclassInterface")
     * @ORM\JoinColumn(name="appraiser_id", referencedColumnName="id", nullable=true)
     **/
	private $partner;

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
     * Gets the value of checkIn.
     *
     * @return mixed
     */
    public function getCheckIn()
    {
        return $this->checkIn;
    }

    /**
     * Sets the value of checkIn.
     *
     * @param mixed $checkIn the check in
     *
     * @return self
     */
    public function setCheckIn($checkIn)
    {
        $this->checkIn = $checkIn;

        return $this;
    }

    /**
     * Gets the value of checkOut.
     *
     * @return mixed
     */
    public function getCheckOut()
    {
        return $this->checkOut;
    }

    /**
     * Sets the value of checkOut.
     *
     * @param mixed $checkOut the check out
     *
     * @return self
     */
    public function setCheckOut($checkOut)
    {
        $this->checkOut = $checkOut;

        return $this;
    }

    /**
     * Gets the value of reason.
     *
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Sets the value of reason.
     *
     * @param mixed $reason the reason
     *
     * @return self
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Gets the value of partner.
     *
     * @return mixed
     */
    public function getPartner()
    {
        return $this->partner;
    }

    /**
     * Sets the value of partner.
     *
     * @param mixed $partner the partner
     *
     * @return self
     */
    public function setPartner($partner)
    {
        $this->partner = $partner;

        return $this;
    }
}