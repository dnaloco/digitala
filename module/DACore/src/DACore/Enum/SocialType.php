<?php
namespace DACore\Enum;

use DACore\Types\EnumType;

class SocialType extends EnumType
{
    protected $name = 'enum_socialtype';
    protected $values = array('facebook', 'twitter', 'google', 'instagram', 'pinterest');
}
