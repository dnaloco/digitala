<?php
namespace DAUser\Controller;
use DACore\Controller\AbstractCrudRestController;

use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;

use DACore\Aware\ApcCacheAwareInterface;
use DACore\Strategy\Core\{CsrfTokenFormInterface, CsrfTokenFormStrategy};

class UserRestController extends AbstractCrudRestController
implements ApcCacheAwareInterface, CsrfTokenFormInterface, EventManagerAwareInterface
{
	use CsrfTokenFormStrategy;

    protected $aclResource = 'users';
    protected $aclRules = [
        self::ACL_RESOURCES['POST'] => [
            self::ACL_RULES['ACCESS'] => self::ACL_ACCESSES['PUBLIC'],
            self::ACL_RULES['ROLE'] => self::ACL_ROLES['GUEST'],
            self::ACL_RULES['PRIVILEGE'] => self::ACL_PRIVILEGES['CREATE']
        ],
    ];
/*
	public function __construct($service)
    {
        parent::__construct($service);

        $this->aclResource = 'users';
        $this->aclRules = [
            self::ACL_RESOURCES['POST'] => [
                self::ACL_RULES['ACCESS'] => self::ACL_ACCESSES['PUBLIC'],
                self::ACL_RULES['ROLE'] => self::ACL_ROLES['ADMIN'],
                self::ACL_RULES['PRIVILEGE'] => self::ACL_PRIVILEGES['CREATE']
            ],
        ];

    }*/

    protected $events;

    public function setEventManager(EventManagerInterface $events) {
        parent::setEventManager($events);
        $this->events = $events;
        return $this;
    }

    public function getEventManager() {
        if (!$this->events) { $this->setEventManager(new EventManager(__CLASS__)); }
        return $this->events;
    }



	public function getCache($cache = null)
    {
        if(!isset($this->cache)) {
            $this->cache = $cache;
        }

        return $this->cache;
    }


	public function create($data)
	{

		//var_dump($data);die;
        //var_dump($this->cache->getItem('postmanForm'));die;
		$tokenKey = $this->checkCsrfToken($data);

		$response = parent::create($data);

		$variables = $response->getVariables();
		if (isset($variables['errors']) || !$variables['success']) {
			return $response;
        }

        $data = $variables['data'];

		if (isset($data['id'])) {
			$this->removeCsrfToken($tokenKey);
            $this->getEventManager()->trigger('onCreateUser', $this, $data);
		}

		return $response;
	}
}