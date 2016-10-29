<?php
namespace DADummyTest\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Collections\ArrayCollection;

class LoadSuppliers extends AbstractFixture implements OrderedFixtureInterface
{
    use \DADummyTest\DummyStrategy\FixtureStrategies;

    public function load(ObjectManager $manager)
    {
        static::setEm($manager);

        $manufacturerType = $manager->getReference('DACore\IEntities\Base\CompanyTypeInterface', 4);

        $arrTypes = new ArrayCollection();
        $arrTypes->add($manufacturerType);

        $company1 = static::getCompany([
            "tradingName"    => "Fornecedor Empresa 1",
            "companyName"    => "Fornecedor 1 Ltda",
            "category"       => 1,
            "website"        => "http://www.fornecedor1.combr",
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
                    "address"    => "gerencia@fornecedor1.com.br",
                ],
            ],
            "socialNetworks" => [
                0 => [
                    "type"    => "facebook",
                    "address" => "https://facebook.com/fornecedor1",
                ],
            ]
        ]);

        $supplier1 = new \DAErp\Entity\Manufacturer\Manufacturer([
            'company' => $company1
        ]);

        $manager->persist($supplier1);

        $company2 = static::getCompany([
            "tradingName"    => "Fornecedor Empresa 2",
            "companyName"    => "Fornecedor 2 Ltda",
            "category"       => 1,
            "website"        => "http://www.fornecedor2.combr",
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
                    "address"    => "gerencia@fornecedor2.com.br",
                ],
            ],
            "socialNetworks" => [
                0 => [
                    "type"    => "facebook",
                    "address" => "https://facebook.com/fornecedor2",
                ],
            ]
        ]);

        $supplier2 = new \DAErp\Entity\Manufacturer\Manufacturer([
            'company' => $company3
        ]);

        $manager->persist($supplier2);

        $company3 = static::getCompany([
            "tradingName"    => "Fornecedor Empresa 3",
            "companyName"    => "Fornecedor 3 Ltda",
            "category"       => 1,
            "website"        => "http://www.fornecedor3.combr",
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
                    "address"    => "gerencia@fornecedor3.com.br",
                ],
            ],
            "socialNetworks" => [
                0 => [
                    "type"    => "facebook",
                    "address" => "https://facebook.com/fornecedor3",
                ],
            ]
        ]);

        $supplier3 = new \DAErp\Entity\Manufacturer\Manufacturer([
            'company' => $company3
        ]);

        $manager->persist($supplier3);

        $manager->flush();
    }

    public function getOrder()
    {
        return 4;
    }
}

/*        */