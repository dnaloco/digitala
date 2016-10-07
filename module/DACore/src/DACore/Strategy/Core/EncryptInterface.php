<?php
namespace DACore\Strategy;

interface EncryptInterface
{
	public static function encryptPassword(string $password, string $salt): string;
	public static function encryptActivationKey(string $user, string $salt) : string;
	public static function encryptSalt($user);
}