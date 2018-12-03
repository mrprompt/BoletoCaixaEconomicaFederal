<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Shipment\Partial;

use MrPrompt\ShipmentCommon\Base\Authorization;
use MrPrompt\ShipmentCommon\Base\Billet;
use MrPrompt\ShipmentCommon\Base\Charge;
use MrPrompt\ShipmentCommon\Base\Customer;
use MrPrompt\ShipmentCommon\Base\Parcels;
use MrPrompt\ShipmentCommon\Base\Purchaser;
use MrPrompt\ShipmentCommon\Base\Seller;
use MrPrompt\ShipmentCommon\Base\Sequence;

/**
 * File detail
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Detail
{
    /**
     * Customer
     *
     * @var Customer
     */
    private $customer;

    /**
     * Charge
     *
     * @var charge
     */
    private $charge;

    /**
     * Seller
     *
     * @var Seller
     */
    private $seller;

    /**
     * Purchaser
     *
     * @var Purchaser
     */
    private $purchaser;

    /**
     * Parcels
     *
     * @var Parcels
     */
    private $parcels;

    /**
     * Authorization
     *
     * @var Authorization
     */
    private $authorization;

    /**
     * Billet
     *
     * @var Billet
     */
    private $billet;

    /**
     * Sequence
     *
     * @var Sequence
     */
    private $sequence;

    /**
     * Constructor
     *
     * @param Customer $customer
     * @param Charge $charge
     * @param Seller $seller
     * @param Purchaser $purchaser
     * @param Parcels $parcels
     * @param Authorization $authorization
     * @param Billet $billet
     * @param Sequence $sequence
     */
    public function __construct(
        Customer $customer,
        Charge $charge,
        Seller $seller,
        Purchaser $purchaser,
        Parcels $parcels,
        Authorization $authorization,
        Billet $billet,
        Sequence $sequence
    ) {
        $this->customer         = $customer;
        $this->charge           = $charge;
        $this->seller           = $seller;
        $this->purchaser        = $purchaser;
        $this->parcels          = $parcels;
        $this->authorization    = $authorization;
        $this->sequence         = $sequence;
        $this->billet           = $billet;
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
     * @return Charge
     */
    public function getCharge()
    {
        return $this->charge;
    }

    /**
     * @param Charge $charge
     */
    public function setCharge(Charge $charge)
    {
        $this->charge = $charge;
    }

    /**
     * @return Seller
     */
    public function getSeller()
    {
        return $this->seller;
    }

    /**
     * @param Seller $seller
     */
    public function setSeller(Seller $seller)
    {
        $this->seller = $seller;
    }

    /**
     * @return Purchaser
     */
    public function getPurchaser()
    {
        return $this->purchaser;
    }

    /**
     * @param Purchaser $purchaser
     */
    public function setPurchaser(Purchaser $purchaser)
    {
        $this->purchaser = $purchaser;
    }

    /**
     * @return Parcels
     */
    public function getParcels()
    {
        return $this->parcels;
    }

    /**
     * @param Parcels $parcels
     */
    public function setParcels(Parcels $parcels)
    {
        $this->parcels = $parcels;
    }

    /**
     * @return Authorization
     */
    public function getAuthorization()
    {
        return $this->authorization;
    }

    /**
     * @param Authorization $authorization
     */
    public function setAuthorization(Authorization $authorization)
    {
        $this->authorization = $authorization;
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

    /**
     * @return Billet
     */
    public function getBillet()
    {
        return $this->billet;
    }

    /**
     * @param Billet $billet
     */
    public function setBillet(Billet $billet)
    {
        $this->billet = $billet;
    }
}
