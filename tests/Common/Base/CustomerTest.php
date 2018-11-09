<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Tests\Common\Base;

use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Util\ChangeProtectedAttribute;
use Mockery as m;
use PHPUnit\Framework\TestCase;

/**
 * Customer test case.
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class CustomerTest extends TestCase
{
    use ChangeProtectedAttribute;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->customer = new Customer();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->customer = null;

        parent::tearDown();
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer::getCode()
     */
    public function getCodeReturnCodeAttribute()
    {
        $this->modifyAttribute($this->customer, 'code', 1);

        $this->assertEquals($this->customer->getCode(), 1);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer::setCode()
     */
    public function setCodeMustBeReturnNullWhenReceiveIntegerValue()
    {
        $this->assertNull($this->customer->setCode(1));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer::setCode()
     */
    public function setCodeMustBeReturnNullWhenReceiveNotNumericValue()
    {
        $this->assertNull($this->customer->setCode('A'));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer::setCode()
     * @expectedException \InvalidArgumentException
     */
    public function setCodeOnlyThrowsExceptionWhenEmpty()
    {
        $this->customer->setCode('');
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer::setCode()
     */
    public function setCodeMustBeReturnNullWhenReceiveFloatValue()
    {
        $this->assertNull($this->customer->setCode(7.9837));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer::getIdentityNumber()
     */
    public function getIdentityNumberReturnIdentityNumberAttribute()
    {
        $this->modifyAttribute($this->customer, 'identityNumber', 1);

        $this->assertEquals($this->customer->getIdentityNumber(), 1);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer::setIdentityNumber()
     */
    public function setIdentityNumberReturnNullWhenReceiveNumericValue()
    {
        $this->assertNull($this->customer->setIdentityNumber(1));
        $this->assertNull($this->customer->setIdentityNumber(1.5));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer::setIdentityNumber()
     */
    public function setIdentityNumberMustBeNonNumericValue()
    {
        $result = $this->customer->setIdentityNumber('A');

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer::setIdentityNumber()
     */
    public function setIdentityNumberMustBeEmpty()
    {
        $result = $this->customer->setIdentityNumber('');

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer::getWorkingDays()
     */
    public function getWorkingDaysReturnWorkingDaysAttribute()
    {
        $this->modifyAttribute($this->customer, 'workingDays', 1);

        $this->assertEquals($this->customer->getWorkingDays(), 1);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer::setWorkingDays()
     */
    public function setWorkingDaysReturnNullWhenReceiveNumericValue()
    {
        $this->assertNull($this->customer->setWorkingDays(1));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer::setWorkingDays()
     * @expectedException \InvalidArgumentException
     */
    public function setWorkingDaysThrowsExceptionWhenNotNumericValue()
    {
        $this->customer->setWorkingDays('A');
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer::setWorkingDays()
     * @expectedException \InvalidArgumentException
     */
    public function setWorkingDaysThrowsExceptionWhenEmpty()
    {
        $this->customer->setWorkingDays('');
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer::setWorkingDays()
     * @expectedException \InvalidArgumentException
     */
    public function setWorkingDaysThrowsExceptionWhenNotInteger()
    {
        $this->customer->setWorkingDays(5.43);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer::getHelpfulMaturity()
     */
    public function getHelpfulMaturityReturnHelpfulMaturityAttribute()
    {
        $this->modifyAttribute($this->customer, 'helpfulMaturity', true);

        $this->assertTrue($this->customer->getHelpfulMaturity());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer::setHelpfulMaturity()
     */
    public function setHelpfulMaturityReturnNullWhenReceiveBooleanValue()
    {
        $this->assertNull($this->customer->setHelpfulMaturity(true));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer::setHelpfulMaturity()
     * @expectedException \InvalidArgumentException
     */
    public function setHelpfulMaturityThrowsExceptionWhenNotBooleanValue()
    {
        $this->customer->setHelpfulMaturity('A');
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer::setHelpfulMaturity()
     * @expectedException \InvalidArgumentException
     */
    public function setHelpfulMaturityThrowsExceptionWhenReceiveEmpty()
    {
        $this->customer->setHelpfulMaturity('');
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Customer::setHelpfulMaturity()
     * @expectedException \InvalidArgumentException
     */
    public function setHelpfulMaturityThrowsExceptionWhenNumeric()
    {
        $this->customer->setHelpfulMaturity(5.43);
    }
}
