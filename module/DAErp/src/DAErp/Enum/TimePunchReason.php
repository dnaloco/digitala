<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class TimePunchReason extends EnumType
{
    protected $name = 'enum_timepunchreason';
    protected $values = array('entrada', 'almoço', 'banheiro', 'reunião', 'saida');

    public static function getValues()
    {
    	return array('entrada', 'almoço', 'banheiro', 'reunião', 'saida');
    }
}

