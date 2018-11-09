<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

use InvalidArgumentException;
use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Validator;

/**
 * Client
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Client
{
    /**
     * @var int
     */
    private $code;

    /**
     * @param int $code
     */
    public function __construct($code = null)
    {
        $this->code = $code;
    }

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
            Validator::numeric()->assert($code);

            $this->code = $code;
        } catch (AllOfException $ex) {
            throw new InvalidArgumentException(sprintf('Code must be a numeric value, %s is invalid', $code));
        }
    }
}
