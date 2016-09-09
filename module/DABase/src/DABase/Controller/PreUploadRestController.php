<?php
namespace DABase\Controller;

use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use DACore\Crud\ResponsesInterface;
use Zend\Debug\Debug;

class PreUploadRestController extends AbstractRestfulController implements ResponsesInterface
{
	protected $collectionOptions = array('POST');
    protected $resourceOptions = array('DELETE');
    protected $tmp_path;

    const IMAGE_EXTENSIONS = array('jpg', 'jpeg', 'png', 'gif', 'rtf');
    const MIN_SIZE = 10 * 1024;
    const MAX_SIZE = 1024 * 1024;

    protected $uploadService;

    public function __construct($uploadService)
    {
        $this->uploadService =  $uploadService;
        $this->tmp_path = getcwd() . '/tmp/';
    }

    public function getUploadService()
    {
        return $this->uploadService;
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
	public function create ($data)
	{
		$response = array('errors' => array(), 'success' => false, 'data' => array());

		if (!$response['success'] = isset($data['data']['type'])) {
            $response['errors'][] = array('A type must be informed');
        	return new JsonModel($response);
        }

        $type = $data['data']['type'];

        $uploadService = $this->getUploadService();

        $response = $uploadService->preuploadFiles($type);

		if (!$response['success']) $this->statusConflict();

		return new JsonModel($response);
	}

    public function delete($id)
    {
        $response = array('errors' => array(), 'success' => true, 'data' => array());

        $files = glob($this->tmp_path . '/*');

        foreach($files as $file){
          if(is_file($file))
            unlink($file);
        }

        return new JsonModel($response);
    }

	public function statusOk()
    {
        return $this->response->setStatusCode(200);
        // throw new \Exception('Unauthorized');
    }

    public function statusMethodNotAllowed()
    {
        return $this->response->setStatusCode(405);
        // throw new \Exception('Method Not Allowed');
    }

    public function statusUnauthorized()
    {
        return $this->response->setStatusCode(401);
        // throw new \Exception('Unauthorized');
    }

    public function statusConflict()
    {
        return $this->response->setStatusCode(409);
        // throw new \Exception('Unauthorized');
    }

    public function statusNoContent()
    {
        return $this->response->setStatusCode(204);
        // throw new \Exception('Unauthorized');
    }

    public function statusNotModified()
    {
        return $this->response->setStatusCode(304);
        // throw new \Exception('Unauthorized');
    }
}