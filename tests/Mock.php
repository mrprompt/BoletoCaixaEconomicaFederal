<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Tests;

use MrPrompt\ShipmentCommon\Base\Address;
use MrPrompt\ShipmentCommon\Base\Authorization;
use MrPrompt\ShipmentCommon\Base\Bank;
use MrPrompt\ShipmentCommon\Base\BankAccount;
use MrPrompt\ShipmentCommon\Base\Billet;
use MrPrompt\ShipmentCommon\Base\Charge;
use MrPrompt\ShipmentCommon\Base\ConsumerUnity;
use MrPrompt\ShipmentCommon\Base\CreditCard;
use MrPrompt\ShipmentCommon\Base\Customer;
use MrPrompt\ShipmentCommon\Base\Dealership;
use MrPrompt\ShipmentCommon\Base\Document;
use MrPrompt\ShipmentCommon\Base\Email;
use MrPrompt\ShipmentCommon\Base\Holder;
use MrPrompt\ShipmentCommon\Base\Occurrence;
use MrPrompt\ShipmentCommon\Base\Parcel;
use MrPrompt\ShipmentCommon\Base\Parcels;
use MrPrompt\ShipmentCommon\Base\Person;
use MrPrompt\ShipmentCommon\Base\Phone;
use MrPrompt\ShipmentCommon\Base\Purchaser;
use MrPrompt\ShipmentCommon\Base\Seller;
use MrPrompt\ShipmentCommon\Base\Sequence;
use DateTime;
use Mockery as m;

