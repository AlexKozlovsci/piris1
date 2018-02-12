<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * @ORM\Table(name="clients",
 *    uniqueConstraints={
 *        @UniqueConstraint(name="fio_unique",
 *            columns={"name", "surname", "patronymic"})
 *    }
 * )
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
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $patronymic;

    /**
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * One Client has One ContactInfo.
     * @ORM\OneToOne(targetEntity="ContactInfo", mappedBy="clientId")
     */
    private $contactInfo;

    /**
     * One Client has One WorkingInfo.
     * @ORM\OneToOne(targetEntity="WorkingInfo", mappedBy="clientId")
     */
    private $workingInfo;

    /**
     * One Client has One PassInfo.
     * @ORM\OneToOne(targetEntity="PassportInfo", mappedBy="clientId")
     */
    private $passportInfo;

    /**
     * @return mixed
     */
    public function getContactInfo()
    {
        return $this->contactInfo;
    }

    /**
     * @param mixed $contactInfo
     */
    public function setContactInfo($contactInfo)
    {
        $this->contactInfo = $contactInfo;
    }

    /**
     * @return mixed
     */
    public function getWorkingInfo()
    {
        return $this->workingInfo;
    }

    /**
     * @param mixed $workingInfo
     */
    public function setWorkingInfo($workingInfo)
    {
        $this->workingInfo = $workingInfo;
    }

    /**
     * @return mixed
     */
    public function getPassportInfo()
    {
        return $this->passportInfo;
    }

    /**
     * @param mixed $passportInfo
     */
    public function setPassportInfo($passportInfo)
    {
        $this->passportInfo = $passportInfo;
    }


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
}
