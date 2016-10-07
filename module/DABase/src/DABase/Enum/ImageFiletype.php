<?php
namespace DABase\Enum;

use DACore\Types\EnumType;

class ImageFiletype extends EnumType
{
    protected $name = 'enum_imagefiletype';
    protected $values = array('jpg', 'jpeg', 'gif', 'png', 'svg');

    public static function getValues()
    {
    	return array('jpg', 'jpeg', 'gif', 'png', 'svg');
    }
}

