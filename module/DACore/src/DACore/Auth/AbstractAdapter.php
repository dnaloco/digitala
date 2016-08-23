<?php
namespace DACore\Auth;

use Doctrine\ORM\EntityManager;
use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;

abstract class AbstractAdapter implements AdapterInterface {
	protected $em;
	protected $userRepository;
	protected $username;
	protected $password;
	protected $roles;

	public function __construct(EntityManager $em, $userRepository) {
		$this->em = $em;
		$this->userRepository = $userRepository;
	}
	
	public function getUsername()  : string {
		return $this->username;
	}

	public function setUsername(string $username) {
		$this->username = $username;
	}

	public function getPassword() : string {
		return $this->password;
	}

	public function setPassword(string $password)
	{
		$this->password = $password;
	}

	public function getRoles(){
		return $this->roles;
	}

	public function setRoles($roles) {
		$this->roles = $roles;
	}

	abstract public function authenticate() : Result;
}
