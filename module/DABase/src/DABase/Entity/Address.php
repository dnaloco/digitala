<?php
namespace DABase\Entity;

use DACore\IEntities\Base\AddressInterface;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Endereço
 *
 * @ORM\Table(name="dabase_addresses")
 * @ORM\Entity
 */
class Address implements AddressInterface
{
	/**
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
	protected $id;

	/**
     *
     * tipo de endereco('residential', 'comercial', 'delivery', 'billing', 'work')
     *
     * @ORM\Column(name="type", type="enum_addresstype", nullable=false)
     */
	protected $type;

	/**
     *
     * cidade
	 *
	 * @ORM\ManyToOne(targetEntity="DACore\IEntities\Base\CityInterface")
	 * @ORM\JoinColumn(name="city_id", referencedColumnName="id", nullable=false)
	 */
	protected $city;


	/**
     *
     * logradouro
     *
     * @ORM\Column(name="address_1", type="string", length=200, nullable=false)
     */
	protected $address1;

	/**
     *
     * complemento
     *
     * @ORM\Column(name="address_2", type="string", length=60, nullable=true)
     */
	protected $address2;

	/**
     * número
     *
     * @ORM\Column(name="number", type="integer", nullable=false)
     */
	protected $number;

	/**
     *
     * bairro
     *
     * @ORM\Column(name="residential_area", type="string", length=100, nullable=false)
     */
	protected $residentialArea;

	/**
     *
     * cep
     *
     * @ORM\Column(name="postal_code", type="string", length=15, nullable=false)
     */
	protected $postalCode;

	public function __construct(array $data)
	{
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

  
}