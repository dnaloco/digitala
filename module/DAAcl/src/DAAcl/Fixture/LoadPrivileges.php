<?php
namespace DAAcl\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DAAcl\Entity\Resource;

class LoadPrivileges extends AbstractFixture implements OrderedFixtureInterface
{

        const PRIVLEGES = [
                'VIEW' => 'view',
                'CREATE' => 'create',
                'UPDATE' => 'update',
                'DELETE' => 'delete'
        ];

	public function load(ObjectManager $manager)
        {
                $daaclEntity == 'DAAcl\Entity';
                $roleEntity = $daaclEntity . '\Role';
                $resourceEntity = $daaclEntity . '\Resource';
                $privilegeEntity = $daaclEntity . '\Privilege';
                
                $guestRole = $manager->getReference($roleEntity, 1);
                
                $generalResource = $manager->getReference($resourceEntity, 1);
                $citiesResource = $manager->getReference($resourceEntity, 2);

                $viewPrivilege = new Privilege;
                $viewPrivilege->setNome(self::PRIVLEGES['VIEW']);

                $viewPrivilege->setRole($guestRole)->setResource($generalResource);
                $viewPrivilege->setRole($guestRole)->setResource($citiesResource);

                $manager->persist($viewPrivilege);

                $manager->flush();

	}

	public function getOrder() 
        {
		return 1;
	}
}
