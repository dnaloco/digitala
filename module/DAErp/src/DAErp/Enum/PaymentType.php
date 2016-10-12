<?php
namespace DAErp\Enum;

use DACore\Types\EnumType;

class PaymentType extends EnumType
{
    protected $name = 'enum_paymenttype';
    protected $values = array(
    	'venda',
    	'compra',
    	'despesa',
    	'salario',
    	'benefício',
    	'comissao');

    public static function getValues()
    {
    	return array('venda', 'compra', 'despesa', 'salario', 'benefício', 'comissao');
    }
}

