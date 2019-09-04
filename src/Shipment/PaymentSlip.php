<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Shipment;

use DateTime;
use DateInterval;
use OpenBoleto\Agente;
use OpenBoleto\Banco\Caixa;
use MrPrompt\ShipmentCommon\Base\Cart;
use MrPrompt\ShipmentCommon\Util\Number;
use MrPrompt\ShipmentCommon\Base\Customer;
use MrPrompt\ShipmentCommon\Base\Sequence;
use MrPrompt\BoletoCaixaEconomicaFederal\Converter\Pdf;

/**
 * Payment Slip file class
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
final class PaymentSlip
{
    /**
     * @var DateTime
     */
    protected $now;

    /**
     * @var Cart
     */
    protected $cart;

    /**
     * @var Sequence
     */
    protected $sequence;

    /**
     * @var Customer
     */
    protected $customer;

    /**
     * @var string
     */
    protected $storage;

    /**
     * @var FileNameCreator
     */
    private $fileNameCreator;

    /**
     * @param Customer $customer
     * @param Sequence $sequence
     * @param DateTime $today
     * @param string   $storageDir
     */
    public function __construct(Customer $customer, Sequence $sequence, DateTime $today, $storageDir = null)
    {
        $this->fileNameCreator  = new FileNameCreator();
        $this->customer         = $customer;
        $this->sequence         = $sequence;
        $this->now              = $today;
        $this->storage          = $storageDir;
    }

    /**
     * Return the cart
     *
     * @return Cart
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Set the for with the payments
     *
     * @param Cart $cart
     */
    public function setCart(Cart $cart)
    {
        $this->cart = $cart;
    }

    /**
     * Save the output result
     *
     * @return string
     * @throws \Exception
     */
    public function save()
    {
        /* @var $item \BoletoCaixaEconomicaFederal\Gateway\Shipment\Partial\Detail */
        $item       = $this->cart->offsetGet(0);

        /* @var filename string */
        $filename   = $this->fileNameCreator->create($this->customer, $this->sequence, new DateTime());

        /* @var $outputFile string */
        $outputFile = $this->storage . DIRECTORY_SEPARATOR . $filename;

        /* @var $sacado \OpenBoleto\Agente */
        $sacado     = new Agente(
            $item->getPurchaser()->getName(),
            preg_replace('/[^[:digit:]]/', '', $item->getPurchaser()->getDocument()->getNumber()),
            sprintf(
                '%s %s',
                $item->getPurchaser()->getAddress()->getAddress(),
                $item->getPurchaser()->getAddress()->getComplement()
            ),
            $item->getPurchaser()->getAddress()->getPostalCode(),
            $item->getPurchaser()->getAddress()->getCity(),
            $item->getPurchaser()->getAddress()->getState()
        );

        /* @var $cedente \OpenBoleto\Agente */
        $cedente    = new Agente(
            $item->getSeller()->getName(),
            preg_replace('/[^[:digit:]]/', '', $item->getSeller()->getDocument()->getNumber()),
            sprintf(
                '%s %s',
                $item->getSeller()->getAddress()->getAddress(),
                $item->getSeller()->getAddress()->getComplement()
            ),
            $item->getSeller()->getAddress()->getPostalCode(),
            $item->getSeller()->getAddress()->getCity(),
            $item->getSeller()->getAddress()->getState()
        );

        /* @var $content string */
        $content = '';

        /* @var $parcel \BoletoCaixaEconomicaFederal\Common\Base\Parcel */
        foreach ($item->getParcels() as $parcel) {
            /* @var $boleto \OpenBoleto\Banco\Caixa */
            $boleto = new Caixa([
                'dataVencimento'            => $parcel->getMaturity(),
                'valor'                     => $parcel->getPrice(),
                'sequencial'                => $item->getAuthorization()->getNumber(),
                'sacado'                    => $sacado,
                'cedente'                   => $cedente,
                'agencia'                   => $item->getBillet()->getBankAccount()->getBank()->getAgency(),
                'agenciaDv'                 => $item->getBillet()->getBankAccount()->getBank()->getDigit(),
                'carteira'                  => 'RG',
                'conta'                     => $item->getSeller()->getCode(),
                'contaDv'                   => 2,
                'moeda'                     => Caixa::MOEDA_REAL,
                'dataDocumento'             => new DateTime(),
                'dataProcessamento'         => new DateTime(),
                'aceite'                    => 'N',
                'especieDoc'                => 'DM',
                'numeroDocumento'           => sprintf('%s/%s', $item->getBillet()->getNumber(), $this->sequence->getValue()),
                'contraApresentacao'        => false,
                'descricaoDemonstrativo'    => [''],
                'instrucoes'                => [''],
            ]);

            $boleto->setLayout('default-carne.phtml');

            $parcel->getMaturity()->add(new DateInterval('P30D'));

            $item->getAuthorization()->setNumber($item->getAuthorization()->getNumber() + 1);

            $content .= $boleto->getOutput();
        }

        $content = str_replace(
            [
                $item->getBillet()->getBankAccount()->getBank()->getAgency() . '-' . $item->getBillet()->getBankAccount()->getBank()->getDigit(),
                'REAL'
            ],
            [
                $item->getBillet()->getBankAccount()->getBank()->getAgency(),
                'R$'
            ],
            $content
        );

        file_put_contents($outputFile, $content);

        Pdf::convert($content, $outputFile);

        return $outputFile;
    }

    /**
     * Read a return file
     *
     * @return array [Header, Detail, Footer]
     * @throws \Exception
     */
    public function read()
    {
        $filename       = $this->fileNameCreator->create($this->customer, $this->sequence, new DateTime());
        $inputFile      = $this->storage . DIRECTORY_SEPARATOR . $filename;

        return file_get_contents($inputFile);
    }
}
