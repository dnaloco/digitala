<?php
namespace DABase\Entity;

use DACore\Entity\Base\CompanyInterface;

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
     * @ORM\Column(name="type", type="enum_companytype")
     */
	private $type;

	/**
     * @var string
     *
     * @ORM\Column(name="trading_name", type="string", length=100, unique=true, nullable=false)
     */
	private $tradingName;

	/**
     * @var string
     *
     * @ORM\Column(name="company_mame", type="string", length=100, unique=true, nullable=true)
     */
	private $companyName;

	/**
	 * @var \DACore\Entity\Base\CompanyCategoryInterface
	 *
	 * @ORM\ManyToOne(targetEntity="DACore\Entity\Base\CompanyCategoryInterface")
	 * @ORM\JoinColumn(name="company_category_id", referencedColumnName="id", nullable=true)
	 *
	 */
	private $category;

	/**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=200, unique=true, nullable=true)
     */
	private $website;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * 
     * addresses
     * 
     * @ORM\ManyToMany(targetEntity="DACore\Entity\Base\TelephoneInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_company_telephones",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="telephone_id", referencedColumnName="id")}
     *      )
     **/
    protected $telephones;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="DACore\Entity\Base\DocumentInterface", mappedBy="company", cascade={"persist", "remove"})
     */
    private $documents;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * 
     * emails
     * 
     * @ORM\ManyToMany(targetEntity="DACore\Entity\Base\EmailInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_company_emails",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="email_id", referencedColumnName="id")}
     *      )
     **/
    protected $emails;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * 
     * addresses
     * 
     * @ORM\ManyToMany(targetEntity="DACore\Entity\Base\SocialNetworkInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_company_social_networks",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="social_network_id", referencedColumnName="id")}
     *      )
     **/
    private $socialNetworks;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * 
     * emails
     * 
     * @ORM\ManyToMany(targetEntity="DACore\Entity\Base\PersonInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_company_contacts",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id")}
     *      )
     **/
    private $contacts;

	/**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * 
     * endereços
     * 
	 * @ORM\ManyToMany(targetEntity="DACore\Entity\Base\AddressInterface", cascade={"persist", "remove"})
	 * @ORM\JoinTable(name="dabase_company_addresses",
	 *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="address_id", referencedColumnName="id")}
	 *      )
	 **/
	private $addresses;

	/**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
	private $description;

	/**
     * Logo da empresa
     * 
     * @var \DACore\Entity\Base\ImageInterface
     * @ORM\ManyToOne(targetEntity="DACore\Entity\Base\ImageInterface")
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     */
	private $logo;

	/**
     * Bens, produtos ou serviços que a empresa fornece
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\ManyToMany(targetEntity="DACore\Entity\Base\GoodTagInterface")
     * @ORM\JoinTable(name="dabase_company_good_tags",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="good_tag_id", referencedColumnName="id")}
     *      )
     */
	private $goodTags;

	/**
     * @var string
     *
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
	private $notes;

    /**
     * @ORM\OneToOne(targetEntity="DACore\Entity\User\UserInterface", inversedBy="company", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

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
     * Gets the value of type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the value of type.
     *
     * @param string $type the type
     *
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Gets the value of tradingName.
     *
     * @return string
     */
    public function getTradingName()
    {
        return $this->tradingName;
    }

    /**
     * Sets the value of tradingName.
     *
     * @param string $tradingName the trading name
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
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Sets the value of companyName.
     *
     * @param string $companyName the company name
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
     * @return \DACore\Entity\Base\CompanyCategoryInterface
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets the value of category.
     *
     * @param \DACore\Entity\Base\CompanyCategoryInterface $category the category
     *
     * @return self
     */
    public function setCategory(\DACore\Entity\Base\CompanyCategoryInterface $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Gets the value of website.
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Sets the value of website.
     *
     * @param string $website the website
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
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * Sets the value of documents.
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $documents the documents
     *
     * @return self
     */
    public function setDocuments(\Doctrine\Common\Collections\ArrayCollection $documents)
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
     * Gets the Logo da empresa.
     *
     * @return \DACore\Entity\Base\ImageInterface
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Sets the Logo da empresa.
     *
     * @param \DACore\Entity\Base\ImageInterface $logo the logo
     *
     * @return self
     */
    public function setLogo(\DACore\Entity\Base\ImageInterface $logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Gets the Bens, produtos ou serviços que a empresa fornece
joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="good_tag_id", referencedColumnName="id")}
).
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getGoodTags()
    {
        return $this->goodTags;
    }

    /**
     * Sets the Bens, produtos ou serviços que a empresa fornece
joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
inverseJoinColumns={@ORM\JoinColumn(name="good_tag_id", referencedColumnName="id")}
).
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $goodTags the good tags
     *
     * @return self
     */
    public function setGoodTags(\Doctrine\Common\Collections\ArrayCollection $goodTags)
    {
        $this->goodTags = $goodTags;

        return $this;
    }

    /**
     * Gets the value of notes.
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Sets the value of notes.
     *
     * @param string $notes the notes
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
     * @return self
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}