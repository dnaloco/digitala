<?php
namespace DAUser\Traits;

use Zend\Crypt\Key\Derivation\Pbkdf2;
use Zend\Math\Rand;

trait TraitEncrypt
{
	public static function encryptPassword(string $password, string $salt) : string
	{
		return base64_encode(Pbkdf2::calc('sha256', $password, $salt, 10000, strlen($password * 2)));
	}

}