<?php
namespace DACore\Controller;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Lcobucci\JWT\Parser;

use DACore\Controller\Aware\FirephpAwareInterface;
use DACore\Exception\HttpStatusCodeException;
use DACore\Strategy\{SerializerInterface, SerializerStrategy};
use DACore\Strategy\{ResponsesInterface, ResponseStrategy};
use DACore\Auth\JwtTokenInterface;

abstract class AbstractCrudRestController extends AbstractRestfulController implements ResponsesInterface, SerializerInterface, FirephpAwareInterface, JwtTokenInterface
{
    use SerializerStrategy;
    use ResponseStrategy;

    protected $collectionOptions = array('GET', 'POST', 'OPTIONS');
    protected $resourceOptions = array('DELETE', 'GET', 'PATCH', 'PUT');
    protected $service;

    protected $aclResource = 'general';

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

    public function getFirephp($firephp = null) {
        if (!isset($this->firephp)) {
            $this->firephp = $firephp;
        }

        return $this->firephp;
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
                return $this->statusMethodNotAllowed('Method not allowed ' . $method);
            }
            return;
        }
        if (!in_array($method, $this->collectionOptions)) {
            return $this->statusMethodNotAllowed('Method not allowed ' . $method);
        }
    }

    public function getList()
    {
        $where =    $_GET['where'] ?? array();
        $options =  $_GET['options'] ?? array();
        $limit =    $_GET['limit'] ?? null;
        $offset =   $_GET['offset'] ?? null;
        
        $data = $this->service->getList($where, $options, $limit, $offset);

        if ($data) {
            $data = json_decode(static::getPropertyNamingSerializer()->serialize($data, 'json'), true);
        }
        return new JsonModel(array('data' => $data, 'success' => true));
    }

    public function get($id)
    {
        $data = $this->service->getOne($id);
        if ($data) {
            $data = json_decode(static::getPropertyNamingSerializer()->serialize($data, 'json'), true);
            return new JsonModel(array('data' => $data, 'success' => true));
        }

        return new JsonModel(array('data' => array(), 'success' => false));
    }

    public function create($data)
    {
        $result = $this->service->insert($data);

        if (is_array($result) && isset($result['errors'])) {
            $this->statusBadRequest(json_encode($result['errors']));
            return new JsonModel(array('data' => array(), 'success' => false, 'errors' => $result['errors']));
        }
        if ($result) {
            $data = json_decode(static::getPropertyNamingSerializer()->serialize($result, 'json'), true);
            return new JsonModel(array('data' => $data, 'success' => true));
        }

        return new JsonModel(array('data' => array(), 'success' => false));
    }

    public function update($id, $data)
    {
        $result = $this->service->update($data);

        if (is_array($result) && isset($result['errors'])) {
            $this->statusBadRequest(json_encode($result['errors']));
            return new JsonModel(array('data' => array(), 'success' => false, 'errors' => $result['errors']));
        }
        if ($result) {
            $data = json_decode(static::getPropertyNamingSerializer()->serialize($result, 'json'), true);
            return new JsonModel(array('data' => $data, 'success' => true));
        }

        return new JsonModel(array('data' => array(), 'success' => false));
    }

    public function delete($id)
    {
        $result = $this->service->delete($id);
        if ($result) {
            return new JsonModel(array('data' => $id, 'succcess' => true));
        }
        return new JsonModel(array('data' => array(), 'success' => false));
    }

}