<?php
namespace DACore\Strategy;

use Zend\Validator\{EmailAddress, StringLength, Regex, Uri};
use Zend\I18n\Validator\Alnum;

Trait ValidationStrategy
{
	public static function validateEmail($key, $email, $field)
	{
		$validator = new EmailAddress();
		if (!$validator->isValid($email)) {
			foreach($validator->getMessages() as $message) {
				self::addDataError($key, $message, null, $email);
			}
			return false;
		}
		return $email;
	}

	public static function validateName($key, $name, $field, array $options = array('allowWhiteSpace' => true))
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

	public static function validateNameWithDot($key, $name, $field)
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

	public static function validateMinMaxStringLength($key, $string, $field, $min = null, $max = null)
	{
		if (!is_null($min) && is_numeric($min) && !is_null($max) && is_numeric($max)) {
			$validator = new StringLength(array('min' => $min, 'max' => $max));
		} else if (!is_null($min) && is_numeric($min)) {
			$validator = new StringLength(array('min' => $min));
		} else if (!is_null($max) && is_numeric($max)) {
			$validator = new StringLength(array('max' => $min));
		} else {
			throw new \Exception('Must have [min]=3rd or/and [max]=4th argument(s).');
		}

		if (!$validator->isValid($string)) {
			foreach($validator->getMessages() as $message) {
				self::addValidationError($key, $message, $string);
			}
			return false;
		}

		return $string;
	}

	public static function validateEnum($key, $type, $value, $field)
	{
		if(!$type::hasValue($value)) {
			$message = 'Not permitted value for the type [' . $type . ']. Permitted values are [' . implode(",", $type::getValues()) . ']';
			self::addValidationError($key, $message, $value);
			return false;
		}

		return $value;
	}

	public static function validateDateBetween($key, $date, $field, $mindate, $maxdate, $format = 'Y-m-d H:i:s')
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

	public static function validateUri($key, $uri, $field) {
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
