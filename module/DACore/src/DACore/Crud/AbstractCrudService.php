<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 29/09/2015
 * Time: 18:32
 */
namespace DACore\Crud;

use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator;

class AbstractCrudService {
	protected $em;
	protected $entity;

	public function __construct(EntityManager $em) {
		$this->em = $em;
	}

	public function getList(array $options = array()) 
	{
		$repo = $this->getRepository();

		$data = $repo->findBy(array(), $options);

		return $data;
	}

	public function getOne($id)
	{
		$repo = $this->getRepository();

		$data = $repo->find((int) $id);

		return $data;
	}

	public function getRepository()
	{
		return $this->em->getRepository($this->entity);
	}

	public function insert(array $data) {
		$entity = new $this->entity($data);
		$this->em->persist($entity);
		$this->em->flush();
		return $entity;
	}

	public function update(array $data) {
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