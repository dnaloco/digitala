<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class PromotionType extends EnumType
{
    protected $name = 'enum_promotiontype';
    protected $values = array('hour', 'week', 'month');

    public static function getValues()
    {
    	return array('hour', 'week', 'month');
    }
}

