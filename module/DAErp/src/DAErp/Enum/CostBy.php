<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class CostBy extends EnumType
{
    protected $name = 'enum_costby';
    protected $values = array('hour', 'week', 'month');

    public static function getValues()
    {
    	return array('hour', 'week', 'month');
    }
}