/**
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
trait Mock
{
    protected function documentMock()
    {
        $document = m::mock(Document::class);

        $document
            ->shouldReceive('getNumber')
            ->andReturn(11111111111)
            ->byDefault();

        $document
            ->shouldReceive('getType')
            ->andReturn(Document::CPF)
            ->byDefault();

        return $document;
    }

    protected function customerMock()
    {
        $customer = m::mock(Customer::class);

        $customer
            ->shouldReceive('getCode')
            ->andReturn(104)
            ->byDefault();

        $customer
            ->shouldReceive('getIdentityNumber')
            ->andReturn(1)
            ->byDefault();

        $customer
            ->shouldReceive('getPerson')
            ->andReturn('F')
            ->byDefault();

        $customer
            ->shouldReceive('getDocument')
            ->andReturn($this->documentMock())
            ->byDefault();

        $customer
            ->shouldReceive('getHelpfulMaturity')
            ->andReturn(true)
            ->byDefault();

        $customer
            ->shouldReceive('getWorkingDays')
            ->andReturn(3)
            ->byDefault();

        return $customer;
    }

    protected function sequenceMock()
    {
        $sequence = m::mock(Sequence::class);

        $sequence
            ->shouldReceive('getValue')
            ->andReturn(1)
            ->byDefault();

        $sequence
            ->shouldReceive('setValue')
            ->andReturnNull()
            ->byDefault();

        return $sequence;
    }

    protected function unityMock()
    {
        $unity = m::mock(ConsumerUnity::class);

        $unity
            ->shouldReceive('getNumber')
            ->andReturn(1)
            ->byDefault();

        $unity
            ->shouldReceive('getRead')
            ->andReturn(new DateTime())
            ->byDefault();

        $unity
            ->shouldReceive('getMaturity')
            ->andReturn(new DateTime())
            ->byDefault();

        return $unity;
    }

    protected function chargeMock()
    {
        $charge = m::mock(Charge::class);

        $charge
            ->shouldReceive('getCharging')
            ->andReturn('D')
            ->byDefault();

        $charge
            ->shouldReceive('getOccurrence')
            ->andReturn($this->occurrenceMock())
            ->byDefault();

        return $charge;
    }

    protected function occurrenceMock()
    {
        $occurrence = m::mock(Occurrence::class);

        $occurrence
            ->shouldReceive('getType')
            ->andReturn('I')
            ->byDefault();

        $occurrence
            ->shouldReceive('getDescription')
            ->andReturn('Foo')
            ->byDefault();

        $occurrence
            ->shouldReceive('getReturn')
            ->andReturn('00')
            ->byDefault();

        return $occurrence;
    }

    protected function addressMock()
    {
        $address = m::mock(Address::class);

        $address
            ->shouldReceive('getCity')
            ->andReturn('Florianópolis')
            ->byDefault();

        $address
            ->shouldReceive('getState')
            ->andReturn('SC')
            ->byDefault();

        $address
            ->shouldReceive('getPostalCode')
            ->andReturn('88090000')
            ->byDefault();

        $address
            ->shouldReceive('getAddress')
            ->andReturn('foo')
            ->byDefault();

        $address
            ->shouldReceive('getNumber')
            ->andReturn('1')
            ->byDefault();

        $address
            ->shouldReceive('getDistrict')
            ->andReturn('shhhh')
            ->byDefault();

        $address
            ->shouldReceive('getComplement')
            ->andReturn('xxxx')
            ->byDefault();

        return $address;
    }

    protected function dealershipMock()
    {
        $dealership = m::mock(Dealership::class);

        $dealership
            ->shouldReceive('getCode')
            ->andReturn('1')
            ->byDefault();

        $dealership
            ->shouldReceive('setCode')
            ->andReturnNull()
            ->byDefault();

        return $dealership;
    }

    protected function sellerMock()
    {
        $seller = m::mock(Seller::class);

        $seller
            ->shouldReceive('getCode')
            ->andReturn('1')
            ->byDefault();

        $seller
            ->shouldReceive('getPerson')
            ->andReturn($this->personMock())
            ->byDefault();

        $seller
            ->shouldReceive('getName')
            ->andReturn('Seller Mock')
            ->byDefault();

        $seller
            ->shouldReceive('getAddress')
            ->andReturn($this->addressMock())
            ->byDefault();

        $seller
            ->shouldReceive('getDocument')
            ->andReturn($this->documentMock())
            ->byDefault();

        return $seller;
    }

    protected function purchaserMock()
    {
        $purchaser = m::mock(Purchaser::class);

        $purchaser
            ->shouldReceive('getCode')
            ->andReturn(1)
            ->byDefault();

        $purchaser
            ->shouldReceive('getPerson')
            ->andReturn('F')
            ->byDefault();

        $purchaser
            ->shouldReceive('getPurchaserFantasyName')
            ->andReturn('Fantasy name')
            ->byDefault();

        $purchaser
            ->shouldReceive('getName')
            ->andReturn('Full name')
            ->byDefault();

        $purchaser
            ->shouldReceive('getPurchaserSocialReason')
            ->andReturn('Social Reason')
            ->byDefault();

        $purchaser
            ->shouldReceive('getPurchaserDocument')
            ->andReturn($this->documentMock())
            ->byDefault();

        $purchaser
            ->shouldReceive('getPurchaserStateRegistration')
            ->andReturn(1)
            ->byDefault();

        $purchaser
            ->shouldReceive('getEmail')
            ->andReturn('test@test.net')
            ->byDefault();

        $purchaser
            ->shouldReceive('getPurchaserBirth')
            ->andReturn(new Datetime())
            ->byDefault();

        $purchaser
            ->shouldReceive('getHomePhone')
            ->andReturn(1)
            ->byDefault();

        $purchaser
            ->shouldReceive('getCellPhone')
            ->andReturn(2)
            ->byDefault();

        $purchaser
            ->shouldReceive('getFatherName')
            ->andReturn('Foo')
            ->byDefault();

        $purchaser
            ->shouldReceive('getMotherName')
            ->andReturn('Bar')
            ->byDefault();

        $purchaser
            ->shouldReceive('getDocument')
            ->andReturn($this->documentMock())
            ->byDefault();

        $purchaser
            ->shouldReceive('getAddress')
            ->andReturn($this->addressMock())
            ->byDefault();

        return $purchaser;
    }

    protected function bankMock()
    {
        $mock = m::mock(Bank::class);

        $mock
            ->shouldReceive('getAgency')
            ->andReturn(1)
            ->byDefault();

        $mock
            ->shouldReceive('getDigit')
            ->andReturn(1)
            ->byDefault();

        $mock
            ->shouldReceive('getDigit')
            ->andReturn(1)
            ->byDefault();

        $mock
            ->shouldReceive('getCode')
            ->andReturn(1)
            ->byDefault();

        return $mock;
    }

    protected function bankAccountMock()
    {
        $bankAccount = m::mock(BankAccount::class);

        $bankAccount
            ->shouldReceive('getHolder')
            ->andReturn('1')
            ->byDefault();

        $bankAccount
            ->shouldReceive('getHolder')
            ->andReturn($this->holderMock())
            ->byDefault();

        $bankAccount
            ->shouldReceive('getBank')
            ->andReturn($this->bankMock())
            ->byDefault();

        $bankAccount
            ->shouldReceive('getNumber')
            ->andReturn(1)
            ->byDefault();

        $bankAccount
            ->shouldReceive('getDigit')
            ->andReturn(1)
            ->byDefault();

        $bankAccount
            ->shouldReceive('getOperation')
            ->andReturn(1)
            ->byDefault();

        $bankAccount
            ->shouldReceive('getSecurity')
            ->andReturn('N')
            ->byDefault();

        return $bankAccount;
    }

    protected function personMock()
    {
        $person = m::mock(Person::class);

        $person
            ->shouldReceive('getName')
            ->andReturn('Name')
            ->byDefault();

        return $person;
    }

    protected function holderMock()
    {
        $person = m::mock(Holder::class);

        $person
            ->shouldReceive('getName')
            ->andReturn('Name')
            ->byDefault();

        return $person;
    }

    protected function parcelMock()
    {
        $parcel = m::mock(Parcel::class);

        $parcel
            ->shouldReceive('getMaturity')
            ->andReturn(new DateTime())
            ->byDefault();

        $parcel
            ->shouldReceive('getPrice')
            ->andReturn(1.00)
            ->byDefault();

        $parcel
            ->shouldReceive('getKey')
            ->andReturn(1)
            ->byDefault();

        $parcel
            ->shouldReceive('getQuantity')
            ->andReturn(1)
            ->byDefault();

        return $parcel;
    }

    protected function parcelsMock()
    {
        $parcel = $this->parcelMock();

        $parcels = new Parcels(4);
        $parcels->addParcel($parcel);
        $parcels->addParcel($parcel);
        $parcels->addParcel($parcel);
        $parcels->addParcel($parcel);

        return $parcels;
    }

    protected function authorizationMock()
    {
        $mock = m::mock(Authorization::class);

        $mock
            ->shouldReceive('getNumber')
            ->andReturn(1)
            ->byDefault();

        $mock
            ->shouldReceive('setNumber')
            ->andReturnNull()
            ->byDefault();

        return $mock;
    }

    protected function creditCardMock()
    {
        $mock = m::mock(CreditCard::class);

        $mock
            ->shouldReceive('getNumber')
            ->andReturn(1)
            ->byDefault();

        $mock
            ->shouldReceive('getValidate')
            ->andReturn(new DateTime())
            ->byDefault();

        $mock
            ->shouldReceive('getSecurityNumber')
            ->andReturn(0)
            ->byDefault();

        return $mock;
    }

    protected function billetMock()
    {
        $mock = m::mock(Billet::class);

        $mock
            ->shouldReceive('getBankAccount')
            ->andReturn($this->bankAccountMock())
            ->byDefault();

        $mock
            ->shouldReceive('getNumber')
            ->andReturn(11111111111)
            ->byDefault();

        return $mock;
    }


    protected function phoneMock()
    {
        $phone = m::mock(Phone::class);

        $phone
            ->shouldReceive('getNumber')
            ->andReturn(11111111111)
            ->byDefault();

        $phone
            ->shouldReceive('getPrimary')
            ->andReturn(true)
            ->byDefault();

        return $phone;
    }

    protected function emailMock()
    {
        $email = m::mock(Email::class);

        $email
            ->shouldReceive('getAddress')
            ->andReturn('teste@teste.net')
            ->byDefault();

        $email
            ->shouldReceive('getPrimary')
            ->andReturn(true)
            ->byDefault();

        return $email;
    }
}
