<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class ExpenseType extends EnumType
{
    protected $name = 'enum_expensetype';
    protected $values = array('tipo1');

    public static function getValues()
    {
    	return array('tipo1');
    }
}

