<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Tests\Common\Base;

use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Email;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Util\ChangeProtectedAttribute;
use MrPrompt\BoletoCaixaEconomicaFederal\Tests\Mock;
use PHPUnit\Framework\TestCase;

/**
 * Email test case.
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class EmailTest extends TestCase
{
    use ChangeProtectedAttribute;
    use Mock;

    /**
     * @var Email
     */
    private $email;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->email = new Email('foo@foo.net');
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->email = null;

        parent::tearDown();
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Email::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Email::getAddress()
     */
    public function getAddressReturnAddressAttribute()
    {
        $address = 'foo@foo.net';

        $this->modifyAttribute($this->email, 'address', $address);

        $this->assertEquals($address, $this->email->getAddress());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Email::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Email::setAddress()
     */
    public function setAddressReturnNull()
    {
        $address = 'foo@foo.net';

        $result = $this->email->setAddress($address);

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Email::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Email::setAddress()
     * @expectedException \InvalidArgumentException
     */
    public function setAddressThrowsExceptionWhenAddressIsInvalid()
    {
        $address = '1234';

        $result = $this->email->setAddress($address);

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Email::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Email::getPrimary()
     */
    public function getPrimaryReturnPrimaryAttribute()
    {
        $this->modifyAttribute($this->email, 'primary', true);

        $this->assertEquals(true, $this->email->getPrimary());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Email::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Email::isPrimary()
     */
    public function isPrimaryReturnPrimaryAttribute()
    {
        $this->modifyAttribute($this->email, 'primary', true);

        $this->assertEquals(true, $this->email->isPrimary());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Email::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Email::setPrimary()
     */
    public function setPrimaryReturnNull()
    {
        $result = $this->email->setPrimary(true);

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Email::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Email::setPrimary()
     * @expectedException \InvalidArgumentException
     */
    public function setPrimaryThrowsExceptionPrimaryIsNotBoolean()
    {
        $result = $this->email->setPrimary('true');

        $this->assertNull($result);
    }
}
