<?php
namespace DABase\Controller;

use \DACore\Crud\AbstractCrudRestController;
use Zend\View\Model\JsonModel;

class CityRestController extends AbstractCrudRestController
{
	public function getList()
    {


        $options = array();
        $where = array();
        $limit = (int) $_GET['limit'] ?? null;
        $offset = (int) $_GET['offset'] ?? null;

        // TODO Criar uma createQueryBuilder amanhã... 02/09/2016 21:49...
        if (isset($_GET['where'])) {
            foreach($_GET['where'] as $str) {
                $arr = json_decode($str, true);
                $where[$arr['key']] = $arr['value'];
            }
        }
        //var_dump($where);die;

        /*if (isset($_GET['where'])) {
            foreach($_GET['where'] as $str) {
                $arr = json_decode($str, true);
                array_push($where, $arr);
            }
        }*/

        /*if (isset($_GET['options'])) {
            foreach($_GET['options'] as $str) {
                $arr = json_decode($str, true);
                array_push($options, $arr);
            }
        }*/
        // TODO Criar uma createQueryBuilder amanhã... 02/09/2016 21:49...
        $data = $this->service->getList($where, $options, $limit, $offset);
        $count = (int) $this->service->getTotalRows();


        if ($data) {
            $data = json_decode(static::getPropertyNamingSerializer()->serialize($data, 'json'), true);
            return new JsonModel(array('data' => $data, 'success' => true, 'total' => $count));
        }

        return new JsonModel(array('data' => array(), 'success' => false));
    }

}
