<?php
namespace DAErp\Entity\HumanResource\Partner;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\HumanResource\Partner\CopartnerInterface;
use DAErp\Entity\HumanResource\PartnerSuperclass;

/**
 *
 * @ORM\Table(name="daerp_human_resource_partner_copartners")
 * @ORM\Entity
 */
class Copartner extends PartnerSuperclass
implements CopartnerInterface
{
	public function __construct(array $data = array()) {
		parent::__construct($data);
	}
}