<?php
namespace DAErp\Entity\Order\Service;

use Doctrine\ORM\Mapping as ORM;
use DAErp\Entity\Order\OrderSuperClass;
use DACore\IEntities\Erp\Order\Service\OrderInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Zend\Stdlib\Hydrator;
/**
 *
 * @ORM\Table(name="daerp_order_service_orders")
 * @ORM\Entity
 */

class Order extends OrderSuperClass
implements OrderInterface
{

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Order\Service\ServiceInterface")
	 * @ORM\JoinTable(name="daerp_order_sale_orders_services",
	 *      joinColumns={@ORM\JoinColumn(name="order_service_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="sale_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $services;

	/**
	 * @ORM\OneToOne(targetEntity="DACore\IEntities\Base\PersonInterface")
	 * @ORM\JoinColumn(name="customer_id", referencedColumnName="id", nullable=false)
	 **/
	private $customer;

	public function __construct(array $data = array()) {
		$this->rawMaterials = new ArrayCollection();
		$this->setPaymentType('serviço');
		parent::__construct($data);
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}


    /**
     * Gets the value of services.
     *
     * @return mixed
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * Sets the value of services.
     *
     * @param mixed $services the services
     *
     * @return self
     */
    public function setServices($services)
    {
        $this->services = $services;

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