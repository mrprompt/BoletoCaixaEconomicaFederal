<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Shipment\Partial;

use MrPrompt\ShipmentCommon\Base\Sequence;

/**
 * File footer
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Footer
{
    /**
     * Sequence number
     *
     * @var Sequence
     */
    private $sequence;

    /**
     * Total of new charges
     *
     * @var int
     */
    private $total;

    /**
     * Sum of new charges
     *
     * @var int
     */
    private $sum;

    /**
     * @param int $totalCharges
     * @param int $sumCharges
     * @param Sequence $sequence
     */
    public function __construct($totalCharges = 0, $sumCharges = 0, Sequence $sequence)
    {
        $this->total    = $totalCharges;
        $this->sum      = $sumCharges;
        $this->sequence = $sequence;
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
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param int $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return int
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @param int $sum
     */
    public function setSum($sum)
    {
        $this->sum = $sum;
    }
}
