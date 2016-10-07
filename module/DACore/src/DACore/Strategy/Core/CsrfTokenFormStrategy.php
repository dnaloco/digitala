<?php
namespace DACore\Strategy;

trait CsrfTokenFormStrategy
{
	public function getCsrfToken($tokenKey)
    {
    	return $this->cache->getItem($tokenKey);
    }

    public function hasCsrfToken($tokenKey)
    {
    	return $this->cache->hasItem($tokenKey);
    }

    public function removeCsrfToken($tokenKey)
    {
    	return $this->cache->removeItem($tokenKey);
    }

    public function checkCsrfToken($data)
    {
    	if (!isset($data['tokenName'])) {
			$message = 'This form is invalid. Missing csrf token!';
			$this->statusBadRequest($message);
			return false;
		}

		$tokenKey = $data['tokenName'];

		if (!$this->hasCsrfToken($tokenKey)) {
			$message = 'This form is invalid. The token already was used or was missed!';
			$this->statusBadRequest($message);
			return false;
		}

		if ($this->getCsrfToken($tokenKey) !== $data[$tokenKey] ) {
			$message = 'This form is invalid. Given token is invalid!';
			$this->statusBadRequest($message);
			return false;
		}

		return $tokenKey;
    }

}