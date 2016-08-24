<?php
namespace DACore\Enum;

use DACore\Types\EnumType;

class TelephoneType extends EnumType
{
    protected $name = 'enum_telephonetype';
    protected $values = array('fax', 'residential', 'comercial', 'mobile');
}

