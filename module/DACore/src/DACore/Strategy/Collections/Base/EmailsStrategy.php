<?php
namespace DACore\Strategy\Collections\Base;

use Doctrine\Common\Collections\ArrayCollection;

trait EmailsStrategy
{
	private $checkUnique = true;

	public function getEmail($key, $email)
	{
		$repoEmail = $this->getAnotherRepository('DACore\IEntities\Base\EmailInterface');

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
				if ($this->checkUnique)
					$email['address'] = static::checkUnique($key, $email['address'], 'address', $repoEmail);

				if (!$email['address']) return false;
			}
		}

		if (static::hasErrors()) return false;

		return new \DABase\Entity\Email($email);
	}

	public function getEmailsCollection($key, $emails, $entity)
	{
		if (!($this instanceof \DACore\Service\AbstractCrudService))
			throw new \Exception('TO USE EmailsStrategy TRAIT NEED TO BE INSTANCE OF  DACore\Service\AbstractCrudService');

		$myTraits = class_uses($this);

		if (!in_array('DACore\Strategy\Core\DataCheckerStrategy', $myTraits)) {
			throw new \Exception('TO USE EmailsStrategy TRAIT NEED TO HAVE DACore\Strategy\Core\DataCheckerStrategy');
		}

		$arrEmails = new ArrayCollection();
		$key = $key . '_emails';

		if (!is_null($entity)) {
			$this->checkUnique = false;
			$emailsCollection = $entity->getEmails();

			foreach($emails as $email) {
				$email = $this->getEmail($key, $email);

				if (!$email) continue;

				if (is_null($email->getId())) {
					$emailsCollection->add($email);
				} else {
					$email = $this->em->merge($email);
				}
				$arrEmails->add($email);

			}

			foreach($emailsCollection as $email) {
				if (!$arrEmails->contains($email)) {
					$emailsCollection->removeElement($email);
					$this->em->remove($email);
				}
			}

			return $emailsCollection;

		}

		foreach($emails as $email) {
			$email = $this->getEmail($key, $email);

			if ($email) $arrEmails->add($email);
		}

		return $arrEmails;
	}
}