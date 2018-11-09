<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Validator;

/**
 * E-mail
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Email
{
    /**
     * @var string
     */
    private $address;

    /**
     * @var boolean
     */
    private $primary;

    /**
     * @param string $address
     * @param bool $primary
     */
    public function __construct($address, $primary = true)
    {
        $this->setAddress($address);
        $this->setPrimary($primary);
    }

    /**
     * @return string
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
            Validator::notEmpty()->email()->assert($address);

            $this->address = $address;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(
                sprintf('E-mails address "%s" is invalid', $address)
            );
        }
    }

    /**
     * @return boolean
     */
    public function isPrimary()
    {
        return $this->primary;
    }

    /**
     * @return boolean
     */
    public function getPrimary()
    {
        return $this->primary;
    }

    /**
     * @param boolean $primary
     */
    public function setPrimary($primary)
    {
        try {

            Validator::notEmpty()->boolType()->assert($primary);

            $this->primary = $primary;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(
                sprintf('The primary only accept boolean value, %s is invalid', $primary)
            );
        }
    }
}