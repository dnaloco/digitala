<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class OrderStatus extends EnumType
{
    protected $name = 'enum_ordertatus';
    protected $values = array('cadastrado', 'liberado/ativo', 'cancalado');

    public static function getValues()
    {
    	return array('cadastrado', 'liberado/ativo', 'cancalado');
    }
}

