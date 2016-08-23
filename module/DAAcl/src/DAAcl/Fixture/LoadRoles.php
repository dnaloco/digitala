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

                // CMS ROLES
                // guest cms role
		$role = new Role;
		$role->setName("cms.guest");
		$manager->persist($role);
		$guest = $manager->getReference('DAAcl\Entity\Role', 1);

                // staff cms role
		$role = new Role;
                $role->setNome("cms.staff")
                        ->setParent($guest);
                $manager->persist($role);
                $staff = $manager->getReference('DAAcl\Entity\Role', 2);

                // editor cms role
                $role = new Role;
                $role->setNome("cms.editor")
                        ->setParent($staff);
                $manager->persist($role);
                $editor = $manager->getReference('DAAcl\Entity\Role', 3);


                // CRM ROLES
                // guest crm role
                $role = new Role;
                $role->setName("crm.guest");
                $manager->persist($role);
                $guest = $manager->getReference('DAAcl\Entity\Role', 4);

                // staff crm role
                $role = new Role;
                $role->setNome("crm.staff")
                        ->setParent($guest);
                $manager->persist($role);
                $staff = $manager->getReference('DAAcl\Entity\Role', 5);

                // manager crm role
                $role = new Role;
                $role->setNome("crm.manager")
                        ->setParent($staff);
                $manager->persist($role);
                $manager = $manager->getReference('DAAcl\Entity\Role', 6);


                // ERP ROLES
                // guest erp role
                $role = new Role;
                $role->setName("erp.guest");
                $manager->persist($role);
                $guest = $manager->getReference('DAAcl\Entity\Role', 7);

                $role = new Role;
                $role->setNome("erp.manager")
                        ->setParent($guest);
                $manager->persist($role);
                $staff = $manager->getReference('DAAcl\Entity\Role', 8);

                $role = new Role;
                $role->setNome("erp.editor")
                        ->setParent($staff);
                $manager->persist($role);
                $editor = $manager->getReference('DAAcl\Entity\Role', 9);


                $role = new Role;
                $role->setNome("admin")
                        ->setIsAdmin(true);
                $manager->persist($role);


		$manager->flush();
	}

	public function getOrder() 
        {
		return 1;
	}
}
