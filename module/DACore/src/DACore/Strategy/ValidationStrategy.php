<?php
namespace DACore\Strategy;

use Zend\Validator\EmailAddress;
Trait ValidationStrategy
{
	protected $errors = [];

	private function addValidationError($error)
	{
		array_push($this->errors, $error);
	}

	public static function getValidationErrors()
	{
		return $this->errors;
	}

	public static function isValidEmail($email)
	{
		$validator = new EmailAddress();
		if (!$validator->isValid($email)) {
			foreach($validator->getMessages() as $message) {
				$this->addError($message);
			}
			return false;
		}
		return $email;
	}
}