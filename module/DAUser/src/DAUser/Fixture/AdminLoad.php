<?php
namespace DAUser\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AdminLoad extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$repoRole = $manager->getRepository('DACore\IEntities\Acl\RoleInterface');
		$admin = $repoRole->findOneBy(array('name' => 'admin'));

		$roles = new \Doctrine\Common\Collections\ArrayCollection();
		$roles->add($admin);

		$person1 = new \DABase\Entity\Person([
			'name' => 'Arthur Santos Costa',
			'gender' => 'male',
			'birthdate' => new \DateTime('1984-09-01'),
			'website' => 'http://www.agenciadigitala.com.br'
		]);

		$userAdmin1 = new \DAUser\Entity\User([
			'user' => 'arthur_scosta@yahoo.com.br',
			'password' => 'artdna',
			'roles' => $roles,
			'active' => true,
			'person' => $person
		]);

		$manager->persist($userAdmin1);

		$person1->setUser($userAdmin1);

		$manager->merge($person1);



		$person2 = new \DABase\Entity\Person([
			'name' => 'Domingos Alves da Costa',
			'gender' => 'male',
			'birthdate' => new \DateTime('1950-06-05'),
			'website' => 'http://www.domingos.com.br'
		]);

		$userAdmin2 = new \DAUser\Entity\User([
			'user' => 'domingos@email.com',
			'password' => '123456',
			'roles' => $roles,
			'active' => true,
			'person' => $person
		]);

		$manager->persist($userAdmin2);

		$person2->setUser($userAdmin2);

		$manager->merge($person2);

		$manager->flush();
	}

	public function getOrder()
	{
		return 3;
	}
}