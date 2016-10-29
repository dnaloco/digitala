<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class LocationStatus extends EnumType
{
    protected $name = 'enum_locationstatus';
    protected $values = array('cadastrado', 'liberado/ativo', 'cancalado');

    public static function getValues()
    {
    	return array('cadastrado', 'liberado/ativo', 'cancalado');
    }
}

