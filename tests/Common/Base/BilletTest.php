<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Tests\Common\Base;

use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Util\ChangeProtectedAttribute;
use MrPrompt\BoletoCaixaEconomicaFederal\Shipment\Partial\Detail;
use MrPrompt\BoletoCaixaEconomicaFederal\Tests\Mock;
use PHPUnit\Framework\TestCase;

/**
 * Billet test case.
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class BilletTest extends TestCase
{
    use ChangeProtectedAttribute;
    use Mock;

    /**
     * @var Billet
     */
    private $billet;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->billet = new Billet();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->billet = null;

        parent::tearDown();
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::getDetails()
     */
    public function getDetailsReturnDetailsAttribute()
    {
        $this->assertInstanceOf(\ArrayObject::class, $this->billet->getDetails());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::setDetails()
     */
    public function setDetailsMustBeReturnNull()
    {
        $result = $this->billet->setDetails(new \ArrayObject());

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::addDetail()
     */
    public function addDetailMustBeReturnNull()
    {
        $detail = new Detail(
            $this->customerMock(),
            $this->chargeMock(),
            $this->sellerMock(),
            $this->purchaserMock(),
            $this->parcelsMock(),
            $this->authorizationMock(),
            $this->billetMock(),
            $this->sequenceMock()
        );

        $result = $this->billet->addDetail($detail);

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::getRate()
     */
    public function getRateReturnRatesAttribute()
    {
        $rate = 1;

        $this->modifyAttribute($this->billet, 'rate', $rate);

        $this->assertEquals($rate, $this->billet->getRate());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::setRate()
     */
    public function setRateMustBeReturnNull()
    {
        $result = $this->billet->setRate(1);

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::getBankAccount()
     */
    public function getBankAccountReturnBankaccountsAttribute()
    {
        $bankaccount = $this->bankAccountMock();

        $this->modifyAttribute($this->billet, 'bankAccount', $bankaccount);

        $this->assertEquals($bankaccount, $this->billet->getBankAccount());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::setBankAccount()
     */
    public function setBankAccountMustBeReturnNull()
    {
        $result = $this->billet->setBankAccount($this->bankAccountMock());

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::getAssignor()
     */
    public function getAssignorReturnAssignorsAttribute()
    {
        $assignor = $this->sellerMock();

        $this->modifyAttribute($this->billet, 'assignor', $assignor);

        $this->assertEquals($assignor, $this->billet->getAssignor());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::setAssignor()
     */
    public function setAssignorMustBeReturnNull()
    {
        $result = $this->billet->setAssignor($this->sellerMock());

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::getNumber()
     */
    public function getNumberReturnNumbersAttribute()
    {
        $number = 1;

        $this->modifyAttribute($this->billet, 'number', 1);

        $this->assertEquals(1, $this->billet->getNumber());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Billet::setNumber()
     */
    public function setNumberMustBeReturnNull()
    {
        $result = $this->billet->setNumber(1);

        $this->assertNull($result);
    }
}
