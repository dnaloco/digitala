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

                $resources = $manager->getRepository('DACore\IEntities\Acl\ResourceInterface')->findAll();

                foreach($resources as $resource) {
                        $viewPrivilege = new Privilege;
                        $viewPrivilege->setName(self::PRIVILEGES['SEE']);
                        $viewPrivilege->setRole($guestRole)->setResource($resource);
                        $manager->persist($viewPrivilege);
                }

                $manager->flush();

	}

	public function getOrder()
        {
		return 3;
	}
}
