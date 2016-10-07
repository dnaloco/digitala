<?php
namespace DABase\Entity;

use DACore\IEntities\Base\DocumentInterface;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Documento
 *
 * @ORM\Table(name="dabase_documents")
 * @ORM\Entity
 *
 * @ORM\HasLifecycleCallbacks
 */
class Document implements DocumentInterface
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
     * @ORM\Column(name="type", type="enum_documenttype", nullable=true)
     */
    protected $type;

	/**
     *
     * @ORM\Column(name="field_1", type="string", nullable=false)
     */
	protected $field1;

	/**
     *
     * @ORM\Column(name="field_2", type="string", nullable=true)
     */
	protected $field2;

	/**
     *
     * @ORM\Column(name="field_3", type="string", nullable=true)
     */
	protected $field3;

	/**
     *
     * @ORM\Column(name="field_4", type="string", nullable=true)
     */
	protected $field4;

	/**
     *
     * @ORM\Column(name="field_5", type="string", nullable=true)
     */
	protected $field5;

	/**
     *
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\ImageInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_document_images",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="image_id", referencedColumnName="id")}
     *      )
     **/
	protected $images;

     /**
     * @ORM\ManyToMany(targetEntity="DACore\IEntities\Base\FileInterface", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="dabase_document_files",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="file_id", referencedColumnName="id")}
     *      )
     **/
     protected $files;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Base\CompanyInterface", inversedBy="documents")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
	protected $company;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Base\PersonInterface", inversedBy="documents")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
	protected $person;

     /**
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
     protected $createdAt;

     /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
     protected $updatedAt;

	public function __construct(array $data)
	{
          $this->createdAt = new \DateTime("now");
          $this->updatedAt = new \DateTime("now");

          $this->images = new ArrayCollection();
          $this->files = new ArrayCollection();

          (new Hydrator\ClassMethods)->hydrate($data, $this);
	}

}