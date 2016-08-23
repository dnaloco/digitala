<?php
namespace DABase\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @ORM\Table(name="dabase_peole")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Person implements PersonInterface, PhysicalCustomerInterface
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

    protected $addresses;

    protected $socialNetworks;

    protected $telephones;

    protected $emails;

    protected $documents;

    protected $website;

    protected $notes;

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

}
