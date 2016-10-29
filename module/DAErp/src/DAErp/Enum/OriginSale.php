<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class OriginSale extends EnumType
{
    protected $name = 'enum_originsale';
    protected $values = array('ecommerce', 'shop', 'erp', 'crm');

    public static function getValues()
    {
    	return array('ecommerce', 'shop', 'erp', 'crm');
    }
}

