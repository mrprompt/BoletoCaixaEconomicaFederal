<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

use ArrayObject;
use MrPrompt\BoletoCaixaEconomicaFederal\Shipment\Partial\Detail;

/**
 * Credit card
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Billet
{
    /**
     * @var ArrayObject
     */
    private $details;

    /**
     * @var float
     */
    private $rate;

    /**
     * @var BankAccount
     */
    private $bankAccount;

    /**
     * @var Seller
     */
    private $assignor;

    /**
     * @var string
     */
    private $number;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->details = new ArrayObject();
    }

    /**
     * @return ArrayObject
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param ArrayObject $details
     */
    public function setDetails(ArrayObject $details)
    {
        $this->details = $details;
    }

    /**
     * @param Detail $detail
     */
    public function addDetail(Detail $detail)
    {
        $this->details->append($detail);
    }

    /**
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    /**
     * @return BankAccount
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * @param BankAccount $bankAccount
     */
    public function setBankAccount(BankAccount $bankAccount)
    {
        $this->bankAccount = $bankAccount;
    }

    /**
     * @return Seller
     */
    public function getAssignor()
    {
        return $this->assignor;
    }

    /**
     * @param Seller $assignor
     */
    public function setAssignor(Seller $assignor)
    {
        $this->assignor = $assignor;
    }

    /**
     * @return string
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
        $this->number = $number;
    }
}
