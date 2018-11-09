<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

use SplFixedArray;

/**
 * Parcels
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Parcels extends SplFixedArray
{
    /**
     * Constructor
     *
     * @param int $quantity
     */
    public function __construct($quantity = 1)
    {
        parent::__construct($quantity);
    }

    /**
     * @param Parcel $parcel
     */
    public function addParcel(Parcel $parcel)
    {
        $this->offsetSet($this->key(), $parcel);
        $this->next();
    }
}
