<?php 
namespace DAFamilyBudget\Service;

use DACore\Service\AbstractCrudService;

use DACore\Strategy\Core\{DataCheckerStrategyInterface, DataCheckerStrategy};

use DACore\Aware\ApcCacheAwareInterface;

class Category extends AbstractCrudService
	implements
	DataCheckerStrategyInterface,
    ApcCacheAwareInterface
{
	use DataCheckerStrategy;

	private $cache;

	public function getCache($cache = null)
    {
        if(is_null($this->cache)) {
            $this->cache = $cache;
        }

        return $this->cache;
    }

    function getByYearAndMonth($year, $month, $type)
    {
    	$data['user'] = $this->cache->getItem('user');

    	$emConfig = $this->em->getConfiguration();
	    $emConfig->addCustomDatetimeFunction('YEAR', 'DoctrineExtensions\Query\Mysql\Year');
	    $emConfig->addCustomDatetimeFunction('MONTH', 'DoctrineExtensions\Query\Mysql\Month');
	    $emConfig->addCustomDatetimeFunction('DAY', 'DoctrineExtensions\Query\Mysql\Day');
    	$repo = self::getRepository();

    	$qb = $repo->createQueryBuilder('c');

    	$qb->select('c', 'b')
    		->leftJoin('c.billings', 'b')
    		->where('c.type = :type')
    		->andWhere('YEAR(b.paymentDate) = :year')
    		->andWhere('MONTH(b.paymentDate) = :month')
    		->andWhere('c.user = :user');
    		
    	$qb->setParameter('type', $type)
	       ->setParameter('year', $year)
	       ->setParameter('month', $month)
	       ->setParameter('user', $data['user']->getId());

    	$result = $qb->getQuery()->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    	return $result;
    }

    public function prepareData(array $data)
    {
    	unset($data['billings']);

    	$data = array_filter($data);
		$key = 'fb_category';

    	if (isset($data['user']['id'])) {
			$data['user'] = $this->em->getReference('DACore\IEntities\User\UserInterface', $data['user']['id']);
		} else {
			$data['user'] = $this->cache->getItem('user');
			$data['user'] = $this->em->getReference('DACore\IEntities\User\UserInterface', $data['user']->getId());
		}

		if (!isset($data['title'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'title');
		} else {
			$data['title'] = static::checkString($key, $data['title'], 'title');
		}

		if (!isset($data['type'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'type');
		} else {
			$data['type'] = static::checkType($key, 'DAFamilyBudget\Enum\BillingType', $data['type'], 'type');
		}

		if (static::hasErrors()) {
			$data['errors'] = [];
			$data['errors'] = static::getErrors();
		}
		$data = array_filter($data);

		return $data;
    }
}