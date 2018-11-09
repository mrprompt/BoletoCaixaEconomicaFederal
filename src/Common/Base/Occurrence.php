<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

use DateTime;
use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Validator;

/**
 * Occurrence
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Occurrence
{
    /**
     * Insert ocurrence
     *
     * @const string
     */
    const INSERT = 'I';

    /**
     * Cancel occurrence
     *
     * @const string
     */
    const CANCEL = 'C';

    /**
     * Update occurrence
     *
     * @const string
     */
    const UPDATE = 'A';

    /**
     * Occurrence type
     *
     * @var string
     */
    private $type = self::INSERT;

    /**
     * Occurrence Return Code
     *
     * @var int
     */
    private $return;

    /**
     * Occurrence Description
     *
     * @var string
     */
    private $description;

    /**
     * @var DateTime
     */
    private $date;

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
            Validator::in([self::INSERT, self::CANCEL, self::UPDATE])->assert($type);

            $this->type = $type;
        } catch (AllOfException $e) {
            throw new \InvalidArgumentException(sprintf('Invalid occurrence type: %S', $type));
        }
    }

    /**
     * @return int
     */
    public function getReturn()
    {
        return $this->return;
    }

    /**
     * @param int $return
     */
    public function setReturn($return = 0)
    {
        try {
            Validator::numeric()->assert($return);

            $this->return = $return;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid occurrence return value: %s', $return));
        }
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description = '')
    {
        try {
            Validator::stringType()->assert($description);

            $this->description = $description;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid description: %s', $description));
        }
    }

    /**
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate(DateTime $date)
    {
        $this->date = $date;
    }
}
