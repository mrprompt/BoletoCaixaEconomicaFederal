<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Tests\Common\Base;

use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Sequence;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Util\ChangeProtectedAttribute;
use Mockery as m;
use PHPUnit\Framework\TestCase;

/**
 * Sequence test case.
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class SequenceTest extends TestCase
{
    use ChangeProtectedAttribute;

    /**
     * @var Sequence
     */
    private $sequence;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->sequence = new Sequence();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->sequence = null;

        parent::tearDown();
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Sequence::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Sequence::getValue()
     */
    public function getValueReturnValueAttribute()
    {
        $this->modifyAttribute($this->sequence, 'value', 1);

        $this->assertEquals(1, $this->sequence->getValue());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Sequence::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Sequence::setValue()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Sequence::getValue()
     */
    public function setValueModifyValueAttribute()
    {
        $this->sequence->setValue(1);

        $this->assertEquals(1, $this->sequence->getValue());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Sequence::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Sequence::setValue()
     * @expectedException InvalidArgumentException
     */
    public function setValueOnlyAcceptIntegerValue()
    {
        $this->sequence->setValue('foo');
    }
}
