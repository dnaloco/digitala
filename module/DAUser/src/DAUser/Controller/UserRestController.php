<?php
namespace DAUser\Controller;
use DACore\Crud\AbstractCrudRestController;

use DACore\Controller\Aware\ApcCacheAwareInterface;
use DACore\Crud\{CsrfTokenFormInterface, CsrfTokenStrategy};
use DACore\Strategy\{CheckTokenStrategy, CheckTokenStrategyInterface};

class UserRestController extends AbstractCrudRestController
implements ApcCacheAwareInterface, CsrfTokenFormInterface, CheckTokenStrategyInterface
{
	use CsrfTokenStrategy;
	use CheckTokenStrategy;

	public function __construct($service)
    {
        parent::__construct($service);

        if ($this instanceof CheckTokenStrategyInterface)
        {
            $this->aclResource = 'users';
            $this->aclRules = [
                self::ACL_RESOURCES['POST'] => [
                    self::ACL_RULES['ACCESS'] => self::ACL_ACCESSES['PUBLIC'],
                    self::ACL_RULES['ROLE'] => self::ACL_ROLES['ADMIN'],
                    self::ACL_RULES['PRIVILEGE'] => self::ACL_PRIVILEGES['SEE']
                ],
            ];
        }
    }

    public function checkOptions($e)
    {
        //var_dump(apache_request_headers());die;
        //var_dump($_SERVER['HTTP_REFERER']);die;
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
	
	public function getCache($cache = null)
    {
        if(!isset($this->cache)) {
            $this->cache = $cache;
        }

        return $this->cache;
    }

    
	public function create($data)
	{
		//var_dump($data);die;
		$tokenKey = $this->checkCsrfToken($data);

		$response = parent::create($data);

		$variables = $response->getVariables();
		if (isset($variables['errors']) || !$variables['success']) {
			return $response;
        }

        $data = $variables['data'];

		if (isset($data['id'])) {
			$this->removeCsrfToken($tokenKey);
		}

		return $response;
	}
}