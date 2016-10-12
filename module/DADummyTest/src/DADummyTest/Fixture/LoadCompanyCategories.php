<?php
namespace DADummyTest\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCompanyCategories extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$compCategoriesArr = [
			'marketing digital',
			'distribuidora de alimentos',
		];

		foreach ($compCategoriesArr as $cat) {
			$cat = new \DABase\Entity\CompanyCategory(array('name' => $cat));
			$manager->persist($cat);
		}

		$manager->flush();
	}

	public function getOrder()
	{
		return 1;
	}
}