<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Validator;

/**
 * Holder
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Holder extends Person
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
     */
    public function setCode($code)
    {
        try {
            Validator
                ::create()
                ->notEmpty()
                ->intType()
                ->assert($code);

            $this->code = $code;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Holder code %s is invalid', $code));
        }
    }
}
