<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class ReservationStatus extends EnumType
{
    protected $name = 'enum_reservationstatus';
    protected $values = array('cadastrado', 'liberado/ativo', 'cancelado');

    public static function getValues()
    {
    	return array('cadastrado', 'liberado/ativo', 'cancelado');
    }
}

