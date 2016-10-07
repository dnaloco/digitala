<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class SupplierStatus extends EnumType
{
    protected $name = 'enum_supplierstatus';
    protected $values = array('cadastrado', 'liberado/ativo', 'cancelado');

    public static function getValues()
    {
    	return array('cadastrado', 'liberado/ativo', 'cancelado');
    }
}

