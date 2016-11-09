<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 29/09/2015
 * Time: 18:32
 */
namespace DACore\Service;

use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator;
use DACore\Strategy\Core\PrepareDataInterface;

abstract class AbstractCrudService implements PrepareDataInterface
{
	protected $em;
	protected $entity;
	protected $repository;

	public function __construct(EntityManager $em, $entity)
	{
		$this->em = $em;
		$this->entity = $entity;
	}

	public function prepareData(array $data)
	{
		unset($data['createdAt']);
		unset($data['updatedAt']);

		return array_filter($data);
	}

	public function getRepository()
	{
		if (!isset($this->repository)) {
			$this->repository = $this->em->getRepository($this->entity);
		}

		return $this->repository;
	}

	public function getAnotherRepository($entity)
	{
		return $this->em->getRepository($entity);
	}

	public function getList(array $where = array(), array $options = array(), $limit = null, $offset = null)
	{
		$whereArr = [];
		foreach($where as $w) {

			if (is_string($w)) {
				$wArray = json_decode($w, true);
				$whereArr[$wArray['key']] = $wArray['value'];
			}

		}

		$repo = self::getRepository();

		$data = $repo->findBy($whereArr, $options, $limit, $offset);

		return $data;
	}

	public function getOne($id)
	{
		$repo = self::getRepository();

		$data = $repo->find((int) $id);

		return $data;
	}

	public function insert(array $data)
	{

		$data = static::prepareData($data);

		if (!empty($data['errors'])) return $data;

		try {

			$entity = new $this->entity($data);
			$this->em->persist($entity);
			$this->em->flush();
		} catch(\Exception $e) {
			$data['errors'] = $e->getMessage();
			return $data;
		}

		return $entity;
	}

	public function update(array $data) {
		$data = static::prepareData($data);
		if (isset($data['errors'])) return $data;
		$entity = $this->em->getReference($this->entity, $data['id']);
		(new Hydrator\ClassMethods())->hydrate($data, $entity);
		$this->em->persist($entity);
		$this->em->flush();
		return $entity;
	}

	public function delete($id) {
		$entity = $this->em->getReference($this->entity, $id);
		if ($entity) {
			$this->em->remove($entity);
			$this->em->flush();
			return $id;
		}
		return false;
	}
}