<?php
namespace DACore\Enum;

use DACore\Types\EnumType;

class Addresstype extends EnumType
{
    protected $name = 'enum_addresstype';
    protected $values = array('residential', 'comercial', 'delivery', 'billing', 'work');
}

