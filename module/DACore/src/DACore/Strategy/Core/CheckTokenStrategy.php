<?php
namespace DACore\Strategy\Core;

use Lcobucci\JWT\Parser;
use Lcobucci\JWT\ValidationData;

trait CheckTokenStrategy
{
        protected $aclRules = [
            self::ACL_RESOURCES['GET'] => [
                self::ACL_RULES['ACCESS'] => self::ACL_ACCESSES['PRIVATE'],
                self::ACL_RULES['ROLE'] => self::ACL_ROLES['ADMIN'],
                self::ACL_RULES['PRIVILEGE'] => self::ACL_PRIVILEGES['SEE']
            ],
            self::ACL_RESOURCES['POST'] => [
                self::ACL_RULES['ACCESS'] => self::ACL_ACCESSES['PRIVATE'],
                self::ACL_RULES['ROLE'] => self::ACL_ROLES['ADMIN'],
                self::ACL_RULES['PRIVILEGE'] => self::ACL_PRIVILEGES['CREATE']
            ],
            self::ACL_RESOURCES['UPDATE'] => [
                self::ACL_RULES['ACCESS'] => self::ACL_ACCESSES['PRIVATE'],
                self::ACL_RULES['ROLE'] => self::ACL_ROLES['ADMIN'],
                self::ACL_RULES['PRIVILEGE'] => self::ACL_PRIVILEGES['EDIT']
            ],
            self::ACL_RESOURCES['DELETE'] => [
                self::ACL_RULES['ACCESS'] => self::ACL_ACCESSES['PRIVATE'],
                self::ACL_RULES['ROLE'] => self::ACL_ROLES['ADMIN'],
                self::ACL_RULES['PRIVILEGE'] => self::ACL_PRIVILEGES['DELETE']
            ],
        ];
    public function checkUser($id)
    {
        if ($this instanceof \DACore\Controller\AbstractCrudRestController) {
            $userRepo = $this->service->getAnotherRepository('DACore\Entity\User\UserInterface');
            $user = $userRepo->find((int) $id);

            if ($user) return $user;
        }

        // TODO: implementar um logger para estes erros...
        throw new \Exception('You should use this trait only with instance of "DACore\Controller\AbstractCrudRestController". Or implement another strategy...');
    }

	// TODO: implement this method...
    // THE TRICK PART: Se o usuário tentar acessar está api sem ser pelo subdominio 'api', ele dará token inválido :)
	public function checkToken()
	{

        //if (!isset($this->aclResource)) return $this->status
        if (!isset($this->token)) return $this->statusBadRequest($this->badRequestError ?? 'SERVER ERROR!!! First, you need to execute "checkAuthorization" method.');

        if (!isset($_SERVER['HTTP_ORIGIN'])) {
            $this->statusBadRequest('Preciso saber qual a origem desta requisição.');
        }

        $dotenv = new \Dotenv\Dotenv(getcwd() . '/config');
        $dotenv->load();

        if (!in_array($_SERVER['HTTP_ORIGIN'], explode(';', getenv('API_AUDIENCES')))) {
            $this->statusBadRequest('Origem inválida.');
        }

        $parsedToken = (new Parser())->parse((string) $this->token);

        $parsed_jti = $parsedToken->getHeader('jti');
        $parsed_ip = $parsedToken->getClaim('ip');
        $parsed_access = $parsedToken->getClaim('access');

        $token = new ValidationData();
        $token->setIssuer($_SERVER['HTTP_HOST']);
        $token->setAudience(getenv('API_AUDIENCES'));
        $token->setId($parsed_jti);

        if ($parsedToken->validate($token)) {
            if ($data_access = $parsedToken->getClaim('access')) {
                if ($this->access === 'private' && $data_access === 'private') {
                    // TODO: lógica de api privada...
                    $parsed_uid = $parsedToken->getClaim('uid');
                    $user = $this->checkUser($parsed_uid);
                    $parsed_role = $parsedToken->getClaim('roles');

                    var_dump(json_decode($parsed_role, true));die;

                    if (!$user) return $this->statusBadRequest('Code: 234 from TokenService. Contact the administrator of this api -> "arthur_scosta@yahoo.com.br" or "dnaloco@gmail.com" for more information.');

                    if ($parsed_role != $this->role) return $this->statusBadRequest('Code: 345 from TokenService. Contact the administrator of this api -> "arthur_scosta@yahoo.com.br" or "dnaloco@gmail.com" for more information.');

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
                    return $this->statusBadRequest('Code: 123 from TokenService. Contact the administrator of this api -> "arthur_scosta@yahoo.com.br" or "dnaloco@gmail.com" for more information.');

                }
                return $this->statusBadRequest('Code: 567 from TokenService. Contact the administrator of this api -> "arthur_scosta@yahoo.com.br" or "dnaloco@gmail.com" for more information.');
            }
            return $this->statusBadRequest('Code: 567 from TokenService. Contact the administrator of this api -> "arthur_scosta@yahoo.com.br" or "dnaloco@gmail.com" for more information.');
        } else {
            return $this->statusBadRequest('TOKEN INVÁLIDO');
        }
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
                    $this->token = $splitAuth[1];
                    $this->access = $this->aclRules[$method][self::ACL_RULES['ACCESS']];
                    $this->role = $this->aclRules[$method][self::ACL_RULES['ROLE']];
                    $this->privilege = $this->aclRules[$method][self::ACL_RULES['PRIVILEGE']];
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
}