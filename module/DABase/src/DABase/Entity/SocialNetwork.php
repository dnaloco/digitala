<?php
namespace DABase\Entity;

use DACore\IEntities\Base\SocialNetworkInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Rede Social
 *
 * @ORM\Table(name="dabase_social_networks")
 * @ORM\Entity
 */
class SocialNetwork implements SocialNetworkInterface
{
	/**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     *
     * @ORM\Column(name="type", type="enum_socialtype", nullable=true)
     */
    protected $type;

    /**
     *
     * @ORM\Column(name="address", type="string", unique=true, nullable=false)
     */
    protected $address;

    public function __construct(array $data)
    {
    	(new Hydrator\ClassMethods)->hydrate($data, $this);
    }


}
