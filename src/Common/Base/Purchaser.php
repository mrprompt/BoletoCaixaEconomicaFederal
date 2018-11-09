<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

/**
 * Purchaser
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Purchaser extends Person
{
    /**
     * Fantasy name
     *
     * @var string
     */
    private $purchaserFantasyName;

    /**
     * Social Reason
     *
     * @var string
     */
    private $purchaserSocialReason;

    /**
     * State Registration
     *
     * @var string
     */
    private $purchaserStateRegistration;

    /**
     * @return string
     */
    public function getPurchaserStateRegistration()
    {
        return $this->purchaserStateRegistration;
    }

    /**
     * @param string $purchaserStateRegistration
     */
    public function setPurchaserStateRegistration($purchaserStateRegistration)
    {
        $this->purchaserStateRegistration = $purchaserStateRegistration;
    }

    /**
     * @return the $purchaserFantasyName
     */
    public function getPurchaserFantasyName()
    {
        return $this->purchaserFantasyName;
    }

    /**
     * @param mixed $purchaserFantasyName
     */
    public function setPurchaserFantasyName($purchaserFantasyName)
    {
        $this->purchaserFantasyName = $purchaserFantasyName;
    }

    /**
     * @return the $purchaserSocialReason
     */
    public function getPurchaserSocialReason()
    {
        return $this->purchaserSocialReason;
    }

    /**
     * @param mixed $purchaserSocialReason
     */
    public function setPurchaserSocialReason($purchaserSocialReason)
    {
        $this->purchaserSocialReason = $purchaserSocialReason;
    }
}
