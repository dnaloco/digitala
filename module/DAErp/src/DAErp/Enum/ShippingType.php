<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class ShippingType extends EnumType
{
    protected $name = 'enum_shippingtype';
    protected $values = array('pago destinatário', 'pago remetente', 'tipo3');

    public static function getValues()
    {
    	return array('pago destinatário', 'pago remetente', 'tipo3');
    }
}

