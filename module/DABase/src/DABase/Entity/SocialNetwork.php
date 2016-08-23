<?php
namespace DABase\Entity;

use DACore\Entity\Base\SocialNetworkInterface;

class SocialNetwork implements SocialNetworkInterface
{
    protected $id;
    protected $type;
    protected $address;

    public function __construct(array $data)
    {
    	
    }
}
