<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Tests\Common\Base;

use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Util\ChangeProtectedAttribute;
use DateTime;
use Mockery;
use PHPUnit\Framework\TestCase;

/**
 * CreditCard test case.
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class CreditCardTest extends TestCase
{
    use ChangeProtectedAttribute;

    /**
     * @var CreditCard
     */
    private $card;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->card = new CreditCard();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @return array
     */
    public function loadCardsProvider()
    {
        return [
            [
                [
                    'number'    => '4012001037141112',
                    'validate'  => '201512',
                    'security'  => '123',
                    'flag'      => 68
                ]
            ]
        ];

    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::getNumber()
     */
    public function getNumberReturnNumberAttribute()
    {
        $this->modifyAttribute($this->card, 'number', 1);

        $this->assertEquals(1, $this->card->getNumber());
    }

    /**
     * @test
     * @dataProvider loadCardsProvider
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::setNumber()
     */
    public function setNumberReturnNull($card)
    {
        $this->assertNull($this->card->setNumber($card['number']));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::setNumber()
     * @expectedException \InvalidArgumentException
     */
    public function setNumberThrowsExceptionWhenNotValidCard()
    {
        $this->card->setNumber('333232');
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::setNumber()
     * @expectedException \InvalidArgumentException
     */
    public function setNumberThrowsExceptionWhenEmpty()
    {
        $this->card->setNumber('');
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::setNumber()
     * @expectedException \InvalidArgumentException
     */
    public function setNumberThrowsExceptionWhenNotNumericValue()
    {
        $this->card->setNumber('938SDS@');
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::getValidate()
     */
    public function getValidateMustBeReturnCreditCardValidateAttribute()
    {
        $validate = new DateTime();

        $this->modifyAttribute($this->card, 'validate', $validate);

        $this->assertSame($validate, $this->card->getValidate());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::setValidate()
     */
    public function setValidateMustBeReturnNull()
    {
        $this->assertNull($this->card->setValidate(new DateTime()));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::__construct
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::getSecurityNumber
     */
    public function getSecurityNumberMustBeReturnCreditCardSecurityNumberAttribute()
    {
        $this->modifyAttribute($this->card, 'security', 232);

        $this->assertSame(232, $this->card->getSecurityNumber());
    }

    /**
     * @test
     * @dataProvider loadCardsProvider
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::setSecurityNumber()
     */
    public function setSecurityNumberMustBeReturnNull($card)
    {
        $this->assertNull($this->card->setSecurityNumber($card['security']));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::__construct
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::setSecurityNumber
     * @expectedException \InvalidArgumentException
     */
    public function setSecurityNumberrThrowsExceptionNotNumericValue()
    {
        $this->card->setSecurityNumber('SDS');
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::getFlag()
     */
    public function getFlagMustBeReturnFlagAttribute()
    {
        $this->modifyAttribute($this->card, 'flag', CreditCard::VISA);

        $this->assertEquals(CreditCard::VISA, $this->card->getFlag());
    }

    /**
     * @test
     * @dataProvider loadCardsProvider
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::setFlag()
     */
    public function setFlagMustBeReturnNull($card)
    {
        $result = $this->card->setFlag($card['flag']);

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\CreditCard::setFlag()
     * @expectedException \InvalidArgumentException
     */
    public function setFlagMustBeReturnThrowsExceptionWhenEmpty()
    {
        $result = $this->card->setFlag('Mastercard');

        $this->assertNull($result);
    }
}
