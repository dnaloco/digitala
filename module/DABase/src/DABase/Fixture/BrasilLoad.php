<?php 
namespace DABase\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class BrasilLoad extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$sql = file_get_contents(getcwd() . '/data/sql/queryCountries.sql');
		$stmt = $manager->getConnection()->prepare($sql);
		$stmt->execute();
	}

	public function getOrder()
	{
		return 1;
	}
}