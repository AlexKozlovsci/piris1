<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="passport_infos")
 * @ORM\Entity(repositoryClass="App\Repository\PassportInfoRepository")
 */
class PassportInfo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * One PasssportInfo has One Client.
     * @ORM\OneToOne(targetEntity="Client", inversedBy="passportInfo")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id", nullable=false)
     */
    private $clientId;

    /**
     * @ORM\Column(type="string", name="passport_series")
     */
    private $passportSeries;

    /**
     * @ORM\Column(type="string", name="passport_number")
     */
    private $passportNumber;

    /**
     * @ORM\Column(type="string", name="issued_by")
     */
    private $issuedBy;

    /**
     * @ORM\Column(type="date", name="issued_date")
     */
    private $issuedDate;

    /**
     * @ORM\Column(type="string", name="identity_number")
     */
    private $identityNumber;

    /**
     * @ORM\Column(type="string", name="birth_place")
     */
    private $birthPlace;

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
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param mixed $clientId
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
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


}
