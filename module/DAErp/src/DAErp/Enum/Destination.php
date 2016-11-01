<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class Destination extends EnumType
{
    protected $name = 'enum_destination';
    protected $values = array('production', 'ecommerce', 'market', 'replacement', 'consumption');

    public static function getValues()
    {
    	return array('hour', 'week', 'month');
    }
}

