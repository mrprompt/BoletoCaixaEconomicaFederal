<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Validator;

/**
 * Document
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Document
{
    /**
     * CPF - for individual
     *
     * @const int
     */
    const CPF = 1;

    /**
     * CNPJ - for Legal Entity
     *
     */
    const CNPJ = 2;

    /**
     * @var string
     */
    private $type = self::CPF;

    /**
     * @var int
     */
    private $number;

    /**
     * @param int $type
     */
    public function __construct($type = self::CPF)
    {
        $this->setType($type);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        try {
            Validator
                ::numeric()
                ->notEmpty()
                ->in([self::CPF, self::CNPJ])
                ->assert($type);

            $this->type = $type;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid document type: %s', $type));
        }
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        try {
            Validator
                ::stringType()
                ->length(11, 18)
                ->assert($number);

            $this->number = $number;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Document #%s is invalid', $number));
        }
    }
}
