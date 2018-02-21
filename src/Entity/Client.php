<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="clients")
 *  @UniqueEntity(fields={"name", "surname", "patronymic"}, message="User with such initials is already registered")
 *  @UniqueEntity(fields={"passportSeries", "passportNumber"}, message="User with such passport  is already registered")
 *  @UniqueEntity(fields={"identityNumber"}, message="User with such identity number is already registered")
 *
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\NotBlank(message="Field not blank")
     * @Assert\Regex(
     *     pattern="^[А-Яа-яЁёЧчЦцa-zA-Z]+$^",
     *     message="Name must consist only of letters"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\NotBlank(message="Field not blank")
     * @Assert\Regex(
     *     pattern="^[А-Яа-яЁёЧчЦцa-zA-Z]+$^",
     *     message="Surname must consist only of letters"
     * )
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\NotBlank(message="Field not blank")
     * @Assert\Regex(
     *     pattern="^[А-Яа-яЁёЧчЦцa-zA-Z]+$^",
     *     message="Patronymic must consist only of letters"
     * )
     */
    private $patronymic;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="Field not blank")
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", name="passport_series")
     * @Assert\NotBlank(message="Field not blank")
     * @Assert\Regex(
     *     pattern="/^[A-Z]{2}$/",
     *     message="Number will be looks like MP"
     * )
     */
    private $passportSeries;

    /**
     * @ORM\Column(type="string", name="passport_number")
     * @Assert\NotBlank(message="Field not blank")
     * @Assert\Regex(
     *     pattern="/^\d{7}$/",
     *     message="Format 0000000 waiting"
     * )
     */
    private $passportNumber;

    /**
     * @ORM\Column(type="string", name="issued_by")
     * @Assert\NotBlank(message="Field not blank")
     */
    private $issuedBy;

    /**
     * @ORM\Column(type="date", name="issued_date")
     * @Assert\NotBlank(message="Field not blank")
     */
    private $issuedDate;

    /**
     * @ORM\Column(type="string", name="identity_number")
     * @Assert\NotBlank(message="Field not blank")
     * @Assert\Regex(
     *     pattern="/^[0-9]{7}[A-Z]{1}[0-9]{3}[A-Z]{2}[0-9]{1}$/",
     *     message="Number will be looks like 0000000A000AA0"
     * )
     */
    private $identityNumber;

    /**
     * @ORM\Column(type="string", name="birth_place")
     */
    private $birthPlace;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="City", inversedBy="clientsResidences")
     * @ORM\JoinColumn(name="residence_city_id", referencedColumnName="id", nullable=false)
     */
    private $residenceCityId;

    /**
     * @ORM\Column(type="string", name="residence_address")
     * @Assert\NotBlank(message="Field not blank")
     */
    private $residenceAddress;

    /**
     * @ORM\Column(type="string", name="home_phone", nullable=true)
     * @Assert\Regex(
     *     pattern="^\+375\((17|29|33|44)\)[0-9]{7}$^",
     *     message="Number will be looks like +375(17)1234567"
     * )
     */
    private $homePhone;

    /**
     * @ORM\Column(type="string", name="mobile_phone", nullable=true)
     * @Assert\Regex(
     *     pattern="^\+375\((17|29|33|44)\)[0-9]{7}$^",
     *     message="Number will be looks like +375(17)1234567"
     * )
     */
    private $mobilePhone;

    /**
     * @ORM\Column(type="string", length=50, name="email", nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", name="working_place", nullable=true)
     */
    private $workingPlace;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $position;

    /**
     * Many workingInfos have One MaritalStatus.
     * @ORM\ManyToOne(targetEntity="MaritalStatus", inversedBy="clients")
     * @ORM\JoinColumn(name="maritialstatus_id", referencedColumnName="id", nullable=false)
     */
    private $maritalStatusId;

    /**
     * Many workingInfos have One City.
     * @ORM\ManyToOne(targetEntity="City", inversedBy="clientsCitizenships")
     * @ORM\JoinColumn(name="citizenship_id", referencedColumnName="id", nullable=false)
     */
    private $citizenshipId;

    /**
     * Many workingInfos have One Disability.
     * @ORM\ManyToOne(targetEntity="Disability", inversedBy="clients")
     * @ORM\JoinColumn(name="disability_id", referencedColumnName="id", nullable=false)
     */
    private $disabilityId;

    /**
     * @ORM\Column(type="boolean")
     */
    private $pensioner;

    /**
     * @ORM\Column(type="float", name="monthly_income", nullable=true)
     * @Assert\Regex(
     *     pattern="/^\d+$/",
     *     message="Only digits waiting"
     * )
     */
    private $monthlyIncome;

    /**
     * @ORM\Column(type="boolean")
     */
    private $reservist;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getPatronymic()
    {
        return $this->patronymic;
    }

    /**
     * @param mixed $patronymic
     */
    public function setPatronymic($patronymic)
    {
        $this->patronymic = $patronymic;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getPassportSeries()
    {
        return $this->passportSeries;
    }

    /**
     * @param mixed $passportSeries
     */
    public function setPassportSeries($passportSeries)
    {
        $this->passportSeries = $passportSeries;
    }

    /**
     * @return mixed
     */
    public function getPassportNumber()
    {
        return $this->passportNumber;
    }

    /**
     * @param mixed $passportNumber
     */
    public function setPassportNumber($passportNumber)
    {
        $this->passportNumber = $passportNumber;
    }

    /**
     * @return mixed
     */
    public function getIssuedBy()
    {
        return $this->issuedBy;
    }

    /**
     * @param mixed $issuedBy
     */
    public function setIssuedBy($issuedBy)
    {
        $this->issuedBy = $issuedBy;
    }

    /**
     * @return mixed
     */
    public function getIssuedDate()
    {
        return $this->issuedDate;
    }

    /**
     * @param mixed $issuedDate
     */
    public function setIssuedDate($issuedDate)
    {
        $this->issuedDate = $issuedDate;
    }

    /**
     * @return mixed
     */
    public function getIdentityNumber()
    {
        return $this->identityNumber;
    }

    /**
     * @param mixed $identityNumber
     */
    public function setIdentityNumber($identityNumber)
    {
        $this->identityNumber = $identityNumber;
    }

    /**
     * @return mixed
     */
    public function getBirthPlace()
    {
        return $this->birthPlace;
    }

    /**
     * @param mixed $birthPlace
     */
    public function setBirthPlace($birthPlace)
    {
        $this->birthPlace = $birthPlace;
    }

    /**
     * @return mixed
     */
    public function getResidenceCityId()
    {
        return $this->residenceCityId;
    }

    /**
     * @param mixed $residenceCityId
     */
    public function setResidenceCityId($residenceCityId)
    {
        $this->residenceCityId = $residenceCityId;
    }

    /**
     * @return mixed
     */
    public function getResidenceAddress()
    {
        return $this->residenceAddress;
    }

    /**
     * @param mixed $residenceAddress
     */
    public function setResidenceAddress($residenceAddress)
    {
        $this->residenceAddress = $residenceAddress;
    }

    /**
     * @return mixed
     */
    public function getHomePhone()
    {
        return $this->homePhone;
    }

    /**
     * @param mixed $homePhone
     */
    public function setHomePhone($homePhone)
    {
        $this->homePhone = $homePhone;
    }

    /**
     * @return mixed
     */
    public function getMobilePhone()
    {
        return $this->mobilePhone;
    }

    /**
     * @param mixed $mobilePhone
     */
    public function setMobilePhone($mobilePhone)
    {
        $this->mobilePhone = $mobilePhone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getWorkingPlace()
    {
        return $this->workingPlace;
    }

    /**
     * @param mixed $workingPlace
     */
    public function setWorkingPlace($workingPlace)
    {
        $this->workingPlace = $workingPlace;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getMaritalStatusId()
    {
        return $this->maritalStatusId;
    }

    /**
     * @param mixed $maritalStatusId
     */
    public function setMaritalStatusId($maritalStatusId)
    {
        $this->maritalStatusId = $maritalStatusId;
    }

    /**
     * @return mixed
     */
    public function getCitizenshipId()
    {
        return $this->citizenshipId;
    }

    /**
     * @param mixed $citizenshipId
     */
    public function setCitizenshipId($citizenshipId)
    {
        $this->citizenshipId = $citizenshipId;
    }

    /**
     * @return mixed
     */
    public function getDisabilityId()
    {
        return $this->disabilityId;
    }

    /**
     * @param mixed $disabilityId
     */
    public function setDisabilityId($disabilityId)
    {
        $this->disabilityId = $disabilityId;
    }

    /**
     * @return mixed
     */
    public function getPensioner()
    {
        return $this->pensioner;
    }

    /**
     * @param mixed $pensioner
     */
    public function setPensioner($pensioner)
    {
        $this->pensioner = $pensioner;
    }

    /**
     * @return mixed
     */
    public function getMonthlyIncome()
    {
        return $this->monthlyIncome;
    }

    /**
     * @param mixed $monthlyIncome
     */
    public function setMonthlyIncome($monthlyIncome)
    {
        $this->monthlyIncome = $monthlyIncome;
    }

    /**
     * @return mixed
     */
    public function getReservist()
    {
        return $this->reservist;
    }

    /**
     * @param mixed $reservist
     */
    public function setReservist($reservist)
    {
        $this->reservist = $reservist;
    }


}
