<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class ShipperStatus extends EnumType
{
    protected $name = 'enum_shipperstatus';
    protected $values = array('cadastrado', 'liberado/ativo', 'cancelado');

    public static function getValues()
    {
    	return array('cadastrado', 'liberado/ativo', 'cancelado');
    }
}

