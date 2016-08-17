<?php
namespace DACore\Strategy;

use Zend\Crypt\Key\Derivation\Pbkdf2;

trait EncryptStrategies
{
    public static function encryptPassword(string $password, string $salt): string
    {
        return base64_encode(Pbkdf2::calc('sha256', $password, $salt, 10000, strlen($password * 2)));
    }

    public static function encryptSalt(string $salt) : string
    {
    	
    }

}
