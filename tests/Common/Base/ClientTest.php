<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Tests\Common\Base;

use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Client;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Util\ChangeProtectedAttribute;
use Mockery as m;
use PHPUnit\Framework\TestCase;

/**
 * Client test case.
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class ClientTest extends TestCase
{
    use ChangeProtectedAttribute;

    /**
     * @var Client
     */
    private $client;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->client = new Client();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->client = null;

        parent::tearDown();
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Client::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Client::getCode()
     */
    public function getCodeReturnCodeAttribute()
    {
        $this->modifyAttribute($this->client, 'code', 1);

        $this->assertEquals($this->client->getCode(), 1);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Client::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Client::setCode()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Client::getCode()
     */
    public function setCodeChangeCodeAttribute()
    {
        $this->client->setCode(1);

        $this->assertEquals($this->client->getCode(), 1);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Client::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Client::setCode()
     * @expectedException InvalidArgumentException
     */
    public function setCodeOnlyAcceptIntegerValue()
    {
        $this->client->setCode('A');
    }
}
