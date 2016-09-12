<?php
namespace DACore\Crud;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Lcobucci\JWT\Parser;

use DACore\Controller\Aware\FirephpAwareInterface;
use DACore\Exception\HttpStatusCodeException;

abstract class AbstractCrudRestController extends AbstractRestfulController implements ResponsesInterface, SerializerInterface, FirephpAwareInterface
{
    use \DACore\Strategy\SerializerStrategies;

    protected $collectionOptions = array('GET', 'POST', 'OPTIONS');
    protected $resourceOptions = array('DELETE', 'GET', 'PATCH', 'PUT');
    protected $service;

    public function __construct($service) {
        $this->service = $service;
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
                return $this->statusMethodNotAllowed();
            }
            return;
        }
        if (!in_array($method, $this->collectionOptions)) {
            return $this->statusMethodNotAllowed();
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
            return new JsonModel(array('data' => $data, 'success' => true));
        }
        return new JsonModel(array('data' => array(), 'success' => false));
    }

    public function get($id)
    {
        $data = $this->service->getOne($id);
        if ($data) {
            $data = json_decode(static::getPropertyNamingSerializer()->serialize($data, 'json'), true);
            return new JsonModel(array('data' => $data, 'success' => true));
        }
        $this->statusNoContent();
        return new JsonModel(array('data' => array(), 'success' => false));
    }

    public function create($data)
    {
        $result = $this->service->insert($data);
        if (is_array($result) && isset($result['errors'])) {
            $this->statusConflict();
            return new JsonModel(array('data' => array(), 'success' => false, 'errors' => $result['errors']));
        }
        if ($result) {
            $data = json_decode(static::getPropertyNamingSerializer()->serialize($result, 'json'), true);
            return new JsonModel(array('data' => $data, 'success' => true));
        }
        $this->statusConflict();
        return new JsonModel(array('data' => array(), 'success' => false));
    }

    public function update($id, $data)
    {
        $result = $this->service->update($data);
        if (isset($result['errors'])) {
            $this->statusConflict();
            return new JsonModel(array('data' => array(), 'success' => false, 'errors' => $data['errors']));
        }
        if ($result) {
            $data = json_decode(static::getPropertyNamingSerializer()->serialize($result, 'json'), true);
            return new JsonModel(array('data' => $data, 'success' => true));
        }
        $this->statusNotModified();
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

    public function makeResponseStatus($message, $code, $firephpDebug = true, $throw = false)
    {
        $this->response->setStatusCode($code);

        if (isset($this->firephp) && $firephpDebug) {
            $this->firephp->addInfo('Info about http status code');
            $this->firephp->addError($message, array('http_code' => $code));
        }

        if ($throw)
            throw new HttpStatusCodeException($message, $code);
    }

    public function statusOk()
    {
        $this->response->setStatusCode(self::CODE_OK);
    }

    function statusCreated($message = null)
    {
        $message = 'New Resource Info: ' . $message;
        $this->makeResponseStatus($message, self::CODE_CREATED, true);
    }

    function statusNotModified($message = null)
    {
        $message = 'Not Modified Info: ' . $message;
        $this->makeResponseStatus($message, self::CODE_NOT_MODIFIED, true, true);
    }

    function statusBadRequest($message = null)
    {
        $message = 'Bad Request Info: ' . $message;
        $this->makeResponseStatus($message, self::CODE_BAD_REQUEST, true, true);
    }

    function statusNotAuthorized($message = null)
    {
        $message = 'Not Authorized Info: ' . $message;
        $this->makeResponseStatus($message, self::CODE_NOT_AUTHORIZED, true, true);
    }

    function statusForbidden($message = null)
    {
        $message = 'Forbidden Info: ' . $message;
        $this->makeResponseStatus($message, self::CODE_FORBIDDEN, true, true);
    }

    function statusResourceNotFound($message = null)
    {
        $message = 'Resource Not Found Info: ' . $message;
        $this->makeResponseStatus($message, self::CODE_RESOURCE_NOT_FOUND, true, true);
    }

    function statusMethodNotAllowed($message = null)
    {
        $message = 'Method Not Allowed Info: ' . $message;
        $this->makeResponseStatus($message, self::CODE_METHOD_NOT_ALLOWED, true, true);
    }

    function statusServerError($message = null)
    {
        $message = 'Server Error Info: ' . $message;
        $this->makeResponseStatus($message, self::CODE_SERVER_ERROR, true, true);
    }
}