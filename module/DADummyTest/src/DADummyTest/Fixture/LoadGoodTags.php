<?php
namespace DADummyTest\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadGoodTags extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$goodTagsArr = [
			'email marketing',
			'leite',
			'arroz',
			'feijão',
			'cereais',
			'facebook ads',
			'twitter ads',
			'criação de sites',
			'papel'
		];

		foreach ($goodTagsArr as $goodTag) {
			$goodTag = new \DABase\Entity\GoodTag(array('name' => $goodTag));
			$manager->persist($goodTag);
		}

		$manager->flush();
	}

	public function getOrder()
	{
		return 1;
	}
}