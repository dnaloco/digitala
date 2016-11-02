<?php
namespace DAErp\Entity\Financial;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use DACore\IEntities\Erp\Financial\TaxInterface;

/**
 *
 * @ORM\Table(name="daerp_financial_taxes")
 * @ORM\Entity
 */
class Tax implements TaxInterface
{
	/**
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=60, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="rate", type="decimal", precision=7, scale=2, nullable=false)
     */
    private $rate;

    /**
     * @var string
     *
     * @ORM\Column(name="is_federal", type="boolean")
     */
    private $isFederal;

    /**
     * @var string
     *
     * @ORM\Column(name="is_state", type="boolean")
     */
    private $isState;

    /**
     * @var string
     *
     * @ORM\Column(name="is_municipal", type="boolean")
     */
    private $isMunicipal;

    /**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Base\StateInterface")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id", nullable=true)
     **/
    private $state;

    /**
     * @ORM\ManyToOne(targetEntity="DACore\IEntities\Base\CityInterface")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id", nullable=true)
     **/
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="text", nullable=true)
     */
    private $info;
	public function __construct(array $options = array()) {
		(new Hydrator\ClassMethods)->hydrate($options, $this);
	}

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param string $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of rate.
     *
     * @return string
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Sets the value of rate.
     *
     * @param string $rate the rate
     *
     * @return self
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Gets the value of isFederal.
     *
     * @return string
     */
    public function getIsFederal()
    {
        return $this->isFederal;
    }

    /**
     * Sets the value of isFederal.
     *
     * @param string $isFederal the is federal
     *
     * @return self
     */
    public function setIsFederal($isFederal)
    {
        $this->isFederal = $isFederal;

        return $this;
    }

    /**
     * Gets the value of isState.
     *
     * @return string
     */
    public function getIsState()
    {
        return $this->isState;
    }

    /**
     * Sets the value of isState.
     *
     * @param string $isState the is state
     *
     * @return self
     */
    public function setIsState($isState)
    {
        $this->isState = $isState;

        return $this;
    }

    /**
     * Gets the value of isMunicipal.
     *
     * @return string
     */
    public function getIsMunicipal()
    {
        return $this->isMunicipal;
    }

    /**
     * Sets the value of isMunicipal.
     *
     * @param string $isMunicipal the is municipal
     *
     * @return self
     */
    public function setIsMunicipal($isMunicipal)
    {
        $this->isMunicipal = $isMunicipal;

        return $this;
    }

    /**
     * Gets the value of state.
     *
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Sets the value of state.
     *
     * @param mixed $state the state
     *
     * @return self
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Gets the value of city.
     *
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the value of city.
     *
     * @param mixed $city the city
     *
     * @return self
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Gets the value of info.
     *
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Sets the value of info.
     *
     * @param string $info the info
     *
     * @return self
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }
}

