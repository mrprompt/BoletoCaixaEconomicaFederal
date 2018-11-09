<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Tests\Shipment\Partial;

use MrPrompt\BoletoCaixaEconomicaFederal\Common\Util\ChangeProtectedAttribute;
use MrPrompt\BoletoCaixaEconomicaFederal\Shipment\Partial\Detail;
use MrPrompt\BoletoCaixaEconomicaFederal\Tests\Mock as BoletoCaixaEconomicaFederalMock;
use PHPUnit\Framework\TestCase;

/**
 * Detail test case.
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class DetailTest extends TestCase
{
    use ChangeProtectedAttribute;
    use BoletoCaixaEconomicaFederalMock;

    /**
     * Detail
     * @var Detail
     */
    private $detail;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->detail = new Detail(
            $this->customerMock(),
            $this->chargeMock(),
            $this->sellerMock(),
            $this->purchaserMock(),
            $this->parcelsMock(),
            $this->authorizationMock(),
            $this->billetMock(),
            $this->sequenceMock()
        );
    }

    /**
     * @test
     */
    public function getCustomer()
    {
        $this->assertEquals($this->customerMock(), $this->detail->getCustomer());
    }

    /**
     * @test
     */
    public function setCustomer()
    {
        $this->assertNull($this->detail->setCustomer($this->customerMock()));
    }

    /**
     * @test
     */
    public function getCharge()
    {
        $this->assertEquals($this->chargeMock(), $this->detail->getCharge());
    }

    /**
     * @test
     */
    public function setCharge()
    {
        $this->assertNull($this->detail->setCharge($this->chargeMock()));
    }

    /**
     * @test
     */
    public function getSeller()
    {
        $this->assertEquals($this->sellerMock(), $this->detail->getSeller());
    }

    /**
     * @test
     */
    public function setSeller()
    {
        $this->assertNull($this->detail->setSeller($this->sellerMock()));
    }

    /**
     * @test
     */
    public function getPurchaser()
    {
        $purchaser = $this->purchaserMock();

        $this->assertInstanceOf(get_class($purchaser), $this->detail->getPurchaser());
    }

    /**
     * @test
     */
    public function setPurchaser()
    {
        $this->assertNull($this->detail->setPurchaser($this->purchaserMock()));
    }

    /**
     * @test
     */
    public function getParcels()
    {
        $parcels = $this->parcelsMock();

        $this->assertInstanceOf(get_class($parcels), $this->detail->getParcels());
    }

    /**
     * @test
     */
    public function setParcels()
    {
        $this->assertNull($this->detail->setParcels($this->parcelsMock()));
    }

    /**
     * @test
     */
    public function getAuthorization()
    {
        $this->assertEquals($this->authorizationMock(), $this->detail->getAuthorization());
    }

    /**
     * @test
     */
    public function setAuthorization()
    {
        $this->assertNull($this->detail->setAuthorization($this->authorizationMock()));
    }

    /**
     * @test
     */
    public function getSequence()
    {
        $this->assertEquals($this->sequenceMock(), $this->detail->getSequence());
    }

    /**
     * @test
     */
    public function setSequence()
    {
        $this->assertNull($this->detail->setSequence($this->sequenceMock()));
    }

    /**
     * @test
     */
    public function getBillet()
    {
        $this->assertEquals($this->billetMock(), $this->detail->getBillet());
    }

    /**
     * @test
     */
    public function setBillet()
    {
        $this->assertNull($this->detail->setBillet($this->billetMock()));
    }
}
