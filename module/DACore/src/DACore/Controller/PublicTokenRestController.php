<?php
namespace DACore\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Zend\EventManager\EventManagerInterface;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\ValidationData;
use Lcobucci\JWT\Parser;
use DACore\Controller\Aware\ApcCacheAwareInterface;

use DACore\Exception\HttpStatusCodeException;

class PublicTokenRestController extends AbstractRestfulController
{
    protected $collectionOptions = array('GET', 'OPTIONS');
    protected $resourceOptions = array('DELETE');

    public function getCache($cache = null)
    {
        if (!isset($this->cache)) {
            $this->cache = $cache;
        }
        return $this->cache;
    }

    public function setEventManager(EventManagerInterface $events)
    {
        parent::setEventManager($events);
        $events->attach('dispatch', array($this, 'checkOptions'), 10);
    }

    public function checkOptions($e)
    {
        $matches = $e->getRouteMatch();
        $response = $e->getResponse();
        $request = $e->getRequest();
        $method = $request->getMethod();
        if ($matches->getParam('id', false)) {
            if (!in_array($method, $this->resourceOptions)) {
                return $this->statusMethodNotAllowed();
            }
            return;
        }
        if (!in_array($method, $this->collectionOptions)) {
            return $this->statusMethodNotAllowed();
        }
        
    }
    public function getToken($api_issuer, $api_audience, $api_uid, $api_signer, $api_sign, $api_not_before, $api_expiration) {
        
        $token = (new Builder())->setIssuer($api_issuer) // Configures the issuer (iss claim)
            ->setAudience($api_audience) // Configures the audience (aud claim)
            ->setId($api_uid, true) // Configures the id (jti claim), replicating as a header item
            ->setIssuedAt(time()) // Configures the time that the token was issue (iat claim)
            ->setNotBefore(time() + $api_not_before) // Configures the time that the token can be used (nbf claim)
            ->setExpiration(time() + $api_expiration) // Configures the expiration time of the token (nbf claim)
            ->set('access', 'public') // Configures a new claim, called "uid"
            ->set('ip', $_SERVER['REMOTE_ADDR'])
            ->set('uid', $api_uid)
            ->sign($api_signer, $api_sign)
            ->getToken();

        return $token;
    }

    public function getList()
    {
        $dotenv = new \Dotenv\Dotenv(getcwd() . '/config');
        $dotenv->load();

        $token = new ValidationData();
        $strToken = null;
        $parsedToken = null;

        $api_issuer = getenv('API_ISSUER');
        $api_audience = getenv('API_AUDIENCES');

        $api_uid = md5(uniqid(rand(), true));
        $api_signer = new Sha256();
        $api_sign = getenv('API_PUBLIC_SIGN');
        $api_not_before = getenv('API_PUBLIC_NOTBEFORE');
        $api_expiration = getenv('API_PUBLIC_EXPIRATION');

        $newToken = $this->getToken($api_issuer, $api_audience, $api_uid, $api_signer, $api_sign, $api_not_before, $api_expiration);
        return new JsonModel(array('token' => $newToken->__toString()));
    }
}