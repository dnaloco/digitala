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

}
