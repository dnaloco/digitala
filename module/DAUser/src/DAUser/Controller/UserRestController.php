<?php
namespace DAUser\Controller;
use DACore\Crud\AbstractCrudRestController;
use DACore\Exception\HttpStatusCodeException;



use Zend\Session\Config\SessionConfig;
use Zend\Session\Container;
use Zend\Session\SessionManager;
use DACore\Controller\Aware\ApcCacheAwareInterface;

class UserRestController extends AbstractCrudRestController
implements ApcCacheAwareInterface
{
	public function getCache($cache = null)
    {
        if(!isset($this->cache)) {
            $this->cache = $cache;
        }

        return $this->cache;
    }

	/*public function create($data)
	{
		$response = parent::create($data);
		$variables = $response->getVariables();
		if (isset($variables['errors']) || !$variables['success']) {
            return $response;
        }
        $data = $variables['data'];
		if (isset($data['id'])) {
			$filteredUser = self::getFilteredUser($data);
		}
		$response->setVariable('data', $filteredUser);
		return $response;
	}*/
	public function create($data)
	{
		if (!isset($data['formName']) && !isset($data['formToken'])) {
			$this->statusBadRequest('This form is invalid');
			throw new HttpStatusCodeException('This form is invalid.', 400);
		}
		var_dump('from cache formToken ' . $this->cache->getItem($data['formName']));
		var_dump('from form formToken ' . $data['formToken']);
		die;

		$response = parent::create($data);
		$variables = $response->getVariables();
		if (isset($variables['errors']) || !$variables['success']) {
            return $response;
        }
        $data = $variables['data'];
		if (isset($data['id'])) {
			// excluir token...
		}
		return $response;
	}
}