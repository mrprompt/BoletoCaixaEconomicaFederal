<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Validator;

/**
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Customer extends Person
{
    /**
     * @var int
     */
    private $code;

    /**
     * @var int
     */
    private $identityNumber;

    /**
     * @var bool
     */
    private $helpfulMaturity;

    /**
     * @var int
     */
    private $workingDays;

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param int $code
     * @return void
     */
    public function setCode($code)
    {
        try {
            Validator
                ::create()
                ->notEmpty()
                ->assert($code);

            $this->code = $code;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid customer code: %s', $code));
        }
    }

    /**
     * @return int
     */
    public function getIdentityNumber()
    {
        return $this->identityNumber;
    }

    /**
     * @param int $identityNumber
     */
    public function setIdentityNumber($identityNumber)
    {
        try {
            $number = floor($identityNumber);

            Validator
                ::create()
                ->numeric()
                ->assert($number);

            $this->identityNumber = $number;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid identity number: %s', $identityNumber));
        }
    }

    /**
     * @return mixed
     */
    public function getHelpfulMaturity()
    {
        return $this->helpfulMaturity;
    }

    /**
     * @param boolean $helpfulMaturity
     */
    public function setHelpfulMaturity($helpfulMaturity = true)
    {
        try {
            Validator
                ::create()
                ->boolType()
                ->assert($helpfulMaturity);

            $this->helpfulMaturity = $helpfulMaturity;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid helpful maturity state: %s', $helpfulMaturity));
        }
    }

    /**
     * @return int
     */
    public function getWorkingDays()
    {
        return $this->workingDays;
    }

    /**
     * @param int $workingDays
     */
    public function setWorkingDays($workingDays)
    {
        try {
            Validator
                ::create()
                ->notEmpty()
                ->intType()
                ->assert($workingDays);

            $this->workingDays = $workingDays;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid working days: %s', $workingDays));
        }
    }
}
