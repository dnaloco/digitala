<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class DiscrepancyType extends EnumType
{
    protected $name = 'enum_discrepancytype';
    protected $values = array('stole', 'broken');

    public static function getValues()
    {
    	return array('stole', 'broken');
    }
}

