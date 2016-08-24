<?php
namespace DACore\Enum;

use DACore\Types\EnumType;

class MobileOperator extends EnumType
{
    protected $name = 'enum_mobileoperator';
    protected $values = array('vivo', 'oi', 'tim', 'claro', 'nextel', 'outra');
}

