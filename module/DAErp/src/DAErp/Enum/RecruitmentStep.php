<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class RecruitmentStep extends EnumType
{
    protected $name = 'enum_recruitmentstep';
    protected $values = array('cadastrado', 'liberado', 'cancalado');

    public static function getValues()
    {
    	return array('cadastrado', 'liberado', 'cancalado');
    }
}

