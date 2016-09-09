<?php
namespace DACore\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Zend\EventManager\EventManagerInterface;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\ValidationData;
use Lcobucci\JWT\Parser;

class PublicTokenRestController extends AbstractRestfulController
{
    protected $collectionOptions = array('GET');
    protected $resourceOptions = array('DELETE');

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

    public function getToken($api_issuer, $api_audience, $api_uid, $api_signer, $api_sign) {
        
        $token = (new Builder())->setIssuer($api_issuer) // Configures the issuer (iss claim)
            ->setAudience($api_audience) // Configures the audience (aud claim)
            ->setId($api_uid, true) // Configures the id (jti claim), replicating as a header item
            ->setIssuedAt(time()) // Configures the time that the token was issue (iat claim)
            ->setNotBefore(time()) // Configures the time that the token can be used (nbf claim)
            ->setExpiration(time() + 3600) // Configures the expiration time of the token (nbf claim)
            ->set('access', 'public') // Configures a new claim, called "uid"
            ->set('role', 'guest')
            ->set('name', 'Visitor')
            ->set('ip', $_SERVER['REMOTE_ADDR'])
            ->sign($api_signer, $api_sign)
            ->getToken();
        $_SESSION["publicToken"] = $token->__toString();
        $_SESSION["uid"] = $api_uid;

        return $token;
    }

	public function getList()
    {
        session_start();

        $dotenv = new \Dotenv\Dotenv(getcwd() . '/config');
        $dotenv->load();


        $token = new ValidationData();
        $strToken = null;
        $parsedToken = null;

        $api_issuer = getenv('API_ISSUER');
        $api_audience = getenv('API_AUDIENCE');
        $api_uid = md5(uniqid(rand(), true));
        $api_signer = new Sha256();
        $api_sign = getenv('SECRET_PUBLIC_TOKEN');

        if (isset($_SESSION['uid']) && isset($_SESSION['publicToken'])) {
            $strToken = $_SESSION['publicToken'];
            $parsedToken = (new Parser())->parse((string) $strToken);
            $token->setIssuer($api_issuer);
            $token->setAudience($api_audience);
            $token->setId($_SESSION['uid']);

            if ($parsedToken->validate($token)) {

                $token = $parsedToken;
                return new JsonModel(array('token' => $token->__toString()));
            }

        }

        $token = $this->getToken($api_issuer, $api_audience, $api_uid, $api_signer, $api_sign);


        return new JsonModel(array('token' => $token->__toString()));
    }

}
