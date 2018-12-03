<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Tests\Shipment\Partial;

use MrPrompt\BoletoCaixaEconomicaFederal\Tests\ChangeProtectedAttribute;
use MrPrompt\BoletoCaixaEconomicaFederal\Client;
use MrPrompt\BoletoCaixaEconomicaFederal\Shipment\Partial\Header;
use MrPrompt\BoletoCaixaEconomicaFederal\Tests\Mock as BoletoCaixaEconomicaFederalMock;
use DateTime;
use Mockery as m;
use PHPUnit\Framework\TestCase;

/**
 * Header test case.
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class HeaderTest extends TestCase
{
    use ChangeProtectedAttribute;
    use BoletoCaixaEconomicaFederalMock;

    /**
     * Header
     *
     * @var Header
     */
    private $header;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->header = new Header(
            $this->customerMock(),
            $this->sequenceMock(),
            new DateTime()
        );
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->header = null;

        parent::tearDown();
    }

    /**
     * @test
     */
    public function getCustomer()
    {
        $this->assertEquals($this->customerMock(), $this->header->getCustomer());
    }

    /**
     * @test
     */
    public function setCustomer()
    {
        $this->assertNull($this->header->setCustomer($this->customerMock()));
    }

    /**
     * @test
     */
    public function getCreated()
    {
        $this->assertInstanceOf(\DateTime::class, $this->header->getCreated());
    }

    /**
     * @test
     */
    public function setCreated()
    {
        $this->assertNull($this->header->setCreated(new DateTime()));
    }

    /**
     * @test
     */
    public function getSequence()
    {
        $this->assertEquals($this->sequenceMock(), $this->header->getSequence());
    }

    /**
     * @test
     */
    public function setSequence()
    {
        $this->assertNull($this->header->setSequence($this->sequenceMock()));
    }
}
