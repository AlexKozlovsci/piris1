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
     * @ORM\OneToMany(targetEntity="ContactInfo", mappedBy="residenceCityId")
     */
    private $contactInfos;

    /**
     * One City has Many WorkingInfo.
     * @ORM\OneToMany(targetEntity="WorkingInfo", mappedBy="citizenshipId")
     */
    private $workingInfos;

    public function __construct() {
        $this->contactInfos = new ArrayCollection();
        $this->workingInfos = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getContactInfos()
    {
        return $this->contactInfos;
    }

    /**
     * @param mixed $contactInfos
     */
    public function setContactInfos($contactInfos)
    {
        $this->contactInfos = $contactInfos;
    }

    /**
     * @return mixed
     */
    public function getWorkingInfos()
    {
        return $this->workingInfos;
    }

    /**
     * @param mixed $workingInfos
     */
    public function setWorkingInfos($workingInfos)
    {
        $this->workingInfos = $workingInfos;
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
