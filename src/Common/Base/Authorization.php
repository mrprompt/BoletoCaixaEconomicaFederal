<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Validator;

/**
 * Authorization
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Authorization
{
    /**
     * @var int
     */
    private $number;

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
            Validator::length(0, 20)->assert($number);

            $this->number = $number;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid authorization number: %s', $number));
        }
    }
}
