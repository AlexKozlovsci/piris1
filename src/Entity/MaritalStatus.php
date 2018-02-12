<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="marital_statuses")
 * @ORM\Entity(repositoryClass="App\Repository\MaritalStatusRepository")
 */
class MaritalStatus
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
     * One MaritalStatus has Many WorkingInfos.
     * @ORM\OneToMany(targetEntity="WorkingInfo", mappedBy="maritalStatusId")
     */
    private $workingInfos;


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

    public function __construct() {
        $this->workingInfos = new ArrayCollection();
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
