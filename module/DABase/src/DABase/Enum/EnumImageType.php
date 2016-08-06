<?php
namespace DABase\Enum;

class EnumImageType extends \DABase\Types\EnumType
{
    protected $name = 'enumimagetype';
    protected $values = array('jpg', 'jpeg', 'gif', 'png', 'svg');
}
