<?php
namespace DABase\Enum;

use DACore\Types\EnumType;

class AddressType extends EnumType
{
    protected $name = 'enum_addresstype';
    protected $values = array('residential', 'comercial', 'delivery', 'billing', 'work');

    public static function getValues()
    {
    	return array('residential', 'comercial', 'delivery', 'billing', 'work');
    }
}

