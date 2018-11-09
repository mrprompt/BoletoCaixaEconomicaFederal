<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Tests\Common\Base;

use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Seller;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Util\ChangeProtectedAttribute;
use Mockery as m;
use PHPUnit\Framework\TestCase;

/**
 * Seller test case.
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class SellerTest extends TestCase
{
    use ChangeProtectedAttribute;

    /**
     * @var Seller
     */
    private $seller;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->seller = new Seller();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->seller = null;

        parent::tearDown();
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Seller::getCode()
     */
    public function getCodeReturnCodeAttribute()
    {
        $this->modifyAttribute($this->seller, 'code', 1);

        $this->assertEquals($this->seller->getCode(), 1);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Seller::setCode()
     */
    public function setCodeChangeCodeAttribute()
    {
        $this->seller->setCode(1);

        $this->assertEquals($this->seller->getCode(), 1);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Seller::setCode()
     * @expectedException \InvalidArgumentException
     */
    public function setCodeMustBeThrowsInvalidArgumentExceptionWhenEmpty()
    {
        $this->seller->setCode('');
    }
}
