<?php
namespace DAUser\Service;

use DACore\Auth\AbstractAuthService;

use Zend\Authentication\AuthenticationService,
    Zend\Authentication\Storage\Session as SessionStorage;

class Auth extends AbstractAuthService
{
	const SESSION_NAME = 'DAUser';

	protected function getSession() : SessionStorage
	{
		if (!$this->session)
			$this->session = new SessionStorage(SESSION_NAME);
		return $this->session;
	}

	protected function getAuthService() : AuthenticationService
	{
		if (!$this->authService)
			$this->authService = new AuthenticationService();
		return $this->authService;
	}
}