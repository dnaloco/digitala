<?php 
namespace DABase\Service;

use DACore\Service\AbstractCrudService;

class City extends AbstractCrudService
{
	public function getTotalRows()
	{
		$query = $this->em->createQuery('SELECT COUNT(c.id) FROM ' . $this->entity . ' c');
		$count = $query->getSingleScalarResult();
		return $count;
	}

	public function getRelativeTotalRows(array $where = array(), array $sortBy = array(), $limit = 10, $offset = 0) {
		$repo = self::getRepository();

		$qb = $repo->createQueryBuilder('c');
		$qb->select('count(c.id)')
			->innerJoin('c.state', 's');

        if (!empty($sortBy)) {
        	$order = 'ASC';

        	if ($sortBy['reverse'])
        		$order = 'DESC';

        	if ($sortBy['predicate'] == 'code') {
        		$qb->orderBy('s.code', $order);
        	} else {
        		$qb->orderBy('c.' . $sortBy['predicate'], $order);
        	}

        }

		if (!empty($where)) {
        	$counter = 0;
        	$qbLike = $this->em->createQueryBuilder();
        	foreach($where as $w) {
        		$table = 'c';
        		if ($w['key'] == 'state') {
        			$table = 's';
        			$w['key'] = 'code';
        		}

        		if ($counter == 0) {
        			$qb->where($qbLike->expr()->like($table . '.' . $w['key'], $qbLike->expr()->literal('%' . $w['value'] . '%')));
        		} else {
        			$qb->orWhere($qbLike->expr()->like($table . '.' . $w['key'], $qbLike->expr()->literal('%' . $w['value'] . '%')));
        		}
        		$counter++;
        	}

        }

        $count = $qb->getQuery()->getSingleScalarResult();

        return $count;
	}

	public function getList(array $where = array(), array $sortBy = array(), $limit = 10, $offset = 0)
	{
		$repo = self::getRepository();

		$qb = $repo->createQueryBuilder('c');
		$qb->select('c.id', 'c.name', 's.code')
			->innerJoin('c.state', 's');

        if (!empty($sortBy)) {
        	$order = 'ASC';

        	if ($sortBy['reverse'])
        		$order = 'DESC';

        	if ($sortBy['predicate'] == 'code') {
        		$qb->orderBy('s.code', $order);
        	} else {
        		$qb->orderBy('c.' . $sortBy['predicate'], $order);
        	}

        }

		if (!empty($where)) {
        	$counter = 0;
        	$qbLike = $this->em->createQueryBuilder();
        	foreach($where as $w) {
        		$table = 'c';
        		if ($w['key'] == 'state') {
        			$table = 's';
        			$w['key'] = 'code';
        		}

        		if ($counter == 0) {
        			$qb->where($qbLike->expr()->like($table . '.' . $w['key'], $qbLike->expr()->literal('%' . $w['value'] . '%')));
        		} else {
        			$qb->orWhere($qbLike->expr()->like($table . '.' . $w['key'], $qbLike->expr()->literal('%' . $w['value'] . '%')));
        		}
        		$counter++;
        	}

        }


        $qb->setFirstResult($offset)
       		->setMaxResults($limit);

        $result = $qb->getQuery()
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

		return $result;
	}

	public function prepareDataToInsert(array $data)
    {
    	return $data;
    }

	public function prepareDataToUpdate(array $data)
	{
		return $data;
	}
}