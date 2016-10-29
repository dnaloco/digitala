<?php
namespace DADummyTest\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Collections\ArrayCollection;

class LoadManufacturers extends AbstractFixture implements OrderedFixtureInterface
{
    use \DADummyTest\DummyStrategy\FixtureStrategies;

    public function load(ObjectManager $manager)
    {
        static::setEm($manager);

        $manufacturerType = $manager->getReference('DACore\IEntities\Base\CompanyTypeInterface', 4);

        $arrTypes = new ArrayCollection();
        $arrTypes->add($manufacturerType);

        $company1 = static::getCompany([
            "tradingName"    => "Transportadora Empresa 1",
            "companyName"    => "Transportadora 1 Ltda",
            "category"       => 1,
            "website"        => "http://www.transportadora1.combr",
            'types' => $arrTypes,
            "telephones"     => [
                0 => [
                    "answerable"     => "FAC",
                    "type"           => "mobile",
                    "number"         => '0800123222',
                    "mobileOperator" => "vivo",
                    "DDD"            => 11,
                    "notes"          => "11",
                ],
            ],
            "emails"         => [
                0 => [
                    "answerable" => "Gerencia",
                    "address"    => "gerencia@transportadora1.com.br",
                ],
            ],
            "socialNetworks" => [
                0 => [
                    "type"    => "facebook",
                    "address" => "https://facebook.com/transportadora1",
                ],
            ]
        ]);

        $manufacturer1 = new \DAErp\Entity\Manufacturer\Manufacturer([
            'company' => $company1
        ]);

        $manager->persist($manufacturer1);

        $company2 = static::getCompany([
            "tradingName"    => "Transportadora Empresa 2",
            "companyName"    => "Transportadora 2 Ltda",
            "category"       => 1,
            "website"        => "http://www.transportadora2.combr",
            'types' => $arrTypes,
            "telephones"     => [
                0 => [
                    "answerable"     => "FAC",
                    "type"           => "mobile",
                    "number"         => '0800123222',
                    "mobileOperator" => "vivo",
                    "DDD"            => 11,
                    "notes"          => "11",
                ],
            ],
            "emails"         => [
                0 => [
                    "answerable" => "Gerencia",
                    "address"    => "gerencia@transportadora2.com.br",
                ],
            ],
            "socialNetworks" => [
                0 => [
                    "type"    => "facebook",
                    "address" => "https://facebook.com/transportadora2",
                ],
            ]
        ]);

        $manufacturer2 = new \DAErp\Entity\Manufacturer\Manufacturer([
            'company' => $company2
        ]);

        $manager->persist($manufacturer2);

        $company3 = static::getCompany([
            "tradingName"    => "Transportadora Empresa 3",
            "companyName"    => "Transportadora 3 Ltda",
            "category"       => 1,
            "website"        => "http://www.transportadora3.combr",
            'types' => $arrTypes,
            "telephones"     => [
                0 => [
                    "answerable"     => "FAC",
                    "type"           => "mobile",
                    "number"         => '0800123222',
                    "mobileOperator" => "vivo",
                    "DDD"            => 11,
                    "notes"          => "11",
                ],
            ],
            "emails"         => [
                0 => [
                    "answerable" => "Gerencia",
                    "address"    => "gerencia@transportadora3.com.br",
                ],
            ],
            "socialNetworks" => [
                0 => [
                    "type"    => "facebook",
                    "address" => "https://facebook.com/transportadora3",
                ],
            ]
        ]);

        $manufacturer3 = new \DAErp\Entity\Manufacturer\Manufacturer([
            'company' => $company3
        ]);

        $manager->persist($manufacturer3);

        $manager->flush();
    }

    public function getOrder()
    {
        return 4;
    }
}

/*        */