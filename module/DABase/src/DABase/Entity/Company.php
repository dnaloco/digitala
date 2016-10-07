<?php
namespace DABase\Entity;

use DACore\IEntities\Base\CompanyInterface;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Empresas
 *
 * @ORM\Table(name="dabase_companies")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Company implements CompanyInterface
{
	/**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
	private $id;

	/**
     *
     * @ORM\Column(name="type", type="enum_companytype")
     */
	private $type;

	/**
     *
     * @ORM\Column(name="trading_name", type="string", length=100, unique=true, nullable=false)
     */
	private $tradingName;

	/**
     *
     * @ORM\Column(name="company_mame", type="string", length=100, unique=true, nullable=true)
     */
	private $companyName;

	/**
	 *
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Base\CompanyCategoryInterface")
	 * @ORM\JoinColumn(name="company_category_id", referencedColumnName="id", nullable=true)
	 *
	 */
	private $category;

	/**
     *
     * @ORM\Column(name="website", type="string", length=200, unique=true, nullable=true)
     */
	private $website;

    /**
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\TelephoneInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_company_telephones",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="telephone_id", referencedColumnName="id")}
     *      )
     **/
    protected $telephones;

    /**
     * @ORM\OneToMany(targetEntity="DACore\IEntities\Base\DocumentInterface", mappedBy="company", cascade={"persist", "remove"})
     */
    private $documents;

    /**
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\EmailInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_company_emails",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="email_id", referencedColumnName="id")}
     *      )
     **/
    protected $emails;

    /**
     * 
     * addresses
     * 
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\SocialNetworkInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_company_social_networks",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="social_network_id", referencedColumnName="id")}
     *      )
     **/
    private $socialNetworks;

    /**
     * 
     * emails
     * 
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\PersonInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_company_contacts",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id")}
     *      )
     **/
    private $contacts;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\AddressInterface", cascade={"persist", "remove"})
	 * @ORM\JoinTable(name="dabase_company_addresses",
	 *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="address_id", referencedColumnName="id")}
	 *      )
	 **/
	private $addresses;

	/**
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
	private $description;

    /**
     * @ORM\OneToOne(targetEntity="DACore\IEntities\Base\ImageInterface", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="logo_id", referencedColumnName="id")
     */
	private $logo;

	/**
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\GoodTagInterface")
     * @ORM\JoinTable(name="dabase_company_good_tags",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="good_tag_id", referencedColumnName="id")}
     *      )
     */
	private $goodTags;

	/**
     *
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
	private $notes;

    /**
     * @ORM\OneToOne(targetEntity="DACore\IEntities\User\UserInterface", inversedBy="company", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

	/**
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
	private $createdAt;

	/**
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
	private $updatedAt;

	public function __construct(array $data)
	{
		$this->telephones = new ArrayCollection();
		$this->documents = new ArrayCollection();
        $this->emails = new ArrayCollection();
        $this->socialNetworks = new ArrayCollection();
		$this->contacts = new ArrayCollection();
		$this->addresses = new ArrayCollection();
		$this->goodTags = new ArrayCollection();

        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");

        (new Hydrator\ClassMethods)->hydrate($data, $this);
	}

}