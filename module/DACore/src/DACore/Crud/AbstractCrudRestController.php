<?php
namespace DACore\Crud;

use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

abstract class AbstractCrudRestController extends AbstractRestfulController implements ResponsesInterface, SerializerInterface
{
    use \DACore\Strategy\SerializerStrategies;

    protected $collectionOptions = array('GET', 'POST');
    protected $resourceOptions = array('DELETE', 'GET', 'PATCH', 'PUT');

    protected $service;

    public function __construct($service) {
        $this->service = $service;
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
                return $this->methodNotAllowed();
            }
            return;
        }

        if (!in_array($method, $this->collectionOptions)) {
            return $this->methodNotAllowed();
        }
    }

    public function getList()
    {
        $options = $_GET['options'] ?? array();

        $data = $this->service->getList($options);

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
        return new JsonModel(array('data' => array(), 'success' => false));
    }

    public function create($data)
    {
        $result = $this->service->insert($data);

        var_dump($result);die();

        if (isset($result['errors'][0])) {
            return new JsonModel(array('data' => array(), 'success' => false, 'errors' => $result['errors']));
        }

        unset($data['errors']);

        if ($result) {
            if (!is_null($this->serializer)) {
                $data = json_decode(static::getPropertyNamingSerializer()->serialize($result, 'json'), true);
            }

            return new JsonModel(array('data' => $data, 'success' => true));
        }

        return new JsonModel(array('data' => array(), 'success' => false));
    }

    public function update($id, $data)
    {
        $result = $this->service->update($data);

        if (isset($result['errors'])) {
            return new JsonModel(array('data' => array(), 'success' => false, 'errors' => $data['errors']));
        }

        if ($result) {
            if (!is_null($this->serializer)) {
                $data = json_decode(static::getPropertyNamingSerializer()->serialize($result, 'json'), true);
            }

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

    public function methodNotAllowed()
    {
        return $this->response->setStatusCode(405);
        // throw new \Exception('Method Not Allowed');
    }

    public function unauthorized()
    {
        return $this->response->setStatusCode(401);
        // throw new \Exception('Unauthorized');
    }
}
