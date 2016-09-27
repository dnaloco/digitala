<?php
namespace DACore\Enum;

use DACore\Types\EnumType;

class SupplierStatus extends EnumType
{
    protected $name = 'enum_addresstype';
    protected $values = array('cadastrado', 'liberado/ativo', 'cancalado');

    public static function getValues()
    {
    	return array('cadastrado', 'liberado/ativo', 'cancalado');
    }
}

