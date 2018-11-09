<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

use InvalidArgumentException;
use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Validator;

/**
 * Seller
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Seller extends Person
{
    /**
     * @var int
     */
    private $code;

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param int $code
     * @return void
     * @throws InvalidArgumentException
     */
    public function setCode($code)
    {
        try {
            Validator::notEmpty()->assert($code);

            $this->code = $code;
        } catch (AllOfException $ex) {
            throw new InvalidArgumentException(sprintf('Invalid seller code %s', $code));
        }
    }
}
