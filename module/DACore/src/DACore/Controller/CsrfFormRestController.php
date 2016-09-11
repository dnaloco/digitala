<?php
namespace DACore\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Zend\EventManager\EventManagerInterface;

class CsrfFormRestController extends AbstractRestfulController
{
    protected $collectionOptions = array('GET', 'OPTIONS');
    protected $resourceOptions = array();

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

    public function getList()
    {
        session_name('CRSF_FORM');

        if (!isset($_GET['formToken'])) throw new \Exception('I couldn\'t generate the CSRF token. Contact the administrador of this api. Emails: arthur_scosta@yahoo.com.br or dnalogo@gmail.com. Sorry!');

        $_SESSION[$_GET['formToken']] = md5(uniqid(rand() . $_GET['formToken'], true));

        return new JsonModel(array('formToken' => $_SESSION[$_GET['formToken']]));
    }

}