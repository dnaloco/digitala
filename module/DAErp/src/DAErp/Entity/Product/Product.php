<?php
namespace DAErp\Entity\Product;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\Entity\Erp\Product\ProductInterface;
/**
 * @ORM\Table(name="daerp_product_products")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Product implements ProductInterface
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
     * @ORM\Column(name="reference", type="string", length=255, nullable=true, unique=true)
     */
    private $reference;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="title", type="string", length=255, nullable=false)
	 */
	private $title;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="subtitle", type="string", length=60, nullable=true)
	 */
	private $subtitle;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\Entity\Erp\Manufacturer\ManufacturerInterface", inversedBy="products")
     * @ORM\JoinColumn(name="manufacturer_id", referencedColumnName="id")
     */
	private $manufacturer;

    /**
     * @ORM\ManyToMany(targetEntity="DACore\Entity\Erp\Supplier\SupplierInterface", inversedBy="products")
     * @ORM\JoinTable(name="daerp_product_products_suppliers")
     */
    private $suppliers;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="seo_description", type="string", length=255, nullable=true)
	 */
	private $seoDescription;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="description", type="text", nullable=true)
	 */
	private $description;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="brief_description", type="text", nullable=true)
	 */
	private $briefDescription;

	/**
	 * @ORM\ManyToOne(targetEntity="DACore\Entity\Erp\Product\DepartmentInterface")
	 * @ORM\JoinColumn(name="department_id", referencedColumnName="id", nullable=true)
	 **/
	private $department;

	/**
	 * @ORM\ManyToOne(targetEntity="DACore\Entity\Erp\Product\CategoryInterface")
	 * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=true)
	 **/
	private $category;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\Entity\Erp\Product\FeatureInterface")
	 * @ORM\JoinTable(name="daerp_product_product_features",
	 *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="feature_id", referencedColumnName="id")}
	 *      )
	 **/
	private $features;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\ImageInterface", cascade={"persist", "remove"})
	 * @ORM\JoinTable(name="daerp_product_images",
	 *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="image_id", referencedColumnName="id", unique=true)}
	 *      )
	 */
	private $images;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\VideoInterface", cascade={"persist", "remove"})
	 * @ORM\JoinTable(name="daerp_product_video_links",
	 *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="videoLink_id", referencedColumnName="id", unique=true)}
	 *      )
	 */
	private $videos;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="unit_type", type="string", length=50, nullable=false)
	 */
	private $unitType;

    /**
     * @var string
     *
     * @ORM\Column(name="package_qtty", type="float", nullable=true)
     */
    private $packageQtty;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="weight", type="float", nullable=true)
	 */
	private $weight;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="dimension_length", type="float", nullable=true)
	 */
	private $dimensionLength;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="dimension_height", type="float", nullable=true)
	 */
	private $dimensionHeight;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="dimension_width", type="float", nullable=true)
	 */
	private $dimensionWidth;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\Entity\Erp\Product\RatingInterface")
	 * @ORM\JoinTable(name="daerp_product_products_ratings",
	 *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="product_rating_id", referencedColumnName="id", unique=true)}
	 *      )
	 */
	private $productRatings;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\Entity\Erp\Product\ProductInterface")
	 * @ORM\JoinTable(name="daerp_product_product_alternate_products",
	 *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="alternate_produto_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $alternativeProducts;

	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="is_highlighted", type="boolean", nullable=true)
	 */
	private $isHighlighted;

	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="is_Launch", type="boolean", nullable=true)
	 */
	private $isLaunch;

	/**
     * @ORM\OneToMany(targetEntity="DACore\Entity\Erp\Order\Store\OrderInterface", mappedBy="product")
     */
	private $stores;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="enum_productstatus", nullable=true)
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

	public function __construct(array $data = array()) {
        $this->status = 'cadastrado';
		$this->createdAt = new \DateTime("now");
		$this->updatedAt = new \DateTime("now");

        $this->suppliers = new ArrayCollection();
		$this->features = new ArrayCollection();
		$this->images = new ArrayCollection();
		$this->videos = new ArrayCollection();
		$this->produtoRating = new ArrayCollection();
		$this->mixProducts = new ArrayCollection();
		$this->alternativeProducts = new ArrayCollection();
		$this->stores = new ArrayCollection();

		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

}