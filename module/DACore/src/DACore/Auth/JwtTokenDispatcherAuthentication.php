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
	public function __construct(\Doctrine\ORM\EntityManager $em, $cache)
	{
		$this->em = $em;
		$dotenv = new \Dotenv\Dotenv(getcwd() . '/config');
        $dotenv->load();

        $this->cache = $cache;
	}

	public function checkUser($id)
    {
    	if (!$this->cache->hasItem('user_entity_' . $id)) {
    		$userRepo = $this->em->getRepository('\DAUser\Entity\User');
    		$user = $userRepo->find((int) $id);
    		$userArray = json_decode(static::getPropertyNamingSerializer()->serialize($user, 'json'), true);
    		$this->cache->setItem('user_entity_' . $id, $userArray);
    	}
    	return $this->cache->getItem('user_entity_' . $id);
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

        $parsedToken = (new Parser())->parse((string) $this->token);

        $parsed_jti = $parsedToken->getHeader('jti');
        $parsed_ip = $parsedToken->getClaim('ip');
        $parsed_access = $parsedToken->getClaim('access');

        $token = new ValidationData();
        $token->setIssuer($_SERVER['HTTP_HOST']);
        $token->setAudience(getenv('API_AUDIENCES'));
        $token->setId($parsed_jti);
        /*var_dump($_SERVER['HTTP_HOST']);
        var_dump($parsed_jti);
        die;*/
        if ($parsedToken->validate($token)) {
            if ($data_access = $parsedToken->getClaim('access')) {
                if ($this->access === 'private' && $data_access === 'private') {
                    // TODO: lógica de api privada...
                    $parsed_uid = $parsedToken->getClaim('uid');
                    $user = $this->checkUser($parsed_uid);
                    //$parsed_roles = $parsedToken->getClaim('roles');

                    if (!$user) return $this->controller->statusBadRequest('Code: 234 from TokenService. Contact the administrator of this api -> "arthur_scosta@yahoo.com.br" or "dnaloco@gmail.com" for more information.');


                   // var_dump('Parsed Roles');
                    //var_dump(json_decode($parsed_roles, true));
                    var_dump('Roles User');
                    var_dump($user['roles']);
                    die;

                    // TODO: Implementing ACL!!!!!

                    if ($parsed_role != $this->role) return $this->controller->statusBadRequest('Code: 345 from TokenService. Contact the administrator of this api -> "arthur_scosta@yahoo.com.br" or "dnaloco@gmail.com" for more information.');

                    $roles = $user->getRoles();
                    $hasRole = false;

                    foreach ($roles as $role) {
                        if ($role->getName() == $this->role) {
                            $hasRole = $role;
                            break;
                        }
                    }
                }
                if ($data_access == 'public') {
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
            $this->badRequestError = 'Header has no authorization';
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

		if ($this->controller instanceof \DACore\Crud\AbstractCrudRestController) {

			$authResponse = $this->checkAuthorization($headers, $method)->checkCrudToken();
		}

		//TODO: IMPLEMENT CHECKTOKEN FOR CONTROLLER THAT IS NOT A INSTANCE OF AbstractCrudRestController...
	}
}