<?php
namespace DABase\Enum;

class EnumSocialType extends \DABase\Types\EnumType
{
    protected $name = 'enumsocialtype';
    protected $values = array('facebook', 'twitter', 'google', 'instagram', 'pinterest');
}
