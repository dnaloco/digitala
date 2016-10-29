<?php
namespace DADummyTest\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCompanyTypes extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$compTypesArr = [
			'matrix', 'filial', 'manufacturer', 'supplier', 'shipper', 'customer', 'lead', 'contact'
		];

		foreach ($compTypesArr as $type) {
			$type = new \DABase\Entity\CompanyType(array('name' => $type));
			$manager->persist($type);
		}

		$manager->flush();
	}

	public function getOrder()
	{
		return 1;
	}
}