<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Tests\Common\Base;

use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Address;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Util\ChangeProtectedAttribute;
use MrPrompt\BoletoCaixaEconomicaFederal\Tests\Mock;
use PHPUnit\Framework\TestCase;

/**
 * Person test case.
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class PersonTest extends TestCase
{
    use ChangeProtectedAttribute;
    use Mock;

    /**
     * @var Person
     */
    private $person;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->person = new Person();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->person = null;

        parent::tearDown();
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::getDocument()
     */
    public function getDocumentReturnDocumentAttribute()
    {
        $document = $this->documentMock();

        $this->modifyAttribute($this->person, 'document', $document);

        $this->assertSame($document, $this->person->getDocument());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::setDocument()
     */
    public function setDocumentReturnEmpty()
    {
        $document = $this->documentMock();

        $this->assertNull($this->person->setDocument($document));
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::getHomePhone()
     */
    public function getHomePhoneReturnHomePhoneAttribute()
    {
        $telephone = $this->phoneMock();

        $this->modifyAttribute($this->person, 'homePhone', $telephone);

        $this->assertSame($telephone, $this->person->getHomePhone());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::setHomePhone()
     */
    public function setHomePhoneReturnEmpty()
    {
        $telephone = $this->phoneMock();

        $result = $this->person->setHomePhone($telephone);

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::getHomePhoneSecondary()
     */
    public function getHomePhoneSecondaryReturnHomePhoneSecondaryAttribute()
    {
        $telephone = $this->phoneMock();

        $this->modifyAttribute($this->person, 'homePhoneSecondary', $telephone);

        $this->assertSame($telephone, $this->person->getHomePhoneSecondary());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::setHomePhoneSecondary()
     */
    public function setHomePhoneSecondaryReturnEmpty()
    {
        $telephone = $this->phoneMock();

        $result = $this->person->setHomePhoneSecondary($telephone);

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::getName()
     */
    public function getNameReturnNameAttribute()
    {
        $this->modifyAttribute($this->person, 'name', 'foo');

        $this->assertEquals('foo', $this->person->getName());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::setName()
     */
    public function setNameReturnEmpty()
    {
        $result = $this->person->setName('foo');

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::getEmail()
     */
    public function getEmailReturnEmailAttribute()
    {
        $email = $this->emailMock();

        $this->modifyAttribute($this->person, 'email', $email);

        $this->assertSame($email, $this->person->getEmail());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::setEmail()
     */
    public function setEmailReturnEmpty()
    {
        $email = $this->emailMock();

        $result = $this->person->setEmail($email);

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::getCellPhone()
     */
    public function getCellPhoneReturnCellPhoneAttribute()
    {
        $cel = $this->phoneMock();

        $this->modifyAttribute($this->person, 'cellPhone', $cel);

        $this->assertEquals($cel, $this->person->getCellPhone());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::setCellPhone()
     */
    public function setCellPhoneReturnEmpty()
    {
        $cel = $this->phoneMock();

        $result = $this->person->setCellPhone($cel);

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::getFatherName()
     */
    public function getFatherNameReturnFatherNameAttribute()
    {
        $fatherName = 'bar';

        $this->modifyAttribute($this->person, 'fatherName', $fatherName);

        $this->assertEquals($fatherName, $this->person->getFatherName());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::setFatherName()
     */
    public function setFatherNameReturnEmpty()
    {
        $result = $this->person->setFatherName('bar');

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::getMotherName()
     */
    public function getMotherNameReturnMotherNameAttribute()
    {
        $motherName = 'bar';

        $this->modifyAttribute($this->person, 'motherName', $motherName);

        $this->assertEquals($motherName, $this->person->getMotherName());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::setMotherName()
     */
    public function setMotherNameReturnEmpty()
    {
        $result = $this->person->setMotherName('bar');

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::getPerson()
     */
    public function getPersonReturnPersonAttribute()
    {
        $person = 'F';

        $this->modifyAttribute($this->person, 'person', $person);

        $this->assertEquals($person, $this->person->getPerson());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::setPerson()
     */
    public function setPersonReturnEmpty()
    {
        $result = $this->person->setPerson('F');

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::setPerson()
     * @expectedException \InvalidArgumentException
     */
    public function setPersonThrowsExceptionWhenEmpty()
    {
        $result = $this->person->setPerson('');
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::getSalaried()
     */
    public function getSalariedMustBeReturnSalariedAttribute()
    {
        $this->modifyAttribute($this->person, 'salaried', true);

        $this->assertEquals(true, $this->person->getSalaried());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::setSalaried()
     */
    public function setSalariedMustBeReturnNull()
    {
        $salaried = true;

        $result = $this->person->setSalaried($salaried);

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::getBirth()
     */
    public function getBirthMustBeReturnBirthAttribute()
    {
        $birth = new \DateTime();
        $this->modifyAttribute($this->person, 'birth', $birth);

        $this->assertEquals($birth, $this->person->getBirth());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::setBirth()
     */
    public function setBirthMustBeReturnNull()
    {
        $birth = new \DateTime();

        $result = $this->person->setBirth($birth);

        $this->assertNull($result);
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::getAddress()
     */
    public function getAddressMustBeReturnAddressAttribute()
    {
        $address = new Address();
        $this->modifyAttribute($this->person, 'address', $address);

        $this->assertEquals($address, $this->person->getAddress());
    }

    /**
     * @test
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::__construct()
     * @covers \MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Person::setAddress()
     */
    public function setAddressMustBeReturnNull()
    {
        $address = new Address();

        $result = $this->person->setAddress($address);

        $this->assertNull($result);
    }
}
