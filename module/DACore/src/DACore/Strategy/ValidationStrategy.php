<?php
namespace DACore\Strategy;

use Zend\Validator\EmailAddress;
Trait ValidationStrategy
{
	protected $errors = [];
	public function addError($error)
	{
		array_push($this->errors, $error);
	}

	public function getErrors()
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