<?php
namespace DAUser\Controller;

use DACore\Exception\HttpStatusCodeException;
use Zend\View\Model\JsonModel;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\EventManager\EventManagerInterface;

use DACore\Auth\JwtTokenInterface;
use DACore\Strategy\Core\{ResponsesInterface, ResponseStrategy};

class ActivateUserRestController extends AbstractRestfulController
implements JwtTokenInterface, ResponsesInterface
{
    use ResponseStrategy;
    
    protected $collectionOptions = array('OPTIONS');
    protected $resourceOptions = array('GET');

    protected $aclResource = 'activate';
    protected $aclRules = [
        self::ACL_RESOURCES['UPDATE'] => [
            self::ACL_RULES['ACCESS'] => self::ACL_ACCESSES['PUBLIC'],
            self::ACL_RULES['ROLE'] => self::ACL_ROLES['GUEST'],
            self::ACL_RULES['PRIVILEGE'] => self::ACL_PRIVILEGES['SEE']
        ],
    ];

    public function __construct($service) {
        $this->service = $service;
    }

    public function getResource()
    {
        return $this->aclResource;
    }

    public function getRules()
    {
        return $this->aclRules;
    }

    public function setEventManager(EventManagerInterface $events)
    {
        parent::setEventManager($events);
        $events->attach('dispatch', array($this, 'checkOptions'), 10);
    }
    // TODO: criar uma trait para validar token e uma interface e sobrescrever checkOptions
    public function checkOptions($e)
    {
        $matches =  $e->getRouteMatch();
        $response = $e->getResponse();
        $request =  $e->getRequest();
        $method =   $request->getMethod();
        if ($matches->getParam('id', false)) {
            if (!in_array($method, $this->resourceOptions)) {
                return $this->statusMethodNotAllowed('Method not allowed');
            }
            return;
        }
        if (!in_array($method, $this->collectionOptions)) {
            return $this->statusMethodNotAllowed('Method not allowed');
        }
    }

    public function getCache($cache = null)
    {
        if(!isset($this->cache)) {
            $this->cache = $cache;
        }

        return $this->cache;
    }


    public function get($id)
    {
        $user = $this->service->activateUser($id);
    }
}