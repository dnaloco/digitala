<?php
namespace DAErp\Entity\HumanResource\Support;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\HumanResource\Support\TrainingInterface;

/**
 *
 * @ORM\Table(name="daerp_human_resource_support_trainings")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Training implements TrainingInterface
{
	/**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
	private $id;

    private $reference;

    private $title;

    private $duration;

    private $minimunParticipant;

    private $category;

    private $targetAudience;

    private $methodology;

    private $relatedProduct;

    private $requiredDocuments;

    private $requiredEquipment;

    private $goals;

    private $prerequisites;

	public function __construct(array $data = array())
    {
        (new Hydrator\ClassMethods)->hydrate($data, $this);
    }

}
