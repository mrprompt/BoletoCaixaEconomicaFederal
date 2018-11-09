<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Tests\Common\Base;

use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Document;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Util\ChangeProtectedAttribute;
use Mockery as m;
use PHPUnit\Framework\TestCase;

/**
 * Document test case.
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class DocumentTest extends TestCase
{
    use ChangeProtectedAttribute;

    /**
     * @var Document
     */
    private $document;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->document = new Document();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->document = null;
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Document::__construct
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Document::getType
     */
    public function getTypeMustBeReturnTypeAttribute()
    {
        $this->modifyAttribute($this->document, 'type', 2);

        $this->assertEquals(2, $this->document->getType());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Document::__construct
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Document::setType
     */
    public function setTypeOnlyAcceptPreDefinedTypes()
    {
        $types = [Document::CNPJ, Document::CPF];
        $type = $types[ array_rand($types) ];

        $result = $this->document->setType($type);

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Document::__construct
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Document::setType
     * @expectedException \InvalidArgumentException
     */
    public function setTypeThrowsExceptionWhenInvalidtype()
    {
        $this->document->setType('PASSPORT');
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Document::__construct
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Document::setType
     * @expectedException \InvalidArgumentException
     */
    public function setTypeThrowsExceptionWhenEmptyValue()
    {
        $this->document->setType('');
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Document::__construct
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Document::getNumber
     */
    public function getNumberMustBeReturnNumberAttribute()
    {
        $this->modifyAttribute($this->document, 'number', 2);

        $this->assertEquals(2, $this->document->getNumber());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Document::__construct
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Document::setNumber
     */
    public function setNumberMustBeReturnNull()
    {
        $result = $this->document->setNumber('11122233344');

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Document::__construct
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Document::setNumber
     * @expectedException \InvalidArgumentException
     */
    public function setNumberThrowsExceptionWhenExceedMaxLength()
    {
        $result = $this->document->setNumber(str_pad(0, 20, 0));

        $this->assertNull($result);
    }
}
