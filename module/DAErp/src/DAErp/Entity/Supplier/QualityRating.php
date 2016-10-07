<?php
namespace DAErp\Entity\Supplier;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\Entity\Erp\Supplier\QualityRatingInterface;
/**
 *
 * @ORM\Table(name="daerp_supplier_quality_ratings")
 * @ORM\Entity
 */
class QualityRating implements QualityRatingInterface
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
	 * @ORM\Column(name="rating", type="integer", nullable=false)
	 */
	private $rating;

	/**
     * @ORM\ManyToMany(targetEntity="DACore\Entity\Erp\Order\Store\OrderInterface")
     * @ORM\JoinTable(name="daerp_supplier_quality_ratings_orders",
     *      joinColumns={@ORM\JoinColumn(name="quality_rating_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="order_id", referencedColumnName="id", unique=true)}
     *      )
     */
	private $order;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="notes", type="text", nullable=true)
	 */
	private $notes;

	public function __construct(array $data = array()) {
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

}