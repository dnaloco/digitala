<?php
namespace DABase\Enum;

use DACore\Types\EnumType;

class DocumentType extends EnumType
{
    protected $name = 'enum_documenttype';
    protected $values = array('rg', 'cpf', 'cnpj', 'passport', 'image collection', 'file collection');

    public static function getValues()
    {
    	return array('rg', 'cpf', 'cnpj', 'passport', 'image collection', 'file collection');
    }
}

