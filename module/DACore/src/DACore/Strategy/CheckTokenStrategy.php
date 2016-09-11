<?php
namespace DACore\Strategy;

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
        if ($this instanceof \DACore\Crud\AbstractCrudRestController) {
            $userRepo = $this->service->getAnotherRepository('\DAUser\Entity\User');
            $user = $userRepo->find((int) $id);

            if ($user) return $user;
        }

        // TODO: implementar um logar para estes erros...
        throw new \Exception('You should use this trait only with instance of "DACore\Crud\AbstractCrudRestController". Or implement another strategy...');
    }

	// TODO: implement this method...
	public function checkToken()
	{
        //if (!isset($this->aclResource)) return $this->status
        if (!isset($this->token)) return $this->statusBadRequest($this->badRequestError ?? 'SERVER ERROR!!! First, you need to execute "checkAuthorization" method.');


        $parsedToken = (new Parser())->parse((string) $this->token);

        $data_issuer = $_SERVER['HTTP_HOST'];
        $data_audience = $_SERVER['HTTP_REFERER'];

        $parsed_jti = $parsedToken->getHeader('jti');
        $parsed_ip = $parsedToken->getClaim('ip');
        $parsed_access = $parsedToken->getClaim('access');

        $token = new ValidationData();
        $token->setIssuer($data_issuer);
        $token->setAudience($data_audience);
        $token->setId($parsed_jti);

        if ($parsedToken->validate($token)) {
            if ($data_access = $parsedToken->getClaim('access')) {
                if ($data_access == $this->access) {
                    switch($data_access) {
                        case 'public':
                            if ($parsed_ip == $_SERVER['REMOTE_ADDR']) {
                                return;
                            }
                            return $this->statusBadRequest('Ummmm. This is awkward! code: 123 from TokenService. Contact the administrator of this api -> "arthur_scosta@yahoo.com.br" or "dnaloco@gmail.com" for more information.');
                            break;
                        case 'private':
                            $parsed_uid = $parsedToken->getClaim('uid');
                            $user = $this->checkUser($parsed_uid);
                            $parsed_role = $parsedToken->getClaim('role');

                            if (!$user) return $this->statusBadRequest('Ummmm. This is awkward! code: 234 from TokenService. Contact the administrator of this api -> "arthur_scosta@yahoo.com.br" or "dnaloco@gmail.com" for more information.');

                            if ($parsed_role != $this->role) return $this->statusBadRequest('Ummmm. This is awkward! code: 345 from TokenService. Contact the administrator of this api -> "arthur_scosta@yahoo.com.br" or "dnaloco@gmail.com" for more information.');

                            $roles = $user->getRoles();
                            $hasRole = false;

                            foreach ($roles as $role) {
                                if ($role->getName() == $this->role) {
                                    $hasRole = $role;
                                    break;
                                }
                            }

                            if (!$hasRole) return $this->statusBadRequest('Ummmm. This is awkward! code: 456 from TokenService. Contact the administrator of this api -> "arthur_scosta@yahoo.com.br" or "dnaloco@gmail.com" for more information.');
                            // TODO: continuar a implementação...
                            // checar se a role do usuário tem privilegio ao recurso dado...
                            // 

                            break;
                        default:
                            return $this->statusBadRequest('Ummmm. This is awkward! code: 567 from TokenService. Contact the administrator of this api -> "arthur_scosta@yahoo.com.br" or "dnaloco@gmail.com" for more information.');
                    }
                }
            }
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
                    $this->badRequestError = 'Invalid schema. Only Bearer supported. Read about "JWT token" anyway.';
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