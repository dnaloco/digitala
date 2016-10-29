<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class StoreStatus extends EnumType
{
    protected $name = 'enum_storetatus';
    protected $values = array('cadastrado', 'liberado/ativo', 'cancalado');

    public static function getValues()
    {
    	return array('cadastrado', 'liberado/ativo', 'cancalado');
    }
}

