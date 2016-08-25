<?php
namespace DACore\Strategy;

use Zend\Validator\{EmailAddress, StringLength};
use Zend\I18n\Validator\Alnum;

Trait ValidationStrategy
{
	private static $validationErrors = [];

	private static function addValidationError($key, $error, $field)
	{
		if (!isset(self::$validationErrors[$key])) {
			self::$validationErrors[$key] = [];
		}
		array_push(self::$validationErrors[$key], $error, array('value' => $field));
	}

	public static function resetValidationErrors()
	{
		self::$validationErrors = [];
	}

	public static function getValidationErrors()
	{
		return self::$validationErrors;
	}

	public function validateEmail($key, $email, array $options = array())
	{
		$validator = new EmailAddress($options);
		if (!$validator->isValid($email)) {
			foreach($validator->getMessages() as $message) {
				self::addValidationError($key, $message, $email);
			}
			return false;
		}
		return $email;
	}

	public function validateName($key, $name, array $options = array())
	{
		$validator = new Alnum($options);

		if (!$validator->isValid($name)) {
			foreach($validator->getMessages() as $message) {
				self::addValidationError($key, $message, $name);
			}
			return false;
		}
		return $name;
	}

	public function validateMinMaxStringLength($key, $string, $min, $max)
	{
		$validator = new StringLength(array('min' => $min, 'max' => $max));

		if (!$validator->isValid($string)) {
			foreach($validator->getMessages() as $message) {
				self::addValidationError($key, $message, $string);
			}
			return false;
		}

		return $string;
	}
}