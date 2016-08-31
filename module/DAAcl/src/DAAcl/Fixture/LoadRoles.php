<?php
namespace DAAcl\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DAAcl\Entity\Role;

class LoadRole extends AbstractFixture implements OrderedFixtureInterface
{

	public function load(ObjectManager $manager)
        {
                // GUEST
                $role = new Role;
                $role->setName("guest");
                $manager->persist($role);

                $manager->persist($role);


		$manager->flush();
	}

	public function getOrder() 
        {
		return 1;
	}
}
