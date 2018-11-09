<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Tests\Common\Base;

use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\ConsumerUnity;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Util\ChangeProtectedAttribute;
use Mockery as m;
use PHPUnit\Framework\TestCase;

/**
 * Consumer Unity test case.
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class ConsumerUnityTest extends TestCase
{
    use ChangeProtectedAttribute;

    /**
     * @var ConsumerUnity
     */
    private $unity;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->unity = new ConsumerUnity();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->unity = null;

        parent::tearDown();
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\ConsumerUnity::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\ConsumerUnity::getNumber()
     */
    public function getNumberReturnNumberAttribute()
    {
        $number = rand();

        $this->modifyAttribute($this->unity, 'number', $number);

        $this->assertEquals($number, $this->unity->getNumber());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\ConsumerUnity::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\ConsumerUnity::setNumber()
     */
    public function setNumberReturnNull()
    {
        $this->assertNull($this->unity->setNumber(rand()));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\ConsumerUnity::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\ConsumerUnity::setNumber()
     * @expectedException \InvalidArgumentException
     */
    public function setNumberThrowsExceptionWhenEmpty()
    {
        $this->assertNull($this->unity->setNumber(''));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\ConsumerUnity::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\ConsumerUnity::getRead()
     */
    public function getReadReturnReadAttribute()
    {
        $read = new \DateTime();

        $this->modifyAttribute($this->unity, 'read', $read);

        $this->assertSame($read, $this->unity->getRead());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\ConsumerUnity::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\ConsumerUnity::setRead()
     */
    public function setReadReturnNull()
    {
        $this->assertNull($this->unity->setRead(new \DateTime()));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\ConsumerUnity::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\ConsumerUnity::getMaturity()
     */
    public function getMaturityReturnMaturityAttribute()
    {
        $read = new \DateTime();

        $this->modifyAttribute($this->unity, 'maturity', $read);

        $this->assertSame($read, $this->unity->getMaturity());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\ConsumerUnity::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\ConsumerUnity::setMaturity()
     */
    public function setMaturityReturnNull()
    {
        $this->assertNull($this->unity->setMaturity(new \DateTime()));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Consumerunity::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Consumerunity::getCode()
     */
    public function getCodeReturnCodeAttribute()
    {
        $this->modifyAttribute($this->unity, 'code', 1);

        $this->assertEquals($this->unity->getCode(), 1);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Consumerunity::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Consumerunity::setCode()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Consumerunity::getCode()
     */
    public function setCodeChangeCodeAttribute()
    {
        $this->unity->setCode(1);

        $this->assertEquals($this->unity->getCode(), 1);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Consumerunity::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Consumerunity::setCode()
     * @expectedException InvalidArgumentException
     */
    public function setCodeOnlyAcceptIntegerValue()
    {
        $this->unity->setCode('A');
    }
}
