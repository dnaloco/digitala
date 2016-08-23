<?php
namespace DACore\Enum;

use DACore\Types\EnumType;

class GenderType extends EnumType
{
    protected $name = 'enum_gendertype';
    protected $values = array('masculino', 'feminino');
}
