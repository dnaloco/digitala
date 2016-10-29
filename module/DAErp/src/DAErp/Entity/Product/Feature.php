<?php
namespace DAErp\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Product\FeatureInterface;
/**
 *
 * @ORM\Table(name="daerp_product_features")
 * @ORM\Entity
 */
class Feature implements FeatureInterface
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
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Erp\Product\GroupInterface")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     */
	private $group;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="value", type="decimal", precision=8, nullable=false)
	 */
	private $value;

	public function __construct(array $data = array()) {
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
     * Sets the value of id.
     *
     * @param integer $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of group.
     *
     * @return mixed
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Sets the value of group.
     *
     * @param mixed $group the group
     *
     * @return self
     */
    public function setGroup($group)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Gets the value of value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Sets the value of value.
     *
     * @param string $value the value
     *
     * @return self
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}