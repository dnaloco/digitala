<?php
namespace R2Erp\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 *
 * @ORM\Table(name="r2_erp_mix_products")
 * @ORM\Entity
 */
class MixProduct {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
     * @ManyToMany(targetEntity="Phonenumber")
     * @JoinTable(name="users_phonenumbers",
     *      joinColumns={@JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="phonenumber_id", referencedColumnName="id", unique=true)}
     *      )
     */
	private $products;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="discount", type="decimal", precision=2, nullable=false)
	 */
	private $discount;

	/**
	 * @var Booleam
	 *
	 * @ORM\Column(name="is_highlighted", type="boolean", nullable=true)
	 */
	private $isHighlighted;

	/**
	 * @var Booleam
	 *
	 * @ORM\Column(name="is_Launch", type="boolean", nullable=true)
	 */
	private $isLaunch;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="created_at", type="datetime", nullable=false)
	 */
	private $createdAt;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="updated_at", type="datetime", nullable=false)
	 */
	private $updatedAt;

	public function __construct(array $options = array()) {
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}

}