<?php
namespace DABase\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CitiesLoad extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		//echo getcwd() . '           '; die();
		$sql1 = file_get_contents(getcwd() . '/data/sql/queryCities01.sql');
		$stmt1 = $manager->getConnection()->prepare($sql1);
		$stmt1->execute();

		$sql2 = file_get_contents(getcwd() . '/data/sql/queryCities02.sql');
		$stmt2 = $manager->getConnection()->prepare($sql2);
		$stmt2->execute();

		$sql3 = file_get_contents(getcwd() . '/data/sql/queryCities03.sql');
		$stmt3 = $manager->getConnection()->prepare($sql3);
		$stmt3->execute();

		$sql4 = file_get_contents(getcwd() . '/data/sql/queryCities04.sql');
		$stmt4 = $manager->getConnection()->prepare($sql4);
		$stmt4->execute();
	}

	public function getOrder()
	{
		return 3;
	}
}