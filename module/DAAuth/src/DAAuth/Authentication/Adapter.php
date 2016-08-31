<?php
namespace DAUser\Auth;

use Zend\Authentication\Result;

class Adapter extends \DACore\Auth\AbstractAdapter
{
	use DACore\Strategies\EncryptStrategies;

	public function authenticate () : Result 
	{
		$repository = $this->em->getRepository($this->userRepository);
		$user = $repository->findOneBy(array('user' => $this->getUsername()));

		if ($user) {
			if (static::encryptPassword($this->getPassword(), $user->getSalt()) == $user->getPassword()) {
				return new Result(Result::SUCCESS, $user, array('success' => 'User authenticated!'));
			}

			return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, array('error' => 'Wrong password!'));
		}

		return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, array('error' => 'User not found!'));
	}
}