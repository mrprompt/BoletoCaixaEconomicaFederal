<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

use DateTime;
use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Validator;

/**
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Person
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Document
     */
    private $document;

    /**
     * @var string
     */
    private $email;

    /**
     * @var Phone
     */
    private $cellPhone;

    /**
     * @var Phone
     */
    private $homePhone;

    /**
     * @var Phone
     */
    private $homePhoneSecondary;

    /**
     *
     * @var string
     */
    private $fatherName;

    /**
     *
     * @var string
     */
    private $motherName;

    /**
     * Person type
     *
     * F = Física
     * J = Jurídica
     *
     * @var string
     */
    private $person = 'F';

    /**
     * Salaried situation
     *
     * A = active
     * I = inactive
     */
    private $salaried = 'A';

    /**
     * Birth
     *
     * @var DateTime
     */
    private $birth;

    /**
     * Address
     *
     * @var Address
     */
    private $address;

    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->person   = 'F';
        $this->salaried = 'A';
        $this->birth    = new DateTime();
        $this->document = new Document();
        $this->address  = new Address();
    }

    /**
     * @return Document
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param Document $document
     */
    public function setDocument(Document $document)
    {
        $this->document = $document;
    }

    /**
     * @return Phone
     */
    public function getHomePhone()
    {
        return $this->homePhone;
    }

    /**
     * @param Phone $homePhone
     */
    public function setHomePhone(Phone $homePhone)
    {
        $this->homePhone = $homePhone;
    }

    /**
     * @return Phone
     */
    public function getHomePhoneSecondary()
    {
        return $this->homePhoneSecondary;
    }

    /**
     * @param Phone $homePhone
     */
    public function setHomePhoneSecondary(Phone $homePhone)
    {
        $this->homePhoneSecondary = $homePhone;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return Email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param Email $email
     */
    public function setEmail(Email $email)
    {
        $this->email = $email;
    }

    /**
     * @return Phone
     */
    public function getCellPhone()
    {
        return $this->cellPhone;
    }

    /**
     * @param Phone $cellPhone
     */
    public function setCellPhone($cellPhone)
    {
        $this->cellPhone = $cellPhone;
    }

    /**
     * @return the $fatherName
     */
    public function getFatherName()
    {
        return $this->fatherName;
    }

    /**
     * @param string $fatherName
     */
    public function setFatherName($fatherName)
    {
        $this->fatherName = $fatherName;
    }

    /**
     * @return the $motherName
     */
    public function getMotherName()
    {
        return $this->motherName;
    }

    /**
     * @param string $motherName
     */
    public function setMotherName($motherName)
    {
        $this->motherName = $motherName;
    }

    /**
     * @return the $person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param string $person
     * @throws \InvalidArgumentException
     */
    public function setPerson($person)
    {
        try {
            Validator::create()->stringType()->in(['F', 'J'])->assert($person);

            $this->person = $person;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(sprintf('Invalid person type: "%s"', $person), 500, $ex);
        }
    }

    /**
     * @return mixed
     */
    public function getSalaried()
    {
        return $this->salaried;
    }

    /**
     * @param mixed $salaried
     */
    public function setSalaried($salaried)
    {
        $this->salaried = $salaried;
    }

    /**
     * @return DateTime
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * @param DateTime $birth
     */
    public function setBirth(DateTime $birth)
    {
        $this->birth = $birth;
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Address $address
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;
    }
}
