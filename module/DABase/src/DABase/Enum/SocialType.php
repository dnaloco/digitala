<?php
namespace DABase\Enum;

use DACore\Types\EnumType;

class SocialType extends EnumType
{
    protected $name = 'enum_socialtype';
    protected $values = array('facebook', 'twitter', 'google', 'instagram', 'pinterest');

    public static function getValues()
    {
    	return array('facebook', 'twitter', 'google', 'instagram', 'pinterest');
    }
}
