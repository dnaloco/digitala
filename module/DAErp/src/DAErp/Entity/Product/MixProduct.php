<?php
namespace DAErp\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\Entity\Erp\Product\MixProductInterface;

/**
 *
 * @ORM\Table(name="r2_erp_mix_products")
 * @ORM\Entity
 */
class MixProduct implements MixProductInterface
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
     * @ORM\ManyToMany(targetEntity="DACore\Entity\Erp\Product\ProductInterface")
     * @ORM\JoinTable(name="daerp_mix_product_products",
     *      joinColumns={@ORM\JoinColumn(name="mix_product_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id", unique=true)}
     *      )
     */
	private $products;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="discount", type="decimal", precision=2, nullable=false)
	 */
	private $discount;

	// valor integral, subtração, porcentagem.
	private $discountType;

	/**
	 * @var Boolean
	 *
	 * @ORM\Column(name="is_highlighted", type="boolean", nullable=true)
	 */
	private $isHighlighted;

	/**
	 * @var Booleam
	 *
	 * @ORM\Column(name="is_Launch", type="boolean", nullable=true)
	 */
	private $isLaunch;

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
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}

}