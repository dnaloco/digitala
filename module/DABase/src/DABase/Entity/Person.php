<?php
namespace DABase\Entity;

use DACore\IEntities\Base\PersonInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Pessoa
 *
 * @ORM\Table(name="dabase_peole")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Person implements PersonInterface
{
    /**
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    protected $name;

    /**
     * @ORM\Column(name="gender", type="enum_gendertype", nullable=true)
     */
    protected $gender;

    /**
     *
     *
     * @ORM\Column(name="birthdate", type="datetime", nullable=true)
     */
    protected $birthdate;

    /**
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;

    /**
     * @ORM\OneToOne(targetEntity="DACore\IEntities\Base\ImageInterface", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="photo_id", referencedColumnName="id")
     */
    protected $photo;

    /**
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\AddressInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_person_addresses",
     *      joinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="address_id", referencedColumnName="id")}
     *      )
     **/
    protected $addresses;

    /**
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\TelephoneInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_person_telephones",
     *      joinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="telephone_id", referencedColumnName="id")}
     *      )
     **/
    protected $telephones;

    /**
     *
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\EmailInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_person_emails",
     *      joinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="email_id", referencedColumnName="id")}
     *      )
     **/
    protected $emails;

    /**
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\SocialNetworkInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_person_social_networks",
     *      joinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="social_network_id", referencedColumnName="id")}
     *      )
     **/
    protected $socialNetworks;

    /**
     * @ORM\OneToMany(targetEntity="DACore\IEntities\Base\DocumentInterface", mappedBy="person", cascade={"persist", "remove"})
     */
    protected $documents;

    /**
     * @ORM\Column(name="website", type="string", length=200, unique=true, nullable=true)
     */
    protected $website;

    /**
     *
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
    protected $notes;

    /**
     * @ORM\OneToOne(targetEntity="DACore\IEntities\User\UserInterface", inversedBy="person", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    protected $createdAt;

    /**
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected $updatedAt;

    public function __construct(array $data = array())
    {
        $this->telephones = new ArrayCollection();
        $this->documents = new ArrayCollection();
        $this->emails = new ArrayCollection();
        $this->socialNetworks = new ArrayCollection();
        $this->addresses = new ArrayCollection();

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
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of gender.
     *
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Sets the value of gender.
     *
     * @param mixed $gender the gender
     *
     * @return self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Gets the value of birthdate.
     *
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Sets the value of birthdate.
     *
     * @param mixed $birthdate the birthdate
     *
     * @return self
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

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
     * Gets the value of photo.
     *
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Sets the value of photo.
     *
     * @param mixed $photo the photo
     *
     * @return self
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

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
        $this->updatedAt = new \DateTime("now");

        return $this;
    }
}
