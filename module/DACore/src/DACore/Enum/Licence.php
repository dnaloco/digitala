<?php
namespace DACore\Enum;

use DACore\Types\EnumType;

class Licence extends EnumType
{
    protected $name = 'enum_licence';
    protected $values = array('gpl', 'livre', 'mit');
}
