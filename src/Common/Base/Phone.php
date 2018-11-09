<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Validator;

/**
 * Phone number
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Phone
{
    /**
     * @const int
     */
    const CELLPHONE = 1;

    /**
     * @const int
     */
    const TELEPHONE = 2;

    /**
     * @var int
     */
    private $number;

    /**
     * @var int
     */
    private $type;

    /**
     * Constructor
     *
     * @param int $type
     */
    public function __construct($type = self::TELEPHONE)
    {
        $this->setType($type);
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber($number)
    {
        try {
            Validator::stringType()->notEmpty()->length(8, 20)->assert($number);

            $this->number = $number;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid phone number: %s', $number));
        }
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        try {
            Validator::intType()->in([self::CELLPHONE, self::TELEPHONE])->assert($type);

            $this->type = $type;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid phone type: %s', $type));
        }
    }
}
