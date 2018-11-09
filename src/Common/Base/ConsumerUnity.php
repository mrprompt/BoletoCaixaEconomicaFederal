<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

use DateTime;
use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Validator;

/**
 * Consumer Unity
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class ConsumerUnity
{
    const BANDEIRANTE       = 1;
    const CPFL              = 3;
    const CPFL_PIRATININGA  = 4;
    const AMPLA             = 5;
    const ESCELSA_ES        = 19;
    const CELESC            = 26;
    const RGE_RS            = 31;
    const COELCE            = 73;

    /**
     * @var array
     */
    private $codes = [
        self::BANDEIRANTE,
        self::CPFL,
        self::CPFL_PIRATININGA,
        self::AMPLA,
        self::ESCELSA_ES,
        self::CELESC,
        self::RGE_RS,
        self::COELCE,
    ];

    /**
     * @var int
     */
    private $number;

    /**
     * @var int
     */
    private $code;

    /**
     * @var DateTime
     */
    private $read;

    /**
     * @var DateTime
     */
    private $maturity;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->read     = new DateTime();
        $this->maturity = new DateTime();
    }

    /**
     * Get the number
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the consumer number
     *
     * @param int $number
     * @return void
     */
    public function setNumber($number)
    {
        try {
            Validator::create()->notEmpty()->assert($number);

            $this->number = $number;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Number of consumer unity %s is invalid', $number));
        }
    }

    /**
     * @return mixed
     */
    public function getRead()
    {
        return $this->read;
    }

    /**
     * @param DateTime $read
     */
    public function setRead(DateTime $read)
    {
        $this->read = $read;
    }

    /**
     * @return DateTime
     */
    public function getMaturity()
    {
        return $this->maturity;
    }

    /**
     * @param DateTime $maturity
     */
    public function setMaturity(DateTime $maturity)
    {
        $this->maturity = $maturity;
    }

    /**
     * @return number
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param number $code
     */
    public function setCode($code)
    {
        try {
            Validator::create()->notEmpty()->numeric()->in($this->codes)->assert($code);

            $this->code = $code;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid consumer unity value %s', $code));
        }
    }
}
