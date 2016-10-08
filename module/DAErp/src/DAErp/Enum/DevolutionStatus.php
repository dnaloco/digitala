<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class DevolutionStatus extends EnumType
{
    protected $name = 'enum_devolutionstatus';
    protected $values = array('cadastrado', 'liberado/ativo', 'cancalado');

    public static function getValues()
    {
    	return array('cadastrado', 'liberado/ativo', 'cancalado');
    }
}

