<?php
namespace DAAcl\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DAAcl\Entity\Role;

class LoadRole extends AbstractFixture implements OrderedFixtureInterface {
	public function load(ObjectManager $manager) {
		$role = new Role;
		$role->setName("cms.guest");
		$manager->persist($role);
		$guest = $manager->getReference('DAAcl\Entity\Role', 1);

		$role = new Role;
        $role->setNome("cms.staff")
                ->setParent($guest);
        $manager->persist($role);
        $staff = $manager->getReference('DAAcl\Entity\Role', 2);

        $role = new Role;
        $role->setNome("cms.editor")
                ->setParent($staff);
        $manager->persist($role);
        $editor = $manager->getReference('DAAcl\Entity\Role', 3);

        $role = new Role;
        $role->setNome("cms.admin")
                ->setIsAdmin(true);
        $manager->persist($role);


		$manager->flush();
	}
	public function getOrder() {
		return 1;
	}
}
