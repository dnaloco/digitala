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

                $resource = new Resource;
                $resource->setName('manufacturers');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('orderStores');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('productCategories');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('productCoupons');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('productDepartments');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('productFeatures');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('productFeatureGroups');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('mixProducts');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('productRatings');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('products');
                $manager->persist($resource);

		$manager->flush();
	}

	public function getOrder() 
        {
		return 2;
	}
}
