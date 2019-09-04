<?php


namespace MrPrompt\BoletoCaixaEconomicaFederal\Shipment;

use DateTime;
use MrPrompt\ShipmentCommon\Base\Customer;
use MrPrompt\ShipmentCommon\Base\Sequence;
use MrPrompt\ShipmentCommon\Util\Number;

/**
 * Class FileNameCreator
 * @package MrPrompt\BoletoCaixaEconomicaFederal\Shipment
 */
class FileNameCreator
{
    /**
     * File name template
     *
     * @var string
     */
    const TEMPLATE_GENERATED = '{CLIENT}_{DDMMYYYY}_{SEQUENCE}.HTML';

    /**
     * @var array
     */
    private $search = [
        '{CLIENT}',
        '{DDMMYYYY}',
        '{SEQUENCE}'
    ];

    /**
     * @param Customer $customer
     * @param Sequence $sequence
     * @param DateTime $now
     * @return mixed
     */
    public function create(Customer $customer, Sequence $sequence, DateTime $now)
    {
        $replace = [
            Number::zeroFill($customer->getCode(), 6, Number::FILL_LEFT),
            $now->format('dmY'),
            Number::zeroFill($sequence->getValue(), 5, Number::FILL_LEFT),
        ];

        return str_replace($this->search, $replace, self::TEMPLATE_GENERATED);
    }
}