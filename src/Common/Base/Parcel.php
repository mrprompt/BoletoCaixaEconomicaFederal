<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

use DateTime;
use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Validator;

/**
 * Parcel
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Parcel
{
    /**
     *
     * @var DateTime
     */
    private $maturity;

    /**
     *
     * @var float
     */
    private $price;

    /**
     * @var int
     */
    private $key;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var int
     */
    private $status;

    /**
     * @return the $maturity
     */
    public function getMaturity()
    {
        return $this->maturity;
    }

    /**
     * @param \DateTime $maturity
     */
    public function setMaturity(DateTime $maturity)
    {
        $this->maturity = $maturity;
    }

    /**
     * @return the $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        try {
            Validator::create()->numeric()->assert($price);

            $this->price = $price;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid parcel price: %s', $price));
        }
    }

    /**
     * @return int
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param int $key
     */
    public function setKey($key = 0)
    {
        try {
            Validator::numeric()->assert($key);

            $this->key = (int) $key;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid parcel key: %s', $key));
        }
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        try {
            Validator::create()->notEmpty()->numeric()->assert($quantity);

            $this->quantity = $quantity;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid parcel quantity: %s', $quantity));
        }
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
