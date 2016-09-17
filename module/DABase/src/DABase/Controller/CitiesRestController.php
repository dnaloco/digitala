<?php
namespace DABase\Controller;

use DACore\Crud\AbstractCrudRestController;
use Zend\View\Model\JsonModel;

class CitiesRestController extends AbstractCrudRestController
{

    protected $collectionOptions = array('GET', 'OPTIONS');
    protected $resourceOptions = array();
    protected $aclResource = 'cities';
    protected $aclRules = [
        self::ACL_RESOURCES['GET'] => [
            self::ACL_RULES['ACCESS'] => self::ACL_ACCESSES['PUBLIC'],
            self::ACL_RULES['ROLE'] => self::ACL_ROLES['GUEST'],
            self::ACL_RULES['PRIVILEGE'] => self::ACL_PRIVILEGES['SEE']
        ],
    ];

    public function getList()
    {
        //var_dump($_SERVER);die;
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