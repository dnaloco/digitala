<?php
namespace DACore\Enum;

use DACore\Types\EnumType;

class TestType extends EnumType
{
    protected $name = 'enum_testtype';
    protected $values = array('classe_a', 'classe_b', 'classe_c');
}

