<?php
namespace DAUser\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * R2Users
 *
 * @ORM\Table(name="dauser_users")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class User implements UserInterface
{
    use \DACore\Strategy\EncryptStrategies;

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
     * @ORM\ManyToMany(targetEntity="DAAcl\Entity\RoleInterface")
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

    public function __construct(array $options = array())
    {
        $this->roles = new ArrayCollection();

        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");

        $this->salt = base64_encode(Rand::getBytes(8, true));
        $this->activationKey = md5($this->user . $this->salt);

        (new Hydrator\ClassMethods)->hydrate($options, $this);
    }

    /**
     * Gets the value of id.
     *
     * @return integer
     */
    public function getId(): int
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
    protected function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of user.
     *
     * @return string
     */
    public function getUser(): string
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
    protected function setUser(string $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Gets the value of password.
     *
     * @return string
     */
    public function getPassword(): string
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
    protected function setPassword(string $password)
    {
        $this->password = $this->encryptPassword($password, $this->salt);

        return $this;
    }

    /**
     * Gets the value of roles.
     *
     * @return mixed
     */
    public function getRoles(): ArrayCollection
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
    protected function setRoles(ArrayCollection $roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Gets the value of salt.
     *
     * @return string
     */
    public function getSalt(): string
    {
        return $this->salt;
    }

    /**
     * Sets the value of salt.
     *
     * @param string $salt the salt
     *
     * @return self
     */
    protected function setSalt(string $salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Gets the value of active.
     *
     * @return boolean
     */
    public function getActive(): boolean
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
    protected function setActive(boolean $active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Gets the value of activationKey.
     *
     * @return string
     */
    public function getActivationKey(): string
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
    protected function setActivationKey(string $activationKey)
    {
        $this->activationKey = $activationKey;

        return $this;
    }

    /**
     * Gets the value of notes.
     *
     * @return string
     */
    public function getNotes(): string
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
    protected function setNotes(string $notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Gets the value of createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * Gets the value of updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
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
    protected function setUpdatedAt()
    {
        $this->updatedAt = new \Datetime("now");

        return $this;
    }
}
