<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="cities")
 * @ORM\Entity(repositoryClass="App\Repository\CityRepository")
 */
class City
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $name;

    /**
     * One City has Many ContactInfo.
     * @ORM\OneToMany(targetEntity="Client", mappedBy="residenceCityId")
     */
    private $clientsResidences;

    /**
     * One City has Many WorkingInfo.
     * @ORM\OneToMany(targetEntity="Client", mappedBy="citizenshipId")
     */
    private $clientsCitizenships;

    public function __construct() {
        $this->clientsResidences = new ArrayCollection();
        $this->clientsCitizenships = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getClientsResidences()
    {
        return $this->clientsResidences;
    }

    /**
     * @param mixed $contactInfos
     */
    public function setClientsResidences($clientsResidences)
    {
        $this->clientsResidences = $clientsResidences;
    }

    /**
     * @return mixed
     */
    public function getClientsCitizenships()
    {
        return $this->clientsCitizenships;
    }

    /**
     * @param mixed $workingInfos
     */
    public function setClientsCitizenships($clientsCitizenships)
    {
        $this->clientsCitizenships = $clientsCitizenships;
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


}
