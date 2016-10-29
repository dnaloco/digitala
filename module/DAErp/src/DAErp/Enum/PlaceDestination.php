<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class PlaceDestination extends EnumType
{
    protected $name = 'enum_placedestination';
    protected $values = array('supply', 'ecommerce', 'market', 'reservation', 'devolution');

    public static function getValues()
    {
    	return array('supply', 'ecommerce', 'market', 'reservation', 'devolution');
    }
}

