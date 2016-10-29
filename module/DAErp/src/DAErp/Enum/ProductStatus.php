<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class ProductStatus extends EnumType
{
    protected $name = 'enum_productstatus';
    protected $values = array('cadastrado', 'liberado', 'cancalado');

    public static function getValues()
    {
    	return array('cadastrado', 'liberado', 'cancalado');
    }
}

