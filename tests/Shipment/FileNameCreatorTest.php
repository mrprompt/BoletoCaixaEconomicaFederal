<?php

namespace MrPrompt\BoletoCaixaEconomicaFederal\Shipment;

use DateTime;
use Mockery as m;
use MrPrompt\ShipmentCommon\Base\Customer;
use MrPrompt\ShipmentCommon\Base\Sequence;
use PHPUnit\Framework\TestCase;

class FileNameCreatorTest extends TestCase
{
    /**
     * @var FileNameCreator
     */
    private $fileNameCreator;

    protected function setUp()
    {
        $this->fileNameCreator = new FileNameCreator();
    }

    /**
     * @test
     */
    public function createFileNameBasedOnCustomerAndSequence()
    {
        $customer = m::mock(Customer::class);
        $sequence = m::mock(Sequence::class);
        $now = new DateTime("2019-09-04T09:00:00");

        $customer->shouldReceive('getCode')->once()->andReturn(1);
        $sequence->shouldReceive('getValue')->once()->andReturn(2);

        $fileName = $this->fileNameCreator->create($customer, $sequence, $now);
        $expectedFileName = '000001_04092019_00002.HTML';

        $this->assertEquals($expectedFileName, $fileName);
    }
}
