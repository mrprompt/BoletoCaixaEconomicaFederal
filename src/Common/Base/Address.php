<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Validator;

/**
 * Address
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Address
{
    /**
     * City
     *
     * @var string
     */
    private $city;

    /**
     * State
     *
     * @var string
     */
    private $state;

    /**
     * Postal Code - CEP
     *
     * @var mixed
     */
    private $postalCode;

    /**
     *
     * @var string
     */
    private $address;

    /**
     *
     * @var int
     */
    private $number;

    /**
     *
     * @var string
     */
    private $district;

    /**
     *
     * @var string
     */
    private $complement;

    /**
     * @return the $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        try {
            Validator::create()->length(null, 200)->assert($city);

            $this->city = $city;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid city name: %s', $city));
        }
    }

    /**
     * @return the $state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        try {
            Validator::create()->length(null, 2)->assert($state);

            $this->state = $state;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid state value: %s', $state));
        }
    }

    /**
     * @return the $postalCode
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        try {
            Validator::notEmpty()->length(8, 8)->assert($postalCode);

            $this->postalCode = $postalCode;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid postal code: "%s"', $postalCode));
        }
    }

    /**
     * @return the $address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        try {
            Validator::create()->length(null, 140)->assert($address);

            $this->address = $address;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid address: "%s"', $address));
        }
    }

    /**
     * @return the $number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param number $number
     */
    public function setNumber($number)
    {
        try {
            $number = trim($number);

            Validator::create()->numeric()->assert($number);

            $this->number = $number;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid address number %s', $number));
        }

    }

    /**
     * @return the $district
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param string $district
     */
    public function setDistrict($district)
    {
        try {
            Validator::create()->length(null, 200)->assert($district);

            $this->district = $district;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('District %s is invalid', $district));
        }
    }

    /**
     * @return the $complement
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * @param string $complement
     */
    public function setComplement($complement)
    {
        try {
            Validator::create()->length(null, 150)->assert($complement);

            $this->complement = $complement;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Complement %s is invalid', $complement));
        }
    }
}
