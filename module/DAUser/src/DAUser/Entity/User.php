<?php
namespace DAUser\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

use DACore\Entity\User\UserInterface;

/**
 * R2Users
 *
 * @ORM\Table(name="dauser_users")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class User implements UserInterface
{
    use \DACore\Strategy\EncryptStrategy;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=255, unique=true, nullable=false)
     */
    protected $user;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    protected $password;

    /**
     * @ORM\ManyToMany(targetEntity="DACore\Entity\Acl\RoleInterface")
     * @ORM\JoinColumn(name="role_id", referencedColumnName="id", nullable=false)
     * @ORM\JoinTable(name="dauser_users_role",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={
     *          @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     *      }
     * )
     *
     **/
    protected $roles;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=true)
     */
    protected $salt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    protected $active;

    /**
     * @var string
     *
     * @ORM\Column(name="activationKey", type="string", length=255, nullable=true)
     */
    protected $activationKey;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
    protected $notes;

    /**
     * @ORM\OneToOne(targetEntity="DACore\Entity\Base\PersonInterface", mappedBy="user", cascade={"persist", "remove"})
     */
    protected $person;

    /**
     * @ORM\OneToOne(targetEntity="DACore\Entity\Base\CompanyInterface", mappedBy="user", cascade={"persist", "remove"})
     */
    protected $company;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=false)
     */
    protected $updatedAt;

    public function __construct(array $data)
    {
        $this->roles = new ArrayCollection();

        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");

        $this->salt = static::encryptSalt($data['user']);
        $this->activationKey = static::encryptActivationKey($data['user'] . $this->salt);

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
     * Gets the value of user.
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Sets the value of user.
     *
     * @param string $user the user
     *
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Gets the value of password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Sets the value of password.
     *
     * @param string $password the password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = static::encryptPassword($password, $this->salt);

        return $this;
    }

    /**
     * Gets the value of roles.
     *
     * @return mixed
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Sets the value of roles.
     *
     * @param mixed $roles the roles
     *
     * @return self
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Gets the value of salt.
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Gets the value of active.
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Sets the value of active.
     *
     * @param boolean $active the active
     *
     * @return self
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Gets the value of activationKey.
     *
     * @return string
     */
    public function getActivationKey()
    {
        return $this->activationKey;
    }

    /**
     * Sets the value of activationKey.
     *
     * @param string $activationKey the activation key
     *
     * @return self
     */
    public function setActivationKey()
    {
        $this->activationKey = static::encryptActivationKey($this->user, $this->salt);

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
     * Gets the value of createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
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
     *
     * @ORM\PrePersist
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime("now");

        return $this;
    }
}
