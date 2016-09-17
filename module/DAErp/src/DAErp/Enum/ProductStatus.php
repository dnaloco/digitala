<?php
namespace DACore\Enum;

use DACore\Types\EnumType;

class ProductStatus extends EnumType
{
    protected $name = 'enum_addresstype';
    protected $values = array('cadastrado', 'liberado', 'cancalado');

    public static function getValues()
    {
    	return array('residential', 'comercial', 'delivery', 'billing', 'work');
    }
}

