<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal;

use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Authorization;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Bank;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\BankAccount;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Charge;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\ConsumerUnity;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Document;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Email;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Holder;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Occurrence;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Parcel;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Parcels;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Phone;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Purchaser;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Seller;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Sequence;
use MrPrompt\BoletoCaixaEconomicaFederal\Shipment\Partial\Detail;
use DateTime;

/**
 * Caixa Economica Federal Factory
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
abstract class Factory
{
    /**
     * @param array $campos
     * @return Document
     */
    public static function createDocumentFromArray(array $campos = [])
    {
        $document = new Document();
        $document->setType(strlen($campos['documento']) === 11 ? Document::CPF : Document::CNPJ);
        $document->setNumber($campos['documento']);

        return $document;
    }

    /**
     * @param array $campos
     * @return Customer
     */
    public static function createCustomerFromArray(array $campos = [])
    {
        $customer = new Customer();
        $customer->setCode($campos['cliente']);
        $customer->setIdentityNumber($campos['identificador']);

        return $customer;
    }

    /**
     * @param array $campos
     * @return Charge
     */
    public static function createChargeFromArray(array $campos = [])
    {
        $charge = new Charge();
        $charge->setCharging($campos['cobranca']);
        $charge->setOccurrence(self::createOccurrenceFromArray($campos));

        return $charge;
    }

    /**
     * @param array $campos
     * @return ConsumerUnity
     */
    public static function createConsumerUnityFromArray(array $campos = [])
    {
        $consumerUnity  = new ConsumerUnity();

        if (array_key_exists('energia', $campos)) {
            $leitura    = DateTime::createFromFormat('dmY', $campos['energia']['leitura']);
            $vencimento = DateTime::createFromFormat('dmY', $campos['energia']['vencimento']);

            $consumerUnity->setRead($leitura);
            $consumerUnity->setMaturity($vencimento);
            $consumerUnity->setNumber($campos['energia']['numero']);
            $consumerUnity->setCode($campos['energia']['concessionaria']);
        }

        return $consumerUnity;
    }

    /**
     * @param array $campos
     * @return Occurrence
     */
    public static function createOccurrenceFromArray(array $campos = [])
    {
        $occurrence = new Occurrence();

        if (array_key_exists('ocorrencia', $campos)) {
            $occurrence->setType($campos['ocorrencia']);
        }

        return $occurrence;
    }

    /**
     * @param int $number
     * @param int $type
     * @return Phone
     */
    public static function createPhone($number, $type = Phone::TELEPHONE)
    {
        $phone = new Phone();
        $phone->setNumber($number);
        $phone->setType($type);

        return $phone;
    }

    /**
     * @param array $campos
     * @return Person
     */
    public static function createPersonFromArray(array $campos = [])
    {
        $person = new Person();
        $person->setName($campos['nome']);
        $person->setCellPhone(self::createPhone($campos['celular'], Phone::CELLPHONE));
        $person->setHomePhone(self::createPhone($campos['telefone1'], Phone::TELEPHONE));
        $person->setHomePhoneSecondary(self::createPhone($campos['telefone2'], Phone::TELEPHONE));
        $person->setDocument(self::createDocumentFromArray($campos['comprador']));
        $person->setEmail($campos['email']);
        $person->setFatherName($campos['pai']);
        $person->setMotherName($campos['mae']);

        return $person;
    }

    /**
     * @param array $campos
     * @return Holder
     */
    public static function createHolderFromArray(array $campos = [])
    {
        $person = new Holder();

        if (array_key_exists('titular', $campos)) {
            $person->setName($campos['titular']['nome']);
            $person->setCellPhone($campos['titular']['celular']);
            $person->setDocument(self::createDocumentFromArray($campos['titular']));
            $person->setEmail($campos['titular']['email']);
            $person->setFatherName($campos['titular']['pai']);
            $person->setMotherName($campos['titular']['mae']);
        }

        return $person;
    }

    /**
     * @param array $campos
     * @return Address
     */
    public static function createAddressFromArray(array $campos = [])
    {
        $address = new Address();
        $address->setNumber($campos['numero']);
        $address->setAddress($campos['logradouro']);
        $address->setComplement($campos['complemento']);
        $address->setDistrict($campos['bairro']);
        $address->setPostalCode($campos['cep']);
        $address->setCity($campos['cidade']);
        $address->setState($campos['uf']);

        return $address;
    }

    /**
     * @param array $campos
     * @return BankAccount
     */
    public static function createBankAccountFromArray(array $campos = [])
    {
        $holder     = new Holder();
        $bank       = new Bank();
        $account    = new BankAccount($bank, $holder);

        if (array_key_exists('banco', $campos)) {
            $bank->setAgency($campos['banco']['agencia']);
            $bank->setDigit($campos['banco']['digito']);
            $bank->setCode($campos['banco']['codigo']);

            $account->setDigit($campos['banco']['conta']['digito']);
            $account->setNumber($campos['banco']['conta']['numero']);
            $account->setOperation($campos['banco']['conta']['operacao']);

            if (array_key_exists('seguro', $campos['banco']['conta'])) {
                $account->setSecurity($campos['banco']['conta']['seguro']);
            }

            if (array_key_exists('titular', $campos['banco']['conta'])) {
                $account->setHolder(self::createHolderFromArray($campos['banco']['conta']['titular']));
            }
        }

        return $account;
    }

    /**
     * @param array $campos
     * @return Purchaser
     */
    public static function createPurchaserFromArray(array $campos = [])
    {
        $purchaser  = new Purchaser();

        if (array_key_exists('comprador', $campos)) {
            $document   = self::createDocumentFromArray($campos['comprador']);
            $address    = self::createAddressFromArray($campos['comprador']['endereco']);
            $birth      = DateTime::createFromFormat('dmY', $campos['comprador']['nascimento']);

            $purchaser->setName($campos['comprador']['nome']);
            $purchaser->setCellPhone(self::createPhone($campos['comprador']['celular'], Phone::CELLPHONE));
            $purchaser->setHomePhone(self::createPhone($campos['comprador']['telefone1'], Phone::TELEPHONE));
            $purchaser->setHomePhoneSecondary(self::createPhone($campos['comprador']['telefone2'], Phone::TELEPHONE));
            $purchaser->setDocument($document);
            $purchaser->setEmail(self::createEmail($campos['comprador']['email']));
            $purchaser->setBirth($birth);
            $purchaser->setAddress($address);
            $purchaser->setPerson($campos['comprador']['pessoa']);
        }

        return $purchaser;
    }

    /**
     * @param $address
     * @return Email
     */
    public static function createEmail($address)
    {
        return new Email($address, true);
    }

    /**
     * @param array $campos
     * @return CreditCard
     */
    public static function createCreditCardFromArray(array $campos = [])
    {
        $creditCard = new CreditCard();

        if (array_key_exists('cartao', $campos)) {
            $creditCard->setSecurityNumber($campos['cartao']['seguranca']);
            $creditCard->setValidate(DateTime::createFromFormat('mY', $campos['cartao']['validade']));
            $creditCard->setNumber($campos['cartao']['numero']);
            $creditCard->setFlag($campos['cartao']['bandeira']);
        }

        return $creditCard;
    }

    /**
     * @param array $campos
     * @return \SplFixedArray
     */
    public static function createParcelsFromArray(array $campos = [])
    {
        $parcels = new Parcels(count($campos['parcelas']));
        $key     = 1;

        foreach ($campos['parcelas'] as $parcela) {
            /* @var $maturity \DateTime */
            $maturity = DateTime::createFromFormat('dmY', $parcela['vencimento']);

            $parcelOne = new Parcel();
            $parcelOne->setKey($key);
            $parcelOne->setPrice($parcela['valor']);
            $parcelOne->setQuantity($parcela['quantidade']);

            if ($maturity) {
                $parcelOne->setMaturity($maturity);
            }

            if ($parcela['situacao']) {
                $parcelOne->setStatus($parcela['situacao']);
            }

            $parcels->addParcel($parcelOne);

            $key++;
        }

        return $parcels;
    }

    /**
     * @param array $campos
     * @return Seller
     */
    public static function createSellerFromArray(array $campos = [])
    {
        $seller = new Seller();

        if (array_key_exists('vendedor', $campos)) {
            $seller = new Seller();
            $seller->setCode($campos['vendedor']['codigo']);
            $seller->setName($campos['vendedor']['nome']);
            $seller->setDocument(static::createDocumentFromArray($campos['vendedor']));
            $seller->setAddress(static::createAddressFromArray($campos['vendedor']['endereco']));
        }

        return $seller;
    }

    /**
     * @param array $campos
     * @return Authorization
     */
    public static function createAuthorizationFromArray(array $campos = [])
    {
        $authorization = new Authorization();

        if (array_key_exists('autorizacao', $campos)) {
            $authorization->setNumber($campos['autorizacao']);
        }

        return $authorization;
    }

    /**
     * @param array $campos
     * @return Billet
     */
    public static function createBilletFromArray(array $campos = [])
    {
        $billet = new Billet();

        if (array_key_exists('boleto', $campos)) {
            $billet->setBankAccount(self::createBankAccountFromArray($campos['boleto']));
            $billet->setNumber($campos['boleto']['documento']);
        }

        return $billet;
    }

    /**
     * Create a cart item object
     *
     * @param array $campos
     * @return Detail
     */
    public static function createDetailFromArray(array $campos = [])
    {
        $sequence       = new Sequence();
        $customer       = self::createCustomerFromArray($campos);
        $charge         = self::createChargeFromArray($campos);
        $purchaser      = self::createPurchaserFromArray($campos);
        $parcels        = self::createParcelsFromArray($campos);
        $authorization  = self::createAuthorizationFromArray($campos);
        $billet         = self::createBilletFromArray($campos);
        $seller         = self::createSellerFromArray($campos);
        $detail         = new Detail(
            $customer,
            $charge,
            $seller,
            $purchaser,
            $parcels,
            $authorization,
            $billet,
            $sequence
        );

        return $detail;
    }
}