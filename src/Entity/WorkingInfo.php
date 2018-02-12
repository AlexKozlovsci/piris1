<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="working_infos")
 * @ORM\Entity(repositoryClass="App\Repository\WorkingInfoRepository")
 */
class WorkingInfo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * One WorkingInfo has One Client.
     * @ORM\OneToOne(targetEntity="Client", inversedBy="workingInfo")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id", nullable=false)
     */
    private $clientId;

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
     * @ORM\ManyToOne(targetEntity="MaritalStatus", inversedBy="workingInfos")
     * @ORM\JoinColumn(name="maritialstatus_id", referencedColumnName="id", nullable=false)
     */
    private $maritalStatusId;

    /**
     * Many workingInfos have One City.
     * @ORM\ManyToOne(targetEntity="City", inversedBy="workingInfos")
     * @ORM\JoinColumn(name="citizenship_id", referencedColumnName="id", nullable=false)
     */
    private $citizenshipId;

    /**
     * Many workingInfos have One Disability.
     * @ORM\ManyToOne(targetEntity="Disability", inversedBy="workingInfos")
     * @ORM\JoinColumn(name="disability_id", referencedColumnName="id", nullable=false)
     */
    private $disabilityId;

    /**
     * @ORM\Column(type="boolean")
     */
    private $pensioner;

    /**
     * @ORM\Column(type="float", name="monthly_income", nullable=true)
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
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @param mixed $maritalStatus
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
     * @param mixed $citizenship
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
     * @param mixed $disability
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
