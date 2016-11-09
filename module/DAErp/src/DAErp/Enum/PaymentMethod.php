<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class PaymentMethod extends EnumType
{
    protected $name = 'enum_paymentmethod';
    protected $values = array('crédito', 'débito', 'dinheiro');

    public static function getValues()
    {
    	return array('crédito', 'débito', 'dinheiro');
    }
}

