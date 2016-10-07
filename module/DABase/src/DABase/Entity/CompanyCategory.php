<?php 
namespace DABase\Entity;

use DACore\IEntities\Base\CompanyCategoryInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Categoria de empresa
 *
 * @ORM\Table(name="dabase_company_categories")
 * @ORM\Entity
 */
class CompanyCategory implements CompanyCategoryInterface
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
     * @ORM\Column(name="name", type="string", length=100, nullable=false, unique=true)
     */
	protected $name;

	/**
     * @ORM\OneToMany(targetEntity="DACore\IEntities\Base\CompanyCategoryInterface", mappedBy="parent")
     */
    private $children;

	/**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Base\CompanyCategoryInterface", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
	protected $parent;

	public function __construct(array $data)
	{
		$this->children = new \Doctrine\Common\Collections\ArrayCollection();

		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

}