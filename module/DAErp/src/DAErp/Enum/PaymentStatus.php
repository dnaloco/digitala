<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class PaymentStatus extends EnumType
{
    protected $name = 'enum_paymentstatus';
    protected $values = array('cadastrado', 'liberado', 'cancalado');

    public static function getValues()
    {
    	return array('cadastrado', 'liberado', 'cancalado');
    }
}

