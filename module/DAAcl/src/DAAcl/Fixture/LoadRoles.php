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
                $guest = new Role(['name' => 'guest']);
                $manager->persist($guest);

                $admin = new Role(['name' => 'admin', 'isAdmin' => true]);
                $manager->persist($admin);
                
		$manager->flush();
	}

	public function getOrder() 
        {
		return 1;
	}
}
