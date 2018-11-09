<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Shipment\Partial;

use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Sequence;
use DateTime;

/**
 * File header
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Header
{
    /**
     * Customer Code
     *
     * @var Customer
     */
    private $customer;

    /**
     * File date creation
     *
     * @var DateTime
     */
    private $created;

    /**
     * Sequencial number of file
     *
     * @var Sequence
     */
    private $sequence;

    /**
     * Constructor
     *
     * @param Customer $customer
     * @param Sequence $sequence
     * @param DateTime $created
     */
    public function __construct(Customer $customer, Sequence $sequence, DateTime $created)
    {
        $this->customer = $customer;
        $this->sequence = $sequence;
        $this->created  = $created;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     */
    public function setCreated(DateTime $created)
    {
        $this->created = $created;
    }

    /**
     * @return Sequence
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * @param Sequence $sequence
     */
    public function setSequence(Sequence $sequence)
    {
        $this->sequence = $sequence;
    }
}
