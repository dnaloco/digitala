<?php
namespace DAErp\Entity\Promotion;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Promotion\CouponInterface;

/**
 *
 * @ORM\Table(name="daerp_promotion_coupons")
 * @ORM\Entity
 */
class Coupon implements CouponInterface
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
	 * @var string
	 *
	 * @ORM\Column(name="coupon", type="string", length=32, nullable=false)
	 */
	private $coupon;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="description", type="string", length=255, nullable=true)
	 */
	private $description;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="discount", type="decimal", precision=8, nullable=false)
	 */
	private $discount;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="start_date", type="datetime")
	 */
	private $startDate;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="end_date", type="datetime")
	 */
	private $endDate;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="quantity", type="integer")
	 */
	private $quantity;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="unlimited", type="boolean")
	 */
	private $unlimited;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Product\ProductInterface")
	 * @ORM\JoinTable(name="daerp_product_product_coupons",
	 *      joinColumns={@ORM\JoinColumn(name="coupon_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")}
	 *      )
	 **/
	private $products;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Product\DepartmentInterface")
	 * @ORM\JoinTable(name="daerp_product_department_coupons",
	 *      joinColumns={@ORM\JoinColumn(name="coupon_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="department_id", referencedColumnName="id")}
	 *      )
	 **/
	private $departments;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Product\CategoryInterface")
	 * @ORM\JoinTable(name="daerp_product_category_coupons",
	 *      joinColumns={@ORM\JoinColumn(name="coupon_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")}
	 *      )
	 **/
	private $categories;

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
        $this->auto = false;
		$this->createdAt = new \DateTime("now");
		$this->updatedAt = new \DateTime("now");

		$this->products = new ArrayCollection();
		$this->mixProducts = new ArrayCollection();
		$this->departments = new ArrayCollection();
		$this->categories = new ArrayCollection();

		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

}