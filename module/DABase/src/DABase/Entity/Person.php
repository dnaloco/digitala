<?php
namespace DABase\Entity;

use DACore\Entity\Base\PersonInterface;

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
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * nome completo do usuário
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    protected $name;

    /**
     * Sexo da pessoa(masculino ou feminino)
     * @var \DABase\Enum\EnumGenderType
     *
     * @ORM\Column(name="gender", type="enum_gendertype", nullable=false)
     */
    protected $gender;

    /**
     * Data de nascimento
     * @var \DateTime
     *
     *
     * @ORM\Column(name="birthdate", type="datetime", nullable=true)
     */
    protected $birthdate;

    /**
     * Descrição se necessário
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;

    /**
     * @ORM\OneToOne(targetEntity="DACore\Entity\Base\ImageInterface", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="photo_id", referencedColumnName="id")
     */
    protected $photo;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * 
     * addresses
     * 
     * @ORM\ManyToMany(targetEntity="DACore\Entity\Base\AddressInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_person_addresses",
     *      joinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="address_id", referencedColumnName="id")}
     *      )
     **/
    protected $addresses;

    

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * 
     * addresses
     * 
     * @ORM\ManyToMany(targetEntity="DACore\Entity\Base\TelephoneInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_person_telephones",
     *      joinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="telephone_id", referencedColumnName="id")}
     *      )
     **/
    protected $telephones;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * 
     * emails
     * 
     * @ORM\ManyToMany(targetEntity="DACore\Entity\Base\EmailInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_person_emails",
     *      joinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id")},
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
     * @ORM\JoinTable(name="dabase_person_social_networks",
     *      joinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="social_network_id", referencedColumnName="id")}
     *      )
     **/
    protected $socialNetworks;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="DACore\Entity\Base\DocumentInterface", mappedBy="person", cascade={"persist", "remove"})
     */
    protected $documents;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=200, unique=true, nullable=true)
     */
    protected $website;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
    protected $notes;

    /**
     * @ORM\OneToOne(targetEntity="DACore\Entity\User\UserInterface", inversedBy="person")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * Quando a entidade foi criada
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    protected $createdAt;

    /**
     * Quando a entidade foi modificada
     *
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected $updatedAt;

    public function __construct(array $options = array())
    {
        $this->telephones = new ArrayCollection();
        $this->documents = new ArrayCollection();
        $this->emails = new ArrayCollection();
        $this->socialNetworks = new ArrayCollection();
        $this->addresses = new ArrayCollection();

        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");

        (new Hydrator\ClassMethods)->hydrate($options, $this);

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
     * Gets the nome completo do usuário.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the nome completo do usuário.
     *
     * @param string $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the Sexo da pessoa(masculino ou feminino).
     *
     * @return \DABase\Enum\EnumGenderType
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Sets the Sexo da pessoa(masculino ou feminino).
     *
     * @param \DABase\Enum\EnumGenderType $gender the gender
     *
     * @return self
     */
    public function setGender(\DABase\Enum\EnumGenderType $gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Gets the Data de nascimento.
     *
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Sets the Data de nascimento.
     *
     * @param \DateTime $birthdate the birthdate
     *
     * @return self
     */
    public function setBirthdate(\DateTime $birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Gets the Descrição se necessário.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the Descrição se necessário.
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
    public function setAddresses(\Doctrine\Common\Collections\ArrayCollection $addresses)
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
    public function setTelephones(\Doctrine\Common\Collections\ArrayCollection $telephones)
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
    public function setEmails(\Doctrine\Common\Collections\ArrayCollection $emails)
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
    public function setSocialNetworks(\Doctrine\Common\Collections\ArrayCollection $socialNetworks)
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
    public function setDocuments(\Doctrine\Common\Collections\ArrayCollection $documents)
    {
        $this->documents = $documents;

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
     * Gets the Quando a entidade foi criada.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Gets the Quando a entidade foi modificada.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets the Quando a entidade foi modificada.
     *
     * @param \DateTime $updatedAt the updated at
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
