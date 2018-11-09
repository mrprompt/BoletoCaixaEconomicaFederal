<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Validator;

/**
 * Bank Account
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class BankAccount
{
    /**
     * @var string
     */
    private $account;

    /**
     * @var string
     */
    private $accountDigit;

    /**
     * @var string
     */
    private $accountOperation;

    /**
     * @var boolean
     */
    private $security = false;

    /**
     * @var BankInterface
     */
    private $bank;

    /**
     * @var Person
     */
    private $holder;

    /**
     * @param Bank $bank
     * @param Holder $holder
     */
    public function __construct(Bank $bank, Holder $holder)
    {
        $this->bank     = $bank;
        $this->holder   = $holder;
        $this->security = false;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->account;
    }

    /**
     * @param  int $account
     */
    public function setNumber($account)
    {
        try {
            Validator::create()->numeric()->assert($account);

            $this->account = $account;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid account number: %s', $account));
        }
    }

    /**
     * @return int
     */
    public function getDigit()
    {
        return $this->accountDigit;
    }

    /**
     * @param  int $accountDigit
     */
    public function setDigit($accountDigit)
    {
        try {
            Validator::create()->numeric()->assert($accountDigit);

            $this->accountDigit = $accountDigit;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid account digit: %s', $accountDigit));
        }
    }

    /**
     * @return int
     */
    public function getOperation()
    {
        return $this->accountOperation;
    }

    /**
     * @param  string $accountOperation
     */
    public function setOperation($accountOperation)
    {
        try {
            Validator::create()->numeric()->assert($accountOperation);

            $this->accountOperation = $accountOperation;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid operation: %s', $accountOperation));
        }
    }

    /**
     * @return boolean
     */
    public function getSecurity()
    {
        return $this->security;
    }

    /**
     * @param  boolean $security
     */
    public function setSecurity($security = false)
    {
        try {
            Validator::boolType()->assert($security);

            $this->security = $security;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Security life must be true or false', $security));
        }
    }

    /**
     * @return Bank
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @param Bank $bank
     */
    public function setBank(Bank $bank)
    {
        $this->bank = $bank;
    }

    /**
     * @return Person
     */
    public function getHolder()
    {
        return $this->holder;
    }

    /**
     * @param Holder $holder
     */
    public function setHolder(Holder $holder)
    {
        $this->holder = $holder;
    }
}
