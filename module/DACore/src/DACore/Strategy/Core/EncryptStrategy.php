<?php
namespace DACore\Strategy;

use Zend\Crypt\Key\Derivation\Pbkdf2;
use Zend\Math\Rand;

trait EncryptStrategy
{
    public static function encryptPassword(string $password, string $salt): string
    {
        return base64_encode(Pbkdf2::calc('sha256', $password, $salt, 10000, strlen($password * 2)));
    }

    public static function encryptActivationKey(string $user, string $salt) : string
    {
    	return md5($user . $salt);
    }

    public static function encryptSalt($user)
    {
    	return base64_encode(Rand::getString(32, $user, true));
    }

}
