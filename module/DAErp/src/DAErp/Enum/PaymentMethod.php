<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class PaymentMethod extends EnumType
{
    protected $name = 'enum_paymentmethod';
    protected $values = array('debit', 'credit', 'money');

    public static function getValues()
    {
    	return array('debit', 'credit', 'money');
    }
}

