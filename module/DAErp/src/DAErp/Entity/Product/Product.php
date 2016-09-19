<?php
namespace DAErp\Entity\Product;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * @ORM\Table(name="daerp_product_products")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Product {
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
	 * @ORM\Column(name="reference", type="string", length=60, unique=true, nullable=true)
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
	 * @ORM\ManyToOne(targetEntity="DACore\Entity\Erp\Manufacturer\ManufacturerInterface")
	 * @ORM\JoinColumn(name="manufacturer_id", referencedColumnName="id", nullable=true)
	 **/
	private $manufacturer;

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
	 * @ORM\ManyToMany(targetEntity="R2Erp\Entity\Product\FeatureTag")
	 * @ORM\JoinTable(name="r2_erp_product_product_feature_tags",
	 *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="feature_tag_id", referencedColumnName="id")}
	 *      )
	 **/
	private $features;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\Entity\Base\ImageInterface", cascade={"persist", "remove"})
	 * @ORM\JoinTable(name="r2_erp_product_images",
	 *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="image_id", referencedColumnName="id", unique=true)}
	 *      )
	 */
	private $images;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\Entity\Base\VideoInterface", cascade={"persist", "remove"})
	 * @ORM\JoinTable(name="r2_erp_product_video_links",
	 *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="videoLink_id", referencedColumnName="id", unique=true)}
	 *      )
	 */
	private $videos;

	private $unitType;

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
	 * @ORM\ManyToMany(targetEntity="R2Base\Entity\Rating")
	 * @ORM\JoinTable(name="r2_erp_product_ratings",
	 *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="product_rating_id", referencedColumnName="id", unique=true)}
	 *      )
	 */
	private $produtoRatings;

	/**
	 * @ORM\ManyToMany(targetEntity="R2Erp\Entity\Product\Product")
	 * @ORM\JoinTable(name="r2_erp_product_product_alternate_products",
	 *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="alternate_produto_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $alternativeProducts;

	/**
	 * @var Booleam
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
     * @ORM\OneToMany(targetEntity="Feature", mappedBy="product")
     */
	private $stores;

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

	public function __construct(array $options = array()) {
		$this->createdAt = new \DateTime("now");
		$this->updatedAt = new \DateTime("now");

		$this->features = new ArrayCollection();
		$this->images = new ArrayCollection();
		$this->videos = new ArrayCollection();
		$this->produtoRating = new ArrayCollection();
		$this->mixProducts = new ArrayCollection();
		$this->alternativeProducts = new ArrayCollection();
		$this->stores = new ArrayCollection();

		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param int $id
	 * @return Product
	 */
	public function setId($id) {
		$this->id = $id;
		return $this;
	}



	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 * @return Product
	 */
	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSubtitle() {
		return $this->subtitle;
	}

	/**
	 * @param string $subtitle
	 * @return Product
	 */
	public function setSubtitle($subtitle) {
		$this->subtitle = $subtitle;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getManufacturer() {
		return $this->manufacturer;
	}

	/**
	 * @param mixed $manufacturer
	 * @return Product
	 */
	public function setManufacturer($manufacturer) {
		$this->manufacturer = $manufacturer;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSeoDescription() {
		return $this->seoDescription;
	}

	/**
	 * @param string $seoDescription
	 * @return Product
	 */
	public function setSeoDescription($seoDescription) {
		$this->seoDescription = $seoDescription;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param string $description
	 * @return Product
	 */
	public function setDescription($description) {
		$this->description = $description;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getBriefDescription() {
		return $this->briefDescription;
	}

	/**
	 * @param string $briefDescription
	 * @return Product
	 */
	public function setBriefDescription($briefDescription) {
		$this->briefDescription = $briefDescription;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDepartment() {
		return $this->department;
	}

	/**
	 * @param mixed $department
	 * @return Product
	 */
	public function setDepartment($department) {
		$this->department = $department;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * @param mixed $category
	 * @return Product
	 */
	public function setCategory($category) {
		$this->category = $category;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getFeatures() {
		return $this->features;
	}

	/**
	 * @param mixed $featureTags
	 * @return Product
	 */
	public function setFeatures($features) {
		$this->features = $features;
		return $this;
	}

	public function addFeature($feature) {
		$this->features->add($feature);
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getImages() {
		return $this->images;
	}

	/**
	 * @param mixed $images
	 * @return Product
	 */
	public function setImages($images) {
		$this->images = $images;
		return $this;
	}

	public function addImage($image) {
		$this->images->add($image);
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getVideos() {
		return $this->videos;
	}

	/**
	 * @param mixed $videos
	 * @return Product
	 */
	public function setVideos($videos) {
		$this->videos = $videos;
		return $this;
	}

	public function addVideo($video) {
		$this->videos_ > add($video);
		return $this;
	}

	/**
	 * @return string
	 */
	public function getWeight() {
		return $this->weight;
	}

	/**
	 * @param string $weight
	 * @return Product
	 */
	public function setWeight($weight) {
		$this->weight = $weight;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDimensionLength() {
		return $this->dimensionLength;
	}

	/**
	 * @param string $dimensionLength
	 * @return Product
	 */
	public function setDimensionLength($dimensionLength) {
		$this->dimensionLength = $dimensionLength;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDimensionHeight() {
		return $this->dimensionHeight;
	}

	/**
	 * @param string $dimensionHeight
	 * @return Product
	 */
	public function setDimensionHeight($dimensionHeight) {
		$this->dimensionHeight = $dimensionHeight;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDimensionWidth() {
		return $this->dimensionWidth;
	}

	/**
	 * @param string $dimensionWidth
	 * @return Product
	 */
	public function setDimensionWidth($dimensionWidth) {
		$this->dimensionWidth = $dimensionWidth;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getProdutoRatings() {
		return $this->produtoRatings;
	}

	/**
	 * @param mixed $produtoRatings
	 * @return Product
	 */
	public function setProdutoRatings($produtoRatings) {
		$this->produtoRatings = $produtoRatings;
		return $this;
	}

	public function addProdutoRating($produtoRating) {
		$this->produtoRatings->add($produtoRating);
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAlternativeProducts() {
		return $this->alternativeProducts;
	}

	/**
	 * @param mixed $alternativeProducts
	 * @return Product
	 */
	public function setAlternativeProducts($alternativeProducts) {
		$this->alternativeProducts = $alternativeProducts;
		return $this;
	}

	public function setAlternativeProduct($alternativeProduct) {
		$this->alternativeProducts->add($alternativeProduct);
		return $this;
	}

	/**
	 * @return Booleam
	 */
	public function getIsHighlighted() {
		return $this->isHighlighted;
	}

	/**
	 * @param Booleam $isHighlighted
	 * @return Product
	 */
	public function setIsHighlighted($isHighlighted) {
		$this->isHighlighted = $isHighlighted;
		return $this;
	}

	/**
	 * @return Booleam
	 */
	public function getIsLaunch() {
		return $this->isLaunch;
	}

	/**
	 * @param Booleam $isLaunch
	 * @return Product
	 */
	public function setIsLaunch($isLaunch) {
		$this->isLaunch = $isLaunch;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getStore() {
		return $this->store;
	}

	/**
	 * @param mixed $store
	 * @return Product
	 */
	public function setStore($store) {
		$this->store = $store;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getCreatedAt() {
		return $this->createdAt;
	}

	/**
	 * @param \DateTime $createdAt
	 * @return Product
	 */
	public function setCreatedAt($createdAt) {
		$this->createdAt = $createdAt;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getUpdatedAt() {
		return $this->updatedAt;
	}

	/**
	 * @param \DateTime $updatedAt
	 * @return Product
	 *
	 * @ORM\PrePersist
	 */
	public function setUpdatedAt() {
		$this->updatedAt = new \Datetime("now");
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
}