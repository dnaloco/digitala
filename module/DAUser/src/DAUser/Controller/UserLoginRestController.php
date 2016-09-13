<?php
namespace DAUser\Controller;
use DACore\Crud\AbstractCrudRestController;
use DACore\Exception\HttpStatusCodeException;
use Zend\View\Model\JsonModel;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use DACore\Controller\Aware\ApcCacheAwareInterface;


use DACore\Strategy\{DataCheckerStrategyInterface, DataCheckerStrategy};
use DACore\Strategy\{SerializerInterface, SerializerStrategy};
use DACore\Strategy\{CsrfTokenFormInterface, CsrfTokenFormStrategy};

class UserLoginRestController extends AbstractCrudRestController
implements ApcCacheAwareInterface,
    CsrfTokenFormInterface,
    DataCheckerStrategyInterface,
    SerializerInterface
{
    use DataCheckerStrategy;
    use CsrfTokenFormStrategy;
    use SerializerStrategy;

    protected $collectionOptions = array('POST', 'OPTIONS');
    protected $resourceOptions = array();

    public function __construct($service)
    {
        parent::__construct($service);

        if ($this instanceof CheckTokenStrategyInterface)
        {
            $this->aclResource = 'login';
            $this->aclRules = [
                self::ACL_RESOURCES['POST'] => [
                    self::ACL_RULES['ACCESS'] => self::ACL_ACCESSES['PUBLIC'],
                    self::ACL_RULES['ROLE'] => self::ACL_ROLES['ADMIN'],
                    self::ACL_RULES['PRIVILEGE'] => self::ACL_PRIVILEGES['SEE']
                ],
            ];
        }
    }

    public function checkOptions($e)
    {
        //var_dump(apache_request_headers());die;
        //var_dump($_SERVER['HTTP_REFERER']);die;
        $matches =  $e->getRouteMatch();
        $response = $e->getResponse();
        $request =  $e->getRequest();
        $method =   $request->getMethod();

       if ($matches->getParam('id', false)) {
            if (!in_array($method, $this->resourceOptions)) {
                return $this->statusMethodNotAllowed('This method ' . $method . ' is not allowed on this api.');
            }
        }
        if (!in_array($method, $this->collectionOptions)) {
            return $this->statusMethodNotAllowed('This method ' . $method . ' is not allowed on this api.');
        }

        if ($this instanceof CheckTokenStrategyInterface) {
            $headers = $request->getHeaders();
            $authResponse = $this->checkAuthorization($headers, $method)->checkToken();
            return $authResponse;
        }

    }

	public function getCache($cache = null)
    {
        if(!isset($this->cache)) {
            $this->cache = $cache;
        }

        return $this->cache;
    }

    public function getToken($api_issuer, $api_audience, $api_uid, $api_signer, $api_sign, $api_not_before, $api_expiration, $user_email, $user_roles)
    {
        $token = (new Builder())->setIssuer($api_issuer) // Configures the issuer (iss claim)
            ->setAudience($api_audience) // Configures the audience (aud claim)
            ->setId($api_uid, true) // Configures the id (jti claim), replicating as a header item
            ->setIssuedAt(time()) // Configures the time that the token was issue (iat claim)
            ->setNotBefore(time() + $api_not_before) // Configures the time that the token can be used (nbf claim)
            ->setExpiration(time() + $api_expiration) // Configures the expiration time of the token (nbf claim)
            ->set('access', 'private') // Configures a new claim, called "uid"
            ->set('ip', $_SERVER['REMOTE_ADDR'])
            ->set('uid', $api_uid)
            ->set('email', $user_email)
            ->set('roles', $user_roles)
            ->sign($api_signer, $api_sign)
            ->getToken();

        return $token;
    }

    // criar token jwt
	public function create($data)
	{
        //var_dump($data);die;
        $tokenKey = $this->checkCsrfToken($data);

        if (!isset($data['user'], $data['password'])) {
            $this->statusBadRequest('Data must have user and password to get login!');
        }

        $user = static::checkEmail('user', $data['user'], 'login_user');

        if (!$user) $this->statusBadRequest('Invalid user');

        $password = static::checkString('password', $data['password'], 'login_password');
        $password = $password ? static::checkStringLength('user', $password, 'login_password', 6, 32) : false;

        if (!$password) $this->statusBadRequest('Invalid password');

        $userRepo = $this->service->getRepository();

        $hasUser = $userRepo->findOneBy(array('user' => $user));


        // TODO trocar regras publicas por regras privadas depois, como por exemplo, usar ssh key file...
        if ($hasUser) {
            $hashPassword = $hasUser::encryptPassword($password, $hasUser->getSalt());

            if ($hashPassword == $hasUser->getPassword()) {
                $dotenv = new \Dotenv\Dotenv(getcwd() . '/config');
                $dotenv->load();

                $api_issuer = getenv('API_ISSUER');
                $api_audience = getenv('API_AUDIENCES');

                $api_uid = $hasUser->getId();
                $api_signer = new Sha256();
                $api_sign = getenv('API_PUBLIC_SIGN');
                $api_not_before = getenv('API_PUBLIC_NOTBEFORE');
                $api_expiration = getenv('API_PUBLIC_EXPIRATION');

                $user_email = $hasUser->getUser();
                $user_roles = static::getPropertyNamingSerializer()->serialize($hasUser->getRoles(), 'json');

                $newToken = $this->getToken($api_issuer, $api_audience, $api_uid, $api_signer, $api_sign, $api_not_before, $api_expiration, $user_email, $user_roles);
                return new JsonModel(array('token' => $newToken->__toString()));
            }

            $this->statusBadRequest('Wrong password');
        }

        $this->statusBadRequest('User not found!');
	}
}