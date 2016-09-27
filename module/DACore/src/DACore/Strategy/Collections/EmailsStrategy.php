<?php
namespace DACore\Strategy\Collections;

use Doctrine\Common\Collections\ArrayCollection;

trait EmailsStrategy
{
	public function getEmailsCollection($key, $emails, $repoEmail)
	{
		$arrEmails = new ArrayCollection();
		$key = $key . '_emails';
		foreach($emails as $email) {
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

			$arrEmails->add(new \DABase\Entity\Email($email));
		}

		return $arrEmails;
	}
}