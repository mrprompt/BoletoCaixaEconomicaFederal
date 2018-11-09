<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Validator;

/**
 * Bank
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Bank
{
    const BANCO_DO_BRASIL           = 30;
    const HSBC                      = 36;
    const SANTANDER                 = 54;
    const CAIXA_ECONOMICA_FEDERAL   = 55;
    const SICRED                    = 79;

    /**
     * @var array
     */
    private $codes = [
        self::BANCO_DO_BRASIL,
        self::HSBC,
        self::SANTANDER,
        self::CAIXA_ECONOMICA_FEDERAL,
        self::SICRED
    ];

    /**
     *
     * @var number
     */
    private $agency;

    /**
     *
     * @var number
     */
    private $digit;

    /**
     *
     * @var number
     */
    private $code;

    /**
     * @return the $agency
     */
    public function getAgency()
    {
        return $this->agency;
    }

    /**
     * Set the agency
     *
     * @param number $agency
     */
    public function setAgency($agency)
    {
        try {
            Validator::create()->numeric()->assert($agency);

            $this->agency = $agency;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid agency %s', $agency));
        }
    }

    /**
     * @return the $agencyDigit
     */
    public function getDigit()
    {
        return $this->digit;
    }

    /**
     * Set the digt
     *
     * @param number $digit
     */
    public function setDigit($digit)
    {
        try {
            Validator::create()->numeric()->assert($digit);

            $this->digit = $digit;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid digit %s', $digit));
        }
    }

    /**
     * @return number
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param number $code
     */
    public function setCode($code)
    {
        try {
            Validator::create()->numeric()->in($this->codes)->assert($code);

            $this->code = $code;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid bank code %s', $code));
        }
    }
}
