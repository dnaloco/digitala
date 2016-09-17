<?php
namespace DAAcl\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DAAcl\Entity\Resource;

class LoadResource extends AbstractFixture implements OrderedFixtureInterface
{

	public function load(ObjectManager $manager)
        {
                $resource = new Resource;
                $resource->setName('general');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('cities');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('states');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('modules');
                $manager->persist($resource);

		$manager->flush();
	}

	public function getOrder() 
        {
		return 2;
	}
}
