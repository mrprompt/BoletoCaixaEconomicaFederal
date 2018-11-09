<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Tests\Common\Base;

use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Authorization;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Util\ChangeProtectedAttribute;
use PHPUnit\Framework\TestCase;

/**
 * Address test case.
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class AuthorizationTest extends TestCase
{
    use ChangeProtectedAttribute;

    /**
     * @var Authorization
     */
    private $authorization;

    /**
     * Prepares the environment before running a test.
     */
    public function setUp()
    {
        parent::setUp();

        $this->authorization = new Authorization();
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Authorization::getNumber
     */
    public function getNumberMustBeReturnNumberAttribute()
    {
        $this->modifyAttribute($this->authorization, 'number', 1);

        $this->assertEquals(1, $this->authorization->getNumber());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Authorization::setNumber
     */
    public function setNumberMustBeReturnNull()
    {
        $result = $this->authorization->setNumber('lajskfsla');

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Authorization::setNumber
     * @expectedException \InvalidArgumentException
     */
    public function setNumberThrowsExceptionWhenExceedMaximumValue()
    {
        $number = str_pad('x', 25, 'x');
        $result = $this->authorization->setNumber($number);

        $this->assertNull($result);
    }
}
