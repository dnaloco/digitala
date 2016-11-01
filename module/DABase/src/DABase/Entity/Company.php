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
     * @ORM\Column(name="reference", type="string", length=255, nullable=true, unique=true)
     */
    private $reference;

    /**
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\CompanyTypeInterface")
     * @ORM\JoinTable(name="dabase_companies_types",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="type_id", referencedColumnName="id")}
     *      )
     **/
	private $types;

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
     * @ORM\JoinTable(name="dabase_companies_telephones",
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
     * @ORM\JoinTable(name="dabase_companies_emails",
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
     * @ORM\JoinTable(name="dabase_companies_social_networks",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="social_network_id", referencedColumnName="id")}
     *      )
     **/
    private $socialNetworks;

    /**
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\PersonInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_companies_contacts",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id")}
     *      )
     **/

    /**
     * @ORM\OneToMany(targetEntity="DACore\IEntities\Base\PersonInterface", mappedBy="company", cascade={"persist"})
     */
    private $contacts;

	/**
	 * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\AddressInterface", cascade={"persist", "remove"})
	 * @ORM\JoinTable(name="dabase_companies_addresses",
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
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\GoodTagInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_companies_good_tags",
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
        $this->types = new ArrayCollection();
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
     * Gets the value of reference.
     *
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Sets the value of reference.
     *
     * @param mixed $reference the reference
     *
     * @return self
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Gets the value of types.
     *
     * @return mixed
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * Sets the value of types.
     *
     * @param mixed $types the types
     *
     * @return self
     */
    public function setTypes($types)
    {
        $this->types = $types;

        return $this;
    }

    public function addType(\DACore\IEntities\Base\CompanyTypeInterface $type)
    {
        $this->types->add($type);

        return $this;
    }

    public function removeType(\DACore\IEntities\Base\CompanyTypeInterface $type)
    {
        $this->types->removeElement($type);

        return $this;
    }

    /**
     * Gets the value of tradingName.
     *
     * @return mixed
     */
    public function getTradingName()
    {
        return $this->tradingName;
    }

    /**
     * Sets the value of tradingName.
     *
     * @param mixed $tradingName the trading name
     *
     * @return self
     */
    public function setTradingName($tradingName)
    {
        $this->tradingName = $tradingName;

        return $this;
    }

    /**
     * Gets the value of companyName.
     *
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Sets the value of companyName.
     *
     * @param mixed $companyName the company name
     *
     * @return self
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

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
     * Gets the value of website.
     *
     * @return mixed
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Sets the value of website.
     *
     * @param mixed $website the website
     *
     * @return self
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Gets the value of telephones.
     *
     * @return mixed
     */
    public function getTelephones()
    {
        return $this->telephones;
    }

    /**
     * Sets the value of telephones.
     *
     * @param mixed $telephones the telephones
     *
     * @return self
     */
    public function setTelephones($telephones)
    {
        $this->telephones = $telephones;

        return $this;
    }

    /**
     * Gets the value of documents.
     *
     * @return mixed
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * Sets the value of documents.
     *
     * @param mixed $documents the documents
     *
     * @return self
     */
    public function setDocuments($documents)
    {
        $this->documents = $documents;

        return $this;
    }

    /**
     * Gets the value of emails.
     *
     * @return mixed
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * Sets the value of emails.
     *
     * @param mixed $emails the emails
     *
     * @return self
     */
    public function setEmails($emails)
    {
        $this->emails = $emails;

        return $this;
    }

    /**
     * Gets the value of socialNetworks.
     *
     * @return mixed
     */
    public function getSocialNetworks()
    {
        return $this->socialNetworks;
    }

    /**
     * Sets the value of socialNetworks.
     *
     * @param mixed $socialNetworks the social networks
     *
     * @return self
     */
    public function setSocialNetworks($socialNetworks)
    {
        $this->socialNetworks = $socialNetworks;

        return $this;
    }

    /**
     * Gets the value of contacts.
     *
     * @return mixed
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Sets the value of contacts.
     *
     * @param mixed $contacts the contacts
     *
     * @return self
     */
    public function setContacts($contacts)
    {
        $this->contacts = $contacts;

        return $this;
    }

    /**
     * Gets the value of addresses.
     *
     * @return mixed
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * Sets the value of addresses.
     *
     * @param mixed $addresses the addresses
     *
     * @return self
     */
    public function setAddresses($addresses)
    {
        $this->addresses = $addresses;

        return $this;
    }

    /**
     * Gets the value of description.
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the value of description.
     *
     * @param mixed $description the description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets the value of logo.
     *
     * @return mixed
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Sets the value of logo.
     *
     * @param mixed $logo the logo
     *
     * @return self
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Gets the joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="good_tag_id", referencedColumnName="id")}
).
     *
     * @return mixed
     */
    public function getGoodTags()
    {
        return $this->goodTags;
    }

    /**
     * Sets the joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="good_tag_id", referencedColumnName="id")}
).
     *
     * @param mixed $goodTags the good tags
     *
     * @return self
     */
    public function setGoodTags($goodTags)
    {
        $this->goodTags = $goodTags;

        return $this;
    }

    /**
     * Gets the value of notes.
     *
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Sets the value of notes.
     *
     * @param mixed $notes the notes
     *
     * @return self
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Gets the value of user.
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Sets the value of user.
     *
     * @param mixed $user the user
     *
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Gets the value of createdAt.
     *
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets the value of createdAt.
     *
     * @param mixed $createdAt the created at
     *
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Gets the value of updatedAt.
     *
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets the value of updatedAt.
     *
     * @param mixed $updatedAt the updated at
     *
     * @return self
     * 
     * @ORM\PrePersist
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime('now');

        return $this;
    }
}