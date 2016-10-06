<?php
namespace DACore\Auth;

use Lcobucci\JWT\Parser;
use Lcobucci\JWT\ValidationData;

use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole as Role;
use Zend\Permissions\Acl\Resource\GenericResource as Resource;

use DACore\Strategy\{SerializerInterface, SerializerStrategy};

class JwtTokenDispatcherAuthentication implements SerializerInterface
{
	use SerializerStrategy;

	public function __construct(\Doctrine\ORM\EntityManager $em, $cache, $acl)
	{
		$this->em = $em;

		$dotenv = new \Dotenv\Dotenv(getcwd() . '/config');
        $dotenv->load();

        $this->cache = $cache;

        $this->acl = $acl;
	}

	public function checkUser($id)
    {
    	$userRepo = $this->em->getRepository('\DAUser\Entity\User');
        $user = $userRepo->find((int) $id);
        $userArray = json_decode(static::getPropertyNamingSerializer()->serialize($user, 'json'), true);
    	return $userArray;
        //if ($user) return $user;
    }

    public function getRole($role_id)
    {
    	$roleRepo = $this->em->getRepository('\DAAcl\Entity\Role');
    }

	// TODO: implement this method...
    // THE TRICK PART: Se o usuário tentar acessar está api sem ser pelo subdominio 'api', ele dará token inválido :)
	public function checkCrudToken()
	{

        //if (!isset($this->aclResource)) return $this->status
        if (!isset($this->token)) return $this->controller->statusBadRequest($this->badRequestError ?? 'SERVER ERROR!!! First, you need to execute "checkAuthorization" method.');

        if (!isset($_SERVER['HTTP_ORIGIN'])) {
            return $this->controller->statusBadRequest('Preciso saber qual a origem desta requisição.');
        }

        if (!in_array($_SERVER['HTTP_ORIGIN'], explode(';', getenv('API_AUDIENCES')))) {
            return $this->controller->statusBadRequest('Origem inválida.');
        }
       
        $parsedToken = (new Parser())->parse($this->token);

        $parsed_jti = $parsedToken->getHeader('jti');
        $parsed_ip = $parsedToken->getClaim('ip');
        $parsed_access = $parsedToken->getClaim('access');

        $token = new ValidationData();
        $token->setIssuer($_SERVER['HTTP_HOST']);
        $token->setAudience(getenv('API_AUDIENCES'));
        $token->setId($parsed_jti);
        /*var_dump($_SERVER['HTTP_HOST']);
        var_dump( $parsedToken->getClaim('iss'));
        var_dump($parsed_jti);
        die;*/

        /*var_dump(getenv('API_AUDIENCES'));
        var_dump($parsedToken->getClaim('aud'));
        die;*/

        //var_dump($_SERVER['HTTP_HOST']);die;
        //$parsedToken->validate($token)
        
        if ($parsedToken->validate($token)) {
            
            if ($data_access = $parsedToken->getClaim('access')) {

                if ($this->access === 'private' && $data_access === 'private') {

                    // TODO: lógica de api privada...
                    $parsed_uid = $parsedToken->getClaim('uid');
                    $user = $this->checkUser($parsed_uid);

                    $resourceAcl = $this->controller->getResource();

                    if (!$user) return $this->controller->statusBadRequest('Code: 234 from TokenService. Contact the administrator of this api -> "arthur_scosta@yahoo.com.br" or "dnaloco@gmail.com" for more information.');

                    if(!$user['active']) {
                        return $this->controller->statusForbidden('Code: 111 from TokenService (Usuário inativo). Contact the administrator of this api -> "arthur_scosta@yahoo.com.br" or "dnaloco@gmail.com" for more information.');
                    }

                    $hasAccess = false;

                    foreach($user['roles'] as $role) {
                        $hasAccess =  $this->acl->isAllowed($role['name'], $resourceAcl, $this->privilege);

                        if ($hasAccess) break;
                    }

                    if (!$hasAccess) {
                        $this->controller->statusForbidden('You don\'t have privilege to access this resource!');
                    }

                    if ($parsed_ip == $_SERVER['REMOTE_ADDR']) {
                        // SET USER CACHE
                        return;
                    }

                    return $this->controller->statusBadRequest('Code: 987 from TokenService. Contact the administrator of this api -> "arthur_scosta@yahoo.com.br" or "dnaloco@gmail.com" for more information.');
                }
                if ($data_access == 'public') {



                    if ($this->access === 'private') {
                        return $this->controller->statusForbidden('Esta ação requer acesso privado! Faça o seu login, para ter acesso!');
                    }
                    if ($parsed_ip == $_SERVER['REMOTE_ADDR']) {
                        return;
                    }
                    return $this->controller->statusBadRequest('Code: 123 from TokenService. Contact the administrator of this api -> "arthur_scosta@yahoo.com.br" or "dnaloco@gmail.com" for more information.');

                }
                return $this->controller->statusBadRequest('Code: 567 from TokenService. Contact the administrator of this api -> "arthur_scosta@yahoo.com.br" or "dnaloco@gmail.com" for more information.');
            }
            return $this->controller->statusBadRequest('Code: 567 from TokenService. Contact the administrator of this api -> "arthur_scosta@yahoo.com.br" or "dnaloco@gmail.com" for more information.');
        }

        return $this->controller->statusBadRequest('TOKEN INVÁLIDO');

	}

	public function checkAuthorization($headers, $method)
    {

        $this->badRequestError = null;
        if ($headers->has('Authorization')) {
            $auhtorization = $headers->get('Authorization');

            $splitAuth = explode(' ', $auhtorization->getFieldValue());

            if (isset($splitAuth[1])) {
                $schema = $splitAuth[0];

                if ($schema == 'Bearer') {
                	$rules = $this->controller->getRules();
                    $this->token = $splitAuth[1];
                    $this->access = $rules[$method]['access'];
                    $this->role = $rules[$method]['role'];
                    $this->privilege = $rules[$method]['privilege'];
                } else {
                    $this->badRequestError = 'Invalid schema. Only Bearer supported. Read about JWT token.';
                }
            } else {
                $this->badRequestError = 'Invalid token format. Maybe you forgot the schema of the given token.';
            }
        } else {
            $this->controller->statusNotAuthorized('Header has no authorization');
        }
        return $this;
    }

	public function onDispatch(\Zend\Mvc\MvcEvent $e)
	{

		$this->controller = $e->getTarget();


		if ( !($this->controller instanceof JwtTokenInterface)) {

			return;
		}

		$matches =  $e->getRouteMatch();
        $response = $e->getResponse();
        $request =  $e->getRequest();
		$method =   $request->getMethod();

		$headers = $request->getHeaders();

		if ($this->controller instanceof \DACore\Controller\AbstractCrudRestController) {

			$authResponse = $this->checkAuthorization($headers, $method)->checkCrudToken();
		}

		//TODO: IMPLEMENT CHECKTOKEN FOR CONTROLLER THAT IS NOT A INSTANCE OF AbstractCrudRestController...
	}
}