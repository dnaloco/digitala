<?php
namespace DACore\Strategy\Collections;

use Doctrine\Common\Collections\ArrayCollection;

trait EmailsStrategy
{
	public function getEmail($key, $email, $repoEmail)
	{
		// email anwserable not required.
		if (isset($email['anwserable'])) {
			$email['anwserable'] = static::checkNameWithSpecials($key, $email['anwserable'], 'anwserable');
			if (!$email['anwserable']) return false;

		}
		// email address REQUIRED!
		if (!isset($email['address'])) {
			static::addDataError($key, static::ERROR_UNIQUE_FIELD, 'email');
		} else {
			$email['address'] = static::checkEmail($key, $email['address']);

			if (!$email['address']) {
				return false;
			} else {
				$email['address'] = static::checkUnique($key, $email['address'], 'address', $repoEmail);

				if (!$email['address']) return false;
			}
		}

		if (static::hasErrors()) return false;

		return new \DABase\Entity\Email($email);
	}

	public function getEmailsCollection($key, $emails, $repoEmail)
	{
		$myTraits = class_uses($this);

		if (!in_array('DACore\Strategy\DataCheckerStrategy', $myTraits)) {
			throw new \Exception('TO USE EmailsStrategy TRAIT NEED TO HAVE DACore\Strategy\DataCheckerStrategy');
		}

		$arrEmails = new ArrayCollection();
		$key = $key . '_emails';
		foreach($emails as $email) {
			$email = $this->getEmail($key, $email, $repoEmail);

			if ($email) $arrEmails->add($email);
		}

		return $arrEmails;
	}
}