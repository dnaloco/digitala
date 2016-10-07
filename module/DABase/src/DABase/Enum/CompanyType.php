<?php
namespace DABase\Enum;

use DACore\Types\EnumType;

class CompanyType extends EnumType
{
    protected $name = 'enum_companytype';
    protected $values = array('matrix', 'filial', 'manufacturer', 'supplier', 'shipper', 'customer', 'lead', 'contact');

    public static function getValues()
    {
    	return array('matrix', 'filial', 'manufacturer', 'supplier', 'shipper', 'customer', 'lead', 'contact');
    }
}

