<?php
namespace DAFamilyBudget\Controller;

use DACore\Controller\AbstractCrudRestController;
use Zend\View\Model\JsonModel;

class CategoriesRestController extends AbstractCrudRestController
{
    protected $aclResource = 'fbCategories';

    public function getList()
    {
        $data = null;
        if (isset($_GET['selectYearMonth'])
            && isset($_GET['year'])
            && isset($_GET['month'])
            && isset($_GET['type'])
        ) {
            $data = $this->service->getByYearAndMonth($_GET['year'], $_GET['month'], $_GET['type']);
        } else {
        	return parent::getList();
        }

        if ($data) {
            $data = json_decode(static::getPropertyNamingSerializer()->serialize($data, 'json'), true);
            return new JsonModel(array('data' => $data, 'success' => true));
        }

        return new JsonModel(array('data' => array(), 'success' => false));
    }
}
