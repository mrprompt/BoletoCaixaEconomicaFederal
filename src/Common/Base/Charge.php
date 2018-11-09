<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Validator;

/**
 * Charge
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Charge
{
    /**
     * Billet
     *
     * @const string
     */
    const BILLET        = 'B';

    /**
     * Credit card
     *
     * @const string
     */
    const CREDIT_CARD   = 'C';

    /**
     * Debit on bank account
     *
     * @const string
     */
    const DEBIT         = 'D';

    /**
     * Energy account
     *
     * @const string
     */
    const ENERGY        = 'E';

    /**
     * Batch File
     *
     * @const string
     */
    const BATCH_FILE    = 'F';

    /**
     * Payment Slip
     *
     * @const string
     */
    const PAYMENT_SLIP  = 'P';

    /**
     * Charging type
     *
     * Types:
     *  - B = Boleto Bancário
     *  - E = Energia
     *  - C = Cartão de Crédito
     *  - D = Débito Automático
     *  - D = Arquivo de Remessa
     *  - P = Bloqueto
     *
     * @var string
     */
    private $charging   = self::CREDIT_CARD;

    /**
     * Occurrence
     *
     * @var string
     */
    private $occurrence = Occurrence::INSERT;

    /**
     * @return the $charging
     */
    public function getCharging()
    {
        return $this->charging;
    }

    /**
     * @param string $charging
     */
    public function setCharging($charging)
    {
        try {
            $validTypes = [
                self::BILLET,
                self::CREDIT_CARD,
                self::DEBIT,
                self::ENERGY,
                self::BATCH_FILE,
                self::PAYMENT_SLIP
            ];

            Validator::create()->notEmpty()->alpha()->in($validTypes)->assert($charging);

            $this->charging = $charging;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid charge type: %s', $charging));
        }
    }

    /**
     * @return Occurrence
     */
    public function getOccurrence()
    {
        return $this->occurrence;
    }

    /**
     * @param Occurrence $occurrence
     */
    public function setOccurrence(Occurrence $occurrence)
    {
        $this->occurrence = $occurrence;
    }
}
