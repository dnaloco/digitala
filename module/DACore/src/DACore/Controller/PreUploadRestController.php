<?php
namespace DACore\Controller;

use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use DACore\Strategy\Core\{ResponsesInterface, ResponseStrategy};

class PreUploadRestController extends AbstractRestfulController implements ResponsesInterface
{
    use ResponseStrategy;
    
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
                return $this->statusMethodNotAllowed('Method not allowed ' . $method);
            }
            return;
        }

        if (!in_array($method, $this->collectionOptions)) {
            return $this->statusMethodNotAllowed('Method not allowed ' . $method);
        }
    }
	public function create ($data)
	{
        //var_dump($_FILES);
        //var_dump($data);die;
		$response = array('errors' => array(), 'success' => false, 'data' => array());

        // TEMPORARIO TEMPORARIO TEMPORARIO TEMPORARIO !!!!!!!!!!!!!!!!!!!!!!!!!!!!
		if (!$response['success'] = isset($data['data']['type'])) {
            $response['errors'][] = array('A type must be informed');
        	return new JsonModel($response);
        }

        $type = $data['data']['type'];
        //$type = "image/gif";

        $uploadService = $this->getUploadService();

        $response = $uploadService->preuploadFiles($type);

		if (!$response['success']) $this->statusBadRequest();

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

}