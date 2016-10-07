<?php
namespace DAErp\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Product\CategoryInterface;
/**
 *
 * @ORM\Table(name="daerp_product_categories")
 * @ORM\Entity
 */
class Category implements CategoryInterface
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
	 * @ORM\Column(name="name", type="string", length=30, nullable=false)
	 */
	private $name;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="seo_description", type="string", length=255, nullable=true)
	 */
	private $seoDescription;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="is_disabled", type="boolean", nullable=true)
	 */
	private $isDisabled;

	public function __construct(array $data = array()) {
        $this->isDisabled = false;
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

}