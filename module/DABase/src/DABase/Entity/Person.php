<?php
namespace DABase\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
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
     * @ORM\Column(name="gender", type="enumgendertype", nullable=false)
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
     * @ORM\OneToOne(targetEntity="DABase\Entity\ImageInterface", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="photo_id", referencedColumnName="id")
     */
    protected $photo;

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
     * Sets the value of id.
     *
     * @param integer $id the id
     *
     * @return self
     */
    protected function setId($id)
    {
        $this->id = $id;

        return $this;
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
    protected function setName($name)
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
    protected function setGender(string $gender)
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
    protected function setBirthdate(\DateTime $birthdate)
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
    protected function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets the Foto da pessoa.
     *
     * @return \DABase\Entity\ImageInterface
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Sets the Foto da pessoa.
     *
     * @param \DABase\Entity\ImageInterface $photo the photo
     *
     * @return self
     */
    protected function setPhoto(\DABase\Entity\ImageInterface $photo)
    {
        $this->photo = $photo;

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
     * Sets the Quando a entidade foi criada.
     *
     * @param \DateTime $createdAt the created at
     *
     * @return self
     */
    protected function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
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
     */
    protected function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
