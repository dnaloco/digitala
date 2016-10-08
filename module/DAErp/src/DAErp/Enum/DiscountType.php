<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class DiscountType extends EnumType
{
    protected $name = 'enum_discounttype';
    protected $values = array('subtammount', 'percentage');

    public static function getValues()
    {
    	return array('subtammount', 'percentage');
    }
}

