<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

use DateTime;
use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Validator;

/**
 * Credit card
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class CreditCard
{
    const AMEX          = 38;
    const MASTERCARD    = 39;
    const HIPERCARD     = 40;
    const DINNERS       = 41;
    const DISCOVER      = 45;
    const VISA          = 42;
    const AURA          = 51;
    const ELO           = 60;
    const GOODCARD      = 61;
    const JCB           = 62;
    const MAIS          = 63;
    const CABAL         = 64;
    const SOROCRED      = 65;
    const SICREDI       = 66;
    const COOPERCRED    = 67;
    const AVISTA        = 68;

    /**
     * Valid flags
     *
     * @var array
     */
    private $flags = [
        self::AMEX,
        self::MASTERCARD,
        self::HIPERCARD,
        self::DINNERS,
        self::DISCOVER,
        self::VISA,
        self::AURA,
        self::ELO,
        self::GOODCARD,
        self::JCB,
        self::MAIS,
        self::CABAL,
        self::SOROCRED,
        self::SICREDI,
        self::COOPERCRED,
        self::AVISTA
    ];

    /**
     *
     * @var numeric
     */
    private $number;

    /**
     *
     * @var DateTime
     */
    private $validate;

    /**
     *
     * @var numeric
     */
    private $security;

    /**
     * @var numeric
     */
    private $flag;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->validate = new DateTime();
    }

    /**
     * @return the $number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber($number)
    {
        try {
            Validator::create()->notEmpty()->creditCard()->assert($number);

            $this->number = $number;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid credit card number: %s', $number));
        }
    }

    /**
     * @return the $validate
     */
    public function getValidate()
    {
        return $this->validate;
    }

    /**
     * @param DateTime $validate
     */
    public function setValidate(DateTime $validate)
    {
        $this->validate = $validate;
    }

    /**
     * @return the $security
     */
    public function getSecurityNumber()
    {
        return $this->security;
    }

    /**
     * @param string $security
     */
    public function setSecurityNumber($security)
    {
        try {
            Validator::create()->notEmpty()->numeric()->assert($security);

            $this->security = $security;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid security number: %s', $security));
        }
    }

    /**
     * @return string
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * @param string $flag
     */
    public function setFlag($flag)
    {
        try {
            Validator::create()->notEmpty()->numeric()->in($this->flags)->assert($flag);

            $this->flag = $flag;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid flag: %s', $flag));
        }
    }
}
