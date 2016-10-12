<?php
namespace DAErp\Entity\Product;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Product\ProductInterface;
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
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Manufacturer\ManufacturerInterface", inversedBy="products")
     * @ORM\JoinColumn(name="manufacturer_id", referencedColumnName="id")
     */
	private $manufacturer;

    /**
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Supplier\SupplierInterface", inversedBy="products")
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
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Product\DepartmentInterface")
	 * @ORM\JoinColumn(name="department_id", referencedColumnName="id", nullable=true)
	 **/
	private $department;

	/**
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Product\CategoryInterface")
	 * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=true)
	 **/
	private $category;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Product\FeatureInterface")
	 * @ORM\JoinTable(name="daerp_product_products_features",
	 *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="feature_id", referencedColumnName="id")}
	 *      )
	 **/
	private $features;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\ImageInterface", cascade={"persist", "remove"})
	 * @ORM\JoinTable(name="daerp_products_images",
	 *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="image_id", referencedColumnName="id", unique=true)}
	 *      )
	 */
	private $images;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\VideoInterface", cascade={"persist", "remove"})
	 * @ORM\JoinTable(name="daerp_products_video_links",
	 *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="video_link_id", referencedColumnName="id", unique=true)}
	 *      )
	 */
	private $videos;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="unit_type", type="enum_unittype", nullable=false)
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
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Product\RatingInterface")
	 * @ORM\JoinTable(name="daerp_product_ratings",
	 *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="rating_id", referencedColumnName="id", unique=true)}
	 *      )
	 */
	private $ratings;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Erp\Product\ProductInterface")
	 * @ORM\JoinTable(name="daerp_product_products_alternate_products",
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
     * @ORM\OneToMany(targetEntity="DACore\IEntities\Erp\Order\Store\OrderInterface", mappedBy="product")
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
		$this->ratings = new ArrayCollection();
		$this->mixProducts = new ArrayCollection();
		$this->alternativeProducts = new ArrayCollection();
		$this->stores = new ArrayCollection();

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
     * Gets the value of reference.
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Sets the value of reference.
     *
     * @param string $reference the reference
     *
     * @return self
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Gets the value of title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the value of title.
     *
     * @param string $title the title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Gets the value of subtitle.
     *
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Sets the value of subtitle.
     *
     * @param string $subtitle the subtitle
     *
     * @return self
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Gets the value of manufacturer.
     *
     * @return mixed
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Sets the value of manufacturer.
     *
     * @param mixed $manufacturer the manufacturer
     *
     * @return self
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Gets the value of suppliers.
     *
     * @return mixed
     */
    public function getSuppliers()
    {
        return $this->suppliers;
    }

    /**
     * Sets the value of suppliers.
     *
     * @param mixed $suppliers the suppliers
     *
     * @return self
     */
    public function setSuppliers($suppliers)
    {
        $this->suppliers = $suppliers;

        return $this;
    }

    /**
     * Gets the value of seoDescription.
     *
     * @return string
     */
    public function getSeoDescription()
    {
        return $this->seoDescription;
    }

    /**
     * Sets the value of seoDescription.
     *
     * @param string $seoDescription the seo description
     *
     * @return self
     */
    public function setSeoDescription($seoDescription)
    {
        $this->seoDescription = $seoDescription;

        return $this;
    }

    /**
     * Gets the value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the value of description.
     *
     * @param string $description the description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets the value of briefDescription.
     *
     * @return string
     */
    public function getBriefDescription()
    {
        return $this->briefDescription;
    }

    /**
     * Sets the value of briefDescription.
     *
     * @param string $briefDescription the brief description
     *
     * @return self
     */
    public function setBriefDescription($briefDescription)
    {
        $this->briefDescription = $briefDescription;

        return $this;
    }

    /**
     * Gets the value of department.
     *
     * @return mixed
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Sets the value of department.
     *
     * @param mixed $department the department
     *
     * @return self
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Gets the value of category.
     *
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets the value of category.
     *
     * @param mixed $category the category
     *
     * @return self
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Gets the value of features.
     *
     * @return mixed
     */
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * Sets the value of features.
     *
     * @param mixed $features the features
     *
     * @return self
     */
    public function setFeatures($features)
    {
        $this->features = $features;

        return $this;
    }

    /**
     * Gets the joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="image_id", referencedColumnName="id", unique=true)}
).
     *
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Sets the joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="image_id", referencedColumnName="id", unique=true)}
).
     *
     * @param mixed $images the images
     *
     * @return self
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * Gets the joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="video_link_id", referencedColumnName="id", unique=true)}
).
     *
     * @return mixed
     */
    public function getVideos()
    {
        return $this->videos;
    }

    /**
     * Sets the joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="video_link_id", referencedColumnName="id", unique=true)}
).
     *
     * @param mixed $videos the videos
     *
     * @return self
     */
    public function setVideos($videos)
    {
        $this->videos = $videos;

        return $this;
    }

    /**
     * Gets the value of unitType.
     *
     * @return string
     */
    public function getUnitType()
    {
        return $this->unitType;
    }

    /**
     * Sets the value of unitType.
     *
     * @param string $unitType the unit type
     *
     * @return self
     */
    public function setUnitType($unitType)
    {
        $this->unitType = $unitType;

        return $this;
    }

    /**
     * Gets the value of packageQtty.
     *
     * @return string
     */
    public function getPackageQtty()
    {
        return $this->packageQtty;
    }

    /**
     * Sets the value of packageQtty.
     *
     * @param string $packageQtty the package qtty
     *
     * @return self
     */
    public function setPackageQtty($packageQtty)
    {
        $this->packageQtty = $packageQtty;

        return $this;
    }

    /**
     * Gets the value of weight.
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Sets the value of weight.
     *
     * @param string $weight the weight
     *
     * @return self
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Gets the value of dimensionLength.
     *
     * @return string
     */
    public function getDimensionLength()
    {
        return $this->dimensionLength;
    }

    /**
     * Sets the value of dimensionLength.
     *
     * @param string $dimensionLength the dimension length
     *
     * @return self
     */
    public function setDimensionLength($dimensionLength)
    {
        $this->dimensionLength = $dimensionLength;

        return $this;
    }

    /**
     * Gets the value of dimensionHeight.
     *
     * @return string
     */
    public function getDimensionHeight()
    {
        return $this->dimensionHeight;
    }

    /**
     * Sets the value of dimensionHeight.
     *
     * @param string $dimensionHeight the dimension height
     *
     * @return self
     */
    public function setDimensionHeight($dimensionHeight)
    {
        $this->dimensionHeight = $dimensionHeight;

        return $this;
    }

    /**
     * Gets the value of dimensionWidth.
     *
     * @return string
     */
    public function getDimensionWidth()
    {
        return $this->dimensionWidth;
    }

    /**
     * Sets the value of dimensionWidth.
     *
     * @param string $dimensionWidth the dimension width
     *
     * @return self
     */
    public function setDimensionWidth($dimensionWidth)
    {
        $this->dimensionWidth = $dimensionWidth;

        return $this;
    }

    /**
     * Gets the joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="product_rating_id", referencedColumnName="id", unique=true)}
).
     *
     * @return mixed
     */
    public function getRatings()
    {
        return $this->ratings;
    }

    /**
     * Sets the joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="product_rating_id", referencedColumnName="id", unique=true)}
).
     *
     * @param mixed $productRatings the product ratings
     *
     * @return self
     */
    public function setRatings($productRatings)
    {
        $this->productRatings = $ratings;

        return $this;
    }

    /**
     * Gets the value of alternativeProducts.
     *
     * @return mixed
     */
    public function getAlternativeProducts()
    {
        return $this->alternativeProducts;
    }

    /**
     * Sets the value of alternativeProducts.
     *
     * @param mixed $alternativeProducts the alternative products
     *
     * @return self
     */
    public function setAlternativeProducts($alternativeProducts)
    {
        $this->alternativeProducts = $alternativeProducts;

        return $this;
    }

    /**
     * Gets the value of isHighlighted.
     *
     * @return boolean
     */
    public function getIsHighlighted()
    {
        return $this->isHighlighted;
    }

    /**
     * Sets the value of isHighlighted.
     *
     * @param boolean $isHighlighted the is highlighted
     *
     * @return self
     */
    public function setIsHighlighted($isHighlighted)
    {
        $this->isHighlighted = $isHighlighted;

        return $this;
    }

    /**
     * Gets the value of isLaunch.
     *
     * @return boolean
     */
    public function getIsLaunch()
    {
        return $this->isLaunch;
    }

    /**
     * Sets the value of isLaunch.
     *
     * @param boolean $isLaunch the is launch
     *
     * @return self
     */
    public function setIsLaunch($isLaunch)
    {
        $this->isLaunch = $isLaunch;

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
     * Gets the value of status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the value of status.
     *
     * @param string $status the status
     *
     * @return self
     */
    public function setStatus($status)
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
     * @ORM\PrePersist
     */
    public function setUpdatedAt()
    {
        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");

        return $this;
    }
}