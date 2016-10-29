<?php
namespace DABase\Enum;

use DACore\Types\EnumType;

class FileType extends EnumType
{
    protected $name = 'enum_filetype';
    protected $values = array('doc', 'docx', 'pdf');

    public static function getValues()
    {
    	return array('doc', 'docx', 'pdf');
    }
}

