<?php
namespace DACore\Auth;

interface AuthServiceInterface
{
	function getAuthService() : AuthenticationService;
	function isLogged() : array;
	function login($user, $pass) : array;
	function logout() : boolean;
}