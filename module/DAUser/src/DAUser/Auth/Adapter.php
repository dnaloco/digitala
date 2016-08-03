<?php
namespace DAUser\Auth;

class Adapter extends \DACore\Auth\AbstractAdapter
{
	use DAUser\Traits\TraitEncrypt;

	public function authenticate () : Result 
	{
		$repository = $this->em->getRepository("R2User\Entity\User");
		$user = $repository->findOneBy(array('user' => $this->getUsername()));

		if ($user) {
			if ($this->encryptPassword($this->getPassword(), $user->getSalt()) == $user->getPassword()) {
				return new Result(Result::SUCCESS, $user, array('success' => 'User authenticated!'));
			}

			return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, array('error' => 'Wrong password!'));
		}

		return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, array('error' => 'User not found!'));
	}
}