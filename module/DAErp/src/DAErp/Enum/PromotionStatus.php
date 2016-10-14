<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class PromotionStatus extends EnumType
{
    protected $name = 'enum_promotionstatus';
    protected $values = array('hour', 'week', 'month');

    public static function getValues()
    {
    	return array('hour', 'week', 'month');
    }
}

