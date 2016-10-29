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
        $contacts = [
            1 => [
                'name'           => 'João Carlos Manfred',
                'gender'         => 'male',
                'birthdate'      => '1987-08-01',
                "addresses"      => [
                    0 => [
                        "type"            => "residential",
                        "city"            => 521500,
                        "address1"        => "Avenida Ministro Alvaro de Souza Lima",
                        "address2"        => "Casa 21",
                        "number"          => "599",
                        "residentialArea" => "Bairro dos Limões",
                        "postalCode"      => "04664-020"
                    ],
                ],
                "socialNetworks" => [
                    0 => [
                        "type"    => "facebook",
                        "address" => "https://www.facebook.com/asdas.qweqweqw.4"
                    ],
                    1 => [
                        "type"    => "twitter",
                        "address" => "https://twitter.com/dfgdfgdfgdfg"
                    ],
                ],
                "telephones"     => [
                    0 => [
                        "type"           => "residential",
                        "number"         => "55235634",
                        "DDD"            => "11"
                    ],
                    1 => [
                        "type"           => "mobile",
                        "number"         => "11994543334",
                        "DDD"            => "11",
                        "mobileOperator" => "oi",
                    ],
                ],
                "documents"      => [
                    0 => [
                        "type"   => "rg",
                        "reference" => "4564564564",
                        "field1" => "ssp"
                    ],
                    1 => [
                        "type"   => "cpf",
                        "reference" => '34534534534'
                    ],
                ],
            ],
            1
        ];

        $arrCollContacts = new ArrayCollection();

        foreach ($contacts as $contact) {
            if (is_numeric($contact)) {
                $contact = $manager->getReference('DABase\Entity\Person', $contact);
            } else if (is_array($contact)) {
                $contact = static::getPerson($contact);
            } else {
                throw new \Exception('SHIT');
            }
            $arrCollContacts->add($contact);
        }
        $manufacturerType = $manager->getReference('DACore\IEntities\Base\CompanyTypeInterface', 3);
        $arrTypes = new ArrayCollection();
        $arrTypes->add($manufacturerType);

        $company1 = static::getCompany([
            "tradingName"    => "Fabricante 1 Empresa",
            "companyName"    => "Fabricante 1 Teste Ltda",
            "category"       => 1,
            "website"        => "http://www.fabricante1.combr",
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
                    "address"    => "gerencia@fabricante1.com.br",
                ],
            ],
            "socialNetworks" => [
                0 => [
                    "type"    => "facebook",
                    "address" => "https://facebook.com/fabricante1",
                ],
            ],
            'contacts' => $arrCollContacts
        ]);

        $manufacturer1 = new \DAErp\Entity\Manufacturer\Manufacturer([
            'company' => $company1
        ]);

        $company2 = static::getCompany([
            "tradingName"    => "Fabricante Empresa 2",
            "companyName"    => "Fabricante Teste 2 Ltda",
            "category"       => 1,
            "website"        => "http://www.fabricante2.combr",
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
                    "address"    => "gerencia@fabricante2.com.br",
                ],
            ],
            "socialNetworks" => [
                0 => [
                    "type"    => "facebook",
                    "address" => "https://facebook.com/fabricante2",
                ],
            ],
            'contacts' => $arrCollContacts
        ]);

        $manufacturer2 = new \DAErp\Entity\Manufacturer\Manufacturer([
            'company' => $company2
        ]);

        $manager->persist($manufacturer1);
        $manager->persist($manufacturer2);
        $manager->flush();
    }

    public function getOrder()
    {
        return 4;
    }
}

/*        */