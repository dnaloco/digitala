<?php
namespace DAErp\Entity\Order\Store;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;


/**
 * @ORM\Table(name="daerp_product_budgets")
 * @ORM\Entity
 */
class Budget
{
	/**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
	private $id;

	private $storeBudgets;

	private $supplier;

	private $validity;

	private $total;

	private $discountPercentage;

	private $totalWithDiscount;

	private $mainContact;
}