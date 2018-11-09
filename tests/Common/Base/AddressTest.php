<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Tests\Common\Base;

use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Util\ChangeProtectedAttribute;
use PHPUnit\Framework\TestCase;

/**
 * Address test case.
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class AddressTest extends TestCase
{
    use ChangeProtectedAttribute;

    /**
     * @var Address
     */
    private $address;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->address = new Address();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->address = null;

        parent::tearDown();
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::getCity()
     */
    public function getCityReturnCityAttribute()
    {
        $this->modifyAttribute($this->address, 'city', 'foo');

        $this->assertEquals('foo', $this->address->getCity());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::setCity()
     */
    public function setCityReturnNull()
    {
        $result = $this->address->setCity('foo');

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::setCity()
     */
    public function setCityReturnNullWhenEmpty()
    {
        $result = $this->address->setCity('');

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::setCity()
     * @expectedException \InvalidArgumentException
     */
    public function setCityThrowsExceptionWhenExceedMaxLength()
    {
        $city   = str_pad('x', 201, 'x');
        $result = $this->address->setCity($city);

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::getState()
     */
    public function getStateReturnStateAttribute()
    {
        $state = 'SC';

        $this->modifyAttribute($this->address, 'state', $state);

        $this->assertEquals($state, $this->address->getState());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::setState()
     */
    public function setStateReturnNull()
    {
        $this->assertNull($this->address->setState('SC'));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::setState()
     */
    public function setStateReturnNullWhenEmpty()
    {
        $this->assertNull($this->address->setState(''));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::setState()
     * @expectedException \InvalidArgumentException
     */
    public function setStateThrowsExceptionWhenDiferentOfTwoChars()
    {
        $this->assertNull($this->address->setState('SCS'));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::getPostalCode()
     */
    public function getPostalCodeReturnPostalCodeAttribute()
    {
        $postalCode = '88090080';

        $this->modifyAttribute($this->address, 'postalCode', $postalCode);

        $this->assertEquals($postalCode, $this->address->getPostalCode());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::setPostalCode()
     */
    public function setPostalCodeReturnNull()
    {
        $result = $this->address->setPostalCode('88080090');

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::setPostalCode()
     * @expectedException \InvalidArgumentException
     */
    public function setPostalCodeThrowsExceptionWhenExceedMaxLength()
    {
        $result = $this->address->setPostalCode('8808009012');

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::setPostalCode()
     * @expectedException \InvalidArgumentException
     */
    public function setPostalCodeThrowsExceptionWhenEmpty()
    {
        $result = $this->address->setPostalCode('');

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::setPostalCode()
     * @expectedException \InvalidArgumentException
     */
    public function setPostalCodeThrowsExceptionWhenMinorOfMinLength()
    {
        $result = $this->address->setPostalCode('88090');

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::getAddress()
     */
    public function getAddressReturnAddressAttribute()
    {
        $address = 'fooo';

        $this->modifyAttribute($this->address, 'address', $address);

        $this->assertEquals($address, $this->address->getAddress());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::setAddress()
     */
    public function setAddressReturnNull()
    {
        $this->assertNull($this->address->setAddress('foo'));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::setAddress()
     */
    public function setAddressReturnNullWhemEmpty()
    {
        $this->assertNull($this->address->setAddress(' '));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::setAddress()
     * @expectedException \InvalidArgumentException
     */
    public function setAddressThrowsExceptionWhenExceedMaxLength()
    {
        $this->assertNull($this->address->setAddress(str_pad('x', 160, 'x')));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::getNumber()
     */
    public function getNumberReturnNumberAttribute()
    {
        $number = 5;

        $this->modifyAttribute($this->address, 'number', $number);

        $this->assertEquals($number, $this->address->getNumber());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::setNumber()
     */
    public function setNumberReturnNull()
    {
        $this->assertNull($this->address->setNumber(1));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::setNumber()
     * @expectedException \InvalidArgumentException
     */
    public function setNumberThrowsExceptionWhenNotNumber()
    {
        $this->assertNull($this->address->setNumber('A2'));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::getDistrict()
     */
    public function getDistrictReturnDistrictAttribute()
    {
        $district = 'allaa';

        $this->modifyAttribute($this->address, 'district', $district);

        $this->assertEquals($district, $this->address->getDistrict());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::setDistrict()
     */
    public function setDistrictReturnNull()
    {
        $this->assertNull($this->address->setDistrict('lalala'));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::setDistrict()
     * @expectedException \InvalidArgumentException
     */
    public function setDistrictThrowsExceptionWhenExceedMaximumValue()
    {
        $this->assertNull($this->address->setDistrict(str_pad('x', 201, 'x')));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::getComplement()
     */
    public function getComplementReturnComplementAttribute()
    {
        $complement = 'lalala';

        $this->modifyAttribute($this->address, 'complement', $complement);

        $this->assertEquals($complement, $this->address->getComplement());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::setComplement()
     */
    public function setComplementReturnNull()
    {
        $this->assertNull($this->address->setComplement('lalajd'));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address::setComplement()
     * @expectedException \InvalidArgumentException
     */
    public function setComplementThrowsExceptionWhenExceedMaximumValue()
    {
        $this->assertNull($this->address->setComplement(str_pad('x', 201, 'x')));
    }
}
