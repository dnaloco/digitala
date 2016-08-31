<?php
namespace DACore\Enum;

use DACore\Types\EnumType;

class Licence extends EnumType
{
    protected $name = 'enum_licence';
    protected $values = array(
    	'Public Domain',
    	'Attribution-NonCommercial-NoDerivs',
    	'Attribution-NonCommercial',
    	'Attribution-ShareAlike',
    	'Attribution-NonCommercial-ShareAlike',
    	'Attribution-NoDerivs',
    	'Attribution',
    	'Creative-Commons',
    	'Rights-managed',
    	'Royalty Free',
    	'GPL',
    	'LGPL',
    	'BSD',
    	'Apache Licence v2.0',
    	'Mozilla v1.1',
    	'MIT'
    	);

    public static function getValues()
    {
    	return array(
        'Public Domain',
        'Attribution-NonCommercial-NoDerivs',
        'Attribution-NonCommercial',
        'Attribution-ShareAlike',
        'Attribution-NonCommercial-ShareAlike',
        'Attribution-NoDerivs',
        'Attribution',
        'Creative-Commons',
        'Rights-managed',
        'Royalty Free',
        'GPL',
        'LGPL',
        'BSD',
        'Apache Licence v2.0',
        'Mozilla v1.1',
        'MIT'
        );
    }
}
