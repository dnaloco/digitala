<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class UnitType extends EnumType
{
    protected $name = 'enum_unittype';
    protected $values = array('unidade', 'pacote', 'peso', 'volume', 'área', 'tempo');

    public static function getValues()
    {
    	return array('unidade', 'pacote', 'peso', 'volume', 'área', 'tempo');
    }
}

