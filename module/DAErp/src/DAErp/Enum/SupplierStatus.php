<?php
namespace DACore\Enum;

use DACore\Types\EnumType;

class SupplierStatus extends EnumType
{
    protected $name = 'enum_addresstype';
    protected $values = array('cadastrado', 'cancalado');

    public static function getValues()
    {
    	return array('residential', 'comercial', 'delivery', 'billing', 'work');
    }
}

