<?php
namespace DACore\Auth;

use Zend\Authentication\AuthenticationService,
    Zend\Authentication\Storage\Session as SessionStorage;

abstract class AbstractAuthSessionService implements AuthServiceInterface
{
	protected $authService;
	protected $adapter;
	protected $session;

	public function __construct($adapter)
	{
		$this->adapter = $adapter;
	}

	abstract protected function getAuthService() : AuthenticationService;

	abstract protected function getSession() : SessionStorage;

	public function isLogged() : array
	{
		$sessionStorage = $this->getSession();
		$authService = $this->getAuthService();

		$authService->setStorage($sessionStorage);

		if ($authService->hasIdentity()) {
			$user = $authService->getIdentity();

			if ($user->getActive()) {
				return array('data' => $user, 'success' => true);
			}
			return array('data' => $user, 'success' => false, 'error' => 'The user is inactive. Please contact the administrador');
		}

		return array('data' => array(), 'success' => false, 'error' => 'There is no logged user!');
	}

	public function login($user, $pass) : array()
	{
		$sessionStorage = $this->getSession();
		$authService = $this->getAuthService();
		$authAdapter = $this->authAdapter;

		$authAdapter->setUsername($user);
		$authAdapter->setPassword($pass);

		$result = $auth->authenticate($authAdapter);

		if ($result->isValid()) {
			$user = $auth->getIdentity();

			if ($user->getActive()) {
				$sessionStorage->write($user, null);

				return array('data' => $user, 'success' => true)
			}

			return array('data' => $user, 'success' => false, 'error' => 'The user is inactive. Please contact the administrador');
		}

		return array('data' => $user, 'success' => false, 'error' => 'Wrong password or user');
	}

	public function logout() : boolean
	{
		$sessionStorage = $this->getSession();
		$authService = $this->getAuthService();
		$authService->setStorage($sessionStorage);
		$authService->clearIdentity();

		return true;
	}
}