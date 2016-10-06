<?php 
namespace DAModules\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ModulesLoad extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$modules = [
			'SITE',
			'ERP'
		];

		$collModules = new \Doctrine\Common\Collections\ArrayCollection;

		foreach($modules as $module) {
			$module = new \DAModules\Entity\Module(array('name' => $module));
			$manager->persist($module);
			$collModules->add($module);
		}

		$repoUser = $manager->getRepository('DACore\Entity\User\UserInterface');

		$allUsers = $repoUser->findAll();

		foreach($allUsers as $user) {
			$user->setModules($collModules);
			$manager->persist($user);
		}

		$manager->flush();
	}

	public function getOrder()
	{
		return 4;
	}
}