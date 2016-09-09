<?php
namespace DACore\Strategy;

trait CheckTokenStrategy
{
	protected $hasToken = true;

	// TODO: implement this method...
	public function checkToken($token)
	{
		// logica para checar token...

		/*$authStr = $this->getRequest()->getHeader('authorization')->getFieldValue();
        $tokenParts = explode(' ', $authStr);
        $token = (new Parser())->parse((string) $tokenParts[1]);

        var_dump($token);die;*/
        /*$authStr = $this->getRequest()->getHeader('authorization')->getFieldValue();
        $tokenParts = explode(' ', $authStr);
        $token = (new Parser())->parse((string) $tokenParts[1]);
        $isValidToken = $this->validateToken($token);*/
        return true;
	}
}