<?php
namespace DABase\Controller;

use DACore\Crud\AbstractCrudRestController;
use Zend\View\Model\JsonModel;

use DACore\Strategy\{CheckTokenStrategy, CheckTokenStrategyInterface};

class CityRestController extends AbstractCrudRestController
implements CheckTokenStrategyInterface
{
    use CheckTokenStrategy;

    protected $collectionOptions = array('GET', 'OPTIONS');
    protected $resourceOptions = array();

    public function __construct($service)
    {
        parent::__construct($service);

        if ($this instanceof CheckTokenStrategyInterface)
        {
            $this->aclResource = 'city';
            $this->aclRules = [
                self::ACL_RESOURCES['GET'] => [
                    self::ACL_RULES['ACCESS'] => self::ACL_ACCESSES['PUBLIC'],
                    self::ACL_RULES['ROLE'] => self::ACL_ROLES['ADMIN'],
                    self::ACL_RULES['PRIVILEGE'] => self::ACL_PRIVILEGES['SEE']
                ],
            ];
        }
    }

    public function checkOptions($e)
    {
        $matches =  $e->getRouteMatch();
        $response = $e->getResponse();
        $request =  $e->getRequest();
        $method =   $request->getMethod();

       if ($matches->getParam('id', false)) {
            if (!in_array($method, $this->resourceOptions)) {
                return $this->statusMethodNotAllowed('This method ' . $method . ' is not allowed on this api.');
            }
        }
        if (!in_array($method, $this->collectionOptions)) {
            return $this->statusMethodNotAllowed('This method ' . $method . ' is not allowed on this api.');
        }

        if ($this instanceof CheckTokenStrategyInterface) {
            $headers = $request->getHeaders();
            $authResponse = $this->checkAuthorization($headers, $method)->checkToken();
            return $authResponse;
        }

    }

    public function getList()
    {
        
        //var_dump($this->getRequest()->getHeader('authorization'));die;
        $sortBy = array();
        $where = array();
        $limit = $_GET['limit'] ?? 10;
        $offset = $_GET['offset'] ?? 0;
        if (isset($_GET['where'])) {
            foreach($_GET['where'] as $str) {
                $arr = json_decode($str, true);
                array_push($where, $arr);
            }
        }
        if (isset($_GET['options'])) {
            foreach($_GET['options'] as $str) {
                $arr = json_decode($str, true);
                $sortBy = $arr;
            }
        }
        $data = $this->service->getList($where, $sortBy, $limit, $offset);
        $count = (int) $this->service->getRelativeTotalRows($where, $sortBy, $limit, $offset);
        if ($data) {
            $data = json_decode(static::getPropertyNamingSerializer()->serialize($data, 'json'), true);
            return new JsonModel(array('data' => $data, 'success' => true, 'total' => $count));
        }
        return new JsonModel(array('data' => array(), 'success' => false));
    }
}