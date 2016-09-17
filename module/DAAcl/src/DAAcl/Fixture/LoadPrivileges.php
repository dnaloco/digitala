<?php
namespace DAAcl\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DAAcl\Entity\Privilege;

class LoadPrivileges extends AbstractFixture implements OrderedFixtureInterface
{

        const PRIVILEGES = [
                'SEE' => 'see',
                'CREATE' => 'create',
                'EDIT' => 'edit',
                'DELETE' => 'delete',
        ];

	public function load(ObjectManager $manager)
        {
                $daaclEntity = 'DAAcl\Entity';
                $roleEntity = $daaclEntity . '\Role';
                $resourceEntity = $daaclEntity . '\Resource';
                $privilegeEntity = $daaclEntity . '\Privilege';

                $guestRole = $manager->getReference($roleEntity, 1);

                $generalResource = $manager->getReference($resourceEntity, 1);
                $citiesResource = $manager->getReference($resourceEntity, 2);
                $statesResource = $manager->getReference($resourceEntity, 3);

                $viewPrivilege = new Privilege;
                $viewPrivilege->setName(self::PRIVILEGES['SEE']);
                $viewPrivilege->setRole($guestRole)->setResource($generalResource);
                $manager->persist($viewPrivilege);

                $viewPrivilege = new Privilege;
                $viewPrivilege->setName(self::PRIVILEGES['SEE']);
                $viewPrivilege->setRole($guestRole)->setResource($citiesResource);
                $manager->persist($viewPrivilege);

                $viewPrivilege = new Privilege;
                $viewPrivilege->setName(self::PRIVILEGES['SEE']);
                $viewPrivilege->setRole($guestRole)->setResource($statesResource);
                $manager->persist($viewPrivilege);

                $manager->flush();

	}

	public function getOrder()
        {
		return 3;
	}
}
