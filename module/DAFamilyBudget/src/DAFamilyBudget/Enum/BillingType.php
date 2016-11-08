<?php
namespace DAFamilyBudget\Enum;

use DACore\Types\EnumType;

class BillingType extends EnumType
{
    protected $name = 'enum_billingtype';
    protected $values = array('expense', 'income');

    public static function getValues()
    {
    	return array('expense', 'income');
    }
}

