<?php
namespace DAAcl\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DAAcl\Entity\Resource;

class LoadResource extends AbstractFixture implements OrderedFixtureInterface
{

	public function load(ObjectManager $manager)
        {
                $resource = new Resource;
                $resource->setName('general');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('cities');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('companyCategories');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('companyTypes');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('goodTags');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('people');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('states');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('bankAccounts');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('creditAccounts');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('moneyAccounts');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('payments');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('taxes');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('evaluationRatings');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('evaluations');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('timePunchClocks');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('burdens');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('orgDepartments');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('occupations');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('copartners');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('employees');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('candidates');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('curriculums');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('syndicates');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('trainings');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('benefits');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('salaries');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('devolutions');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('discrepancies');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('locations');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('reservations');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('places');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('storages');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('warehouses');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('manufacturers');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('matrix');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('subsidiaries');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('expenseCategories');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('expenseOrders');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('productionOrders');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('processes');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('productProcesses');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('rawMaterials');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('productions');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('rentalOrders');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('saleOrders');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('orderExpenses');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('orderRentals');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('orderSales');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('serviceOrders');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('orderServices');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('storeOrders');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('orderStores');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('productCategories');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('productDepartments');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('productFeatures');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('productFeatureGroups');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('products');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('productRatings');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('coupons');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('marketPromotions');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('storePromotions');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('services');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('shippers');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('timelyRatings');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('budgets');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('productBudgets');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('qualityRatings');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('suppliers');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('modules');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('activate');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('login');
                $manager->persist($resource);

                $resource = new Resource;
                $resource->setName('users');
                $manager->persist($resource);

		$manager->flush();
	}

	public function getOrder() 
        {
		return 2;
	}
}
