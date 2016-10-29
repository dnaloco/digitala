<?php
namespace DAErp\Entity\Order\Rental;


use Doctrine\ORM\Mapping as ORM;
use DAErp\Entity\Order\OrderSuperClass;
use DACore\IEntities\Erp\Order\Rental\OrderInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Zend\Stdlib\Hydrator;
/**
 *
 * @ORM\Table(name="daerp_order_rental_orders")
 * @ORM\Entity
 */
class Order extends OrderSuperClass
implements OrderInterface
{

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Order\Rental\RentalInterface")
	 * @ORM\JoinTable(name="daerp_order_rental_orders_rentals",
	 *      joinColumns={@ORM\JoinColumn(name="rental_order_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="rental_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $rentals;

	/**
	 * @ORM\OneToOne(targetEntity="DACore\IEntities\Base\PersonInterface")
	 * @ORM\JoinColumn(name="customer_id", referencedColumnName="id", nullable=false)
	 **/
	public $customer;

	public function __construct(array $data = array()) {
        $this->rentals = new ArrayCollection();
        $this->setPaymentType('aluguel');
		parent::__construct($data);
        (new Hydrator\ClassMethods)->hydrate($data, $this);
	}



    /**
     * Gets the value of rentals.
     *
     * @return mixed
     */
    public function getRentals()
    {
        return $this->rentals;
    }

    /**
     * Sets the value of rentals.
     *
     * @param mixed $rentals the rentals
     *
     * @return self
     */
    public function setRentals($rentals)
    {
        $this->rentals = $rentals;

        return $this;
    }

    /**
     * Gets the value of customer.
     *
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Sets the value of customer.
     *
     * @param mixed $customer the customer
     *
     * @return self
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }
}