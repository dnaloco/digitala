<?php
namespace DACore\Crud;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class AbstractCrudRestController extends AbstractRestfulController implements ResponsesInterfface, SerializerInterface
{
  use \DACore\Trait\SerializerTrait;

	protected $service;

	public function __construct($service)
	{
		$this->service = $service;
	}

	public function getList()
	{
		$data = $this->service->getList($_GET);

		if ($data) {
			$data = json_decode($this->getPropertyNamingSerializer()->serialize($data, 'json'), true);
			return new JsonModel(array('data' => $data, 'success' => true));
		}

		return new JsonModel(array('data' => array(),'success' => false));

	}

	public function get($id)
	{
		$data = $this->service->getOne($id)
	}

	public function create($data)
	{
		$result = $this->service->insert($data);

		if ($result) {
			if (!is_null($this->serializer))
				$data = json_decode($this->getPropertyNamingSerializer()->serialize($result, 'json'), true);
			return new JsonModel(array('data' => $data, 'success' => true));
		}

		return new JsonModel(array('data' => array(),'success' => false));
	}

	public function update($id, $data)
	{
		$result = $this->service->update($data);

		if ($result) {
			if (!is_null($this->serializer))
				$data = json_decode($this->getPropertyNamingSerializer()->serialize($result, 'json'), true);
			return new JsonModel(array('data' => $data, 'success' => true));
		}

		return new JsonModel(array('data' => array(),'success' => false));
	}

	public function delete($id)
	{
		$result = $this->service->delete($id);

		if ($result)
			return new JsonModel(array('data' => $id, 'succcess' => true));

		return new JsonModel(array('data' => array(), 'success' => false));
	}

	public function methodNotAllowed()
	{
		$this->response->setStatusCode(405);
        throw new \Exception('Method Not Allowed');
	}

	public function unauthorized()
	{
		$this->response->setStatusCode(401);
        throw new \Exception('Unauthorized');
	}
}
