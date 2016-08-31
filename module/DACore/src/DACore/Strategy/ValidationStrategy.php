<?php
namespace DACore\Strategy;

use Zend\Validator\{EmailAddress, StringLength, Regex, Uri};
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

	public static function hasValidationErrors()
	{
		return !empty(self::$validationErrors);
	}

	public static function resetValidationErrors()
	{
		self::$validationErrors = [];
	}

	public static function getValidationErrors()
	{
		return self::$validationErrors;
	}

	public static function validateEmail($key, $email)
	{
		$validator = new EmailAddress();
		if (!$validator->isValid($email)) {
			foreach($validator->getMessages() as $message) {
				self::addValidationError($key, $message, $email);
			}
			return false;
		}
		return $email;
	}

	public static function validateName($key, $name, array $options = array('allowWhiteSpace' => true))
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

	public static function validateNameWithDot($key, $name)
	{
		$accentedCharacters = "àèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ";
		$validator = new Regex(array('pattern' => '/^(([' . $accentedCharacters . 'A-Za-z.\\(\\)\s])+)$/'));

		if (!$validator->isValid($name)) {
			foreach($validator->getMessages() as $message) {
				self::addValidationError($key, $message, $name);
			}
			return false;
		}
		return $name;
	}

	public static function validateMinMaxStringLength($key, $string, $min, $max)
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

	public static function validateEnum($key, $type, $value)
	{
		if(!$type::hasValue($value)) {
			$message = 'Not permitted value for the type [' . $type . ']. Permitted values are [' . implode(",", $type::getValues()) . ']';
			self::addValidationError($key, $message, $value);
			return false;
		}

		return $value;
	}

	public static function validateDateBetween($key, $date, $mindate, $maxdate, $format = 'Y-m-d H:i:s')
	{
	    if ($date instanceof \DateTimeInterface) {
	    	if ($date < $mindate) {
	    		self::addValidationError($key, 'Invalid date. Date cannot be lesser than ' . $mindate->format($format) .'.', $date->format($format));
	    		return false;
	    	} else if ($date > $maxdate) {
	    		self::addValidationError($key, 'Invalid date. Date cannot be greater than ' . $maxdate->format($format) .'.', $date->format($format));
	    		return false;
	    	}
	    } else {
	    	self::addValidationError($key, 'Date is not a instance of DateTimeInterface', $date);
	    	return false;
	    }

	    return $date;
	}

	public static function validateUri($key, $uri) {
		$validator = new Uri();

		if (!$validator->isValid($uri)) {
			foreach($validator->getMessages() as $message) {
				self::addValidationError($key, $message, $uri);
			}
			return false;
		}
		return $uri;
	}
}
