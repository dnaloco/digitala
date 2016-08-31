<?php 
namespace DABase\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class BrasilLoad extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$brasil = new \DABase\Entity\Country(array('name' => 'Brasil', 'code' => 'BRA'));
		$manager->persist($brasil);
		$manager->flush();
	}

	public function getOrder()
	{
		return 1;
	}
}