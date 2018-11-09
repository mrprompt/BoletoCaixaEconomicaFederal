<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Validator;

/**
 * Dealership
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Dealership
{
    /**
     * @var int
     */
    private $code;

    /**
     * @var string
     */
    private $name;

    /**
     * Return the dealeship code
     *
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Dealership code
     *
     * @param int $code
     */
    public function setCode($code)
    {
        try {
            Validator::stringType()->length(null, 6)->assert($code);

            $this->code = $code;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid dealership code: %s', $code));
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        try {
            Validator::create()->notEmpty()->assert($name);

            $this->name = $name;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid dealership name: %s', $name));
        }
    }
}
