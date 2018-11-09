<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Tests\Common\Util;

use MrPrompt\BoletoCaixaEconomicaFederal\Common\Util\Number;
use PHPUnit\Framework\TestCase;

/**
 * Number test case.
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class NumberTest extends TestCase
{
    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Util\Number::zeroFill
     */
    public function zeroFillMustBeReturnExactLengthWithoutFillSideParam()
    {
        $foo = Number::zeroFill(1, 10);

        $this->assertEquals(10, strlen($foo));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Util\Number::zeroFill
     */
    public function zeroFillMustBeReturnExactStringWhenLengthIsEqualsWithoutFillSideParam()
    {
        $foo = Number::zeroFill(1, 3);

        $this->assertEquals(3, strlen($foo));
    }
    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Util\Number::zeroFill
     */
    public function zeroFillMustBeReturnExactLengthWithFillSideParam()
    {
        $foo = Number::zeroFill(1, 10, Number::FILL_LEFT);

        $this->assertEquals(10, strlen($foo));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Util\Number::zeroFill
     */
    public function zeroFillMustBeReturnExactStringWhenLengthIsEqualsWithFillSideParam()
    {
        $foo = Number::zeroFill(1, 3, Number::FILL_LEFT);

        $this->assertEquals(3, strlen($foo));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Util\Number::zeroFill
     * @expectedException \InvalidArgumentException
     */
    public function zeroFillThrowsExceptionWhenValueLengthIsGreaterThanLength()
    {
        Number::zeroFill(11111, 2);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Util\Number::zeroFill
     */
    public function zeroFillThrowsExceptionWithoutParams()
    {
        $return = Number::zeroFill('', '');

        $this->assertEmpty($return);
    }
}
