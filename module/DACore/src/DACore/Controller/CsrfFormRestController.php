<?php
namespace DACore\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Zend\EventManager\EventManagerInterface;

use Zend\Session\Config\SessionConfig;
use Zend\Session\Container;
use Zend\Session\SessionManager;
use DACore\Aware\ApcCacheAwareInterface;

class CsrfFormRestController extends AbstractRestfulController
implements ApcCacheAwareInterface
{
    protected $collectionOptions = array('GET', 'OPTIONS');
    protected $resourceOptions = array();

    public function getCache($cache = null)
    {
        if(!isset($this->cache)) {
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

    public function getList()
    {
        if (!isset($_GET['formName'])) throw new \Exception('I couldn\'t generate the CSRF token. Contact the administrador of this api. Emails: arthur_scosta@yahoo.com.br or dnalogo@gmail.com. Sorry!');

        $this->cache->setItem($_GET['formName'], md5(uniqid(rand() . $_GET['formName'], true)));

        //var_dump('GET TOKEN', $this->cache->getItem('postmanForm'));die;

        return new JsonModel(array('formToken' => $this->cache->getItem($_GET['formName'])));
    }

}