<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="contact_infos")
 * @ORM\Entity(repositoryClass="App\Repository\ContactInfoRepository")
 */
class ContactInfo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * One ContactInfo has One Client.
     * @ORM\OneToOne(targetEntity="Client", inversedBy="contactInfo")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id", nullable=false)
     */
    private $clientId;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="City", inversedBy="contactInfos")
     * @ORM\JoinColumn(name="residence_city_id", referencedColumnName="id", nullable=false)
     */
    private $residenceCityId;

    /**
     * @ORM\Column(type="string", name="residence_address")
     */
    private $residenceAddress;

    /**
     * @ORM\Column(type="string", name="home_phone", nullable=true)
     */
    private $homePhone;

    /**
     * @ORM\Column(type="string", name="mobile_phone", nullable=true)
     */
    private $mobilePhone;

    /**
     * @ORM\Column(type="string", length=50, name="email", nullable=true)
     */
    private $email;

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
    public function getResidenceCityId()
    {
        return $this->residenceCityId;
    }

    /**
     * @param mixed $residenceCity
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


}
