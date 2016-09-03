<?php
namespace DABase\Controller;

use \DACore\Crud\AbstractCrudRestController;
use Zend\View\Model\JsonModel;

class CityRestController extends AbstractCrudRestController
{
	public function getList()
    {


        $sortBy = array();
        $where = array();
        $limit = (int) $_GET['limit'] ?? null;
        $offset = (int) $_GET['offset'] ?? null;

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
