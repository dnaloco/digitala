<?php
namespace DAUser\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AdminLoad extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$repoRole = $manager->getRepository('DAAcl\Entity\Role');
		$admin = $repoRole->findOneBy(array('name' => 'admin'));

		$roles = new \Doctrine\Common\Collections\ArrayCollection();
		$roles->add($admin);

		$userAdmin = new \DAUser\Entity\User([
			'user' => 'arthur_scosta@yahoo.com.br',
			'password' => 'artdna',
			'roles' => $roles,
			'active' => true,
			'person' => new \DABase\Entity\Person([
				'name' => 'Arthur Santos Costa',
				'gender' => 'male',
				'birthdate' => new \DateTime('1984-09-01'),
				'website' => 'http://www.agenciadigitala.com.br'
			])
		]);

		$manager->persist($userAdmin);
		$manager->flush();
	}

	public function getOrder()
	{
		return 3;
	}
}