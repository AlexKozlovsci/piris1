<?php

namespace App\Service;

use App\Entity\Client;
use Doctrine\Common\Persistence\ManagerRegistry;

class ClientManager
{
    private $doctrine;

    /**
     * ClientManager constructor.
     * @param ManagerRegistry $doctrine
     */
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @return array
     */
    public function getClients(): array
    {
        return $this->doctrine->getManager()
            ->getRepository(Client::class)
            ->findAllWithSort();
    }

    /**
     * @return
     */
    public function getClientById(int $id)
    {
        return $this->doctrine->getManager()
            ->getRepository(Client::class)
            ->find($id);
    }

    public function saveClient(Client $client)
    {
        $em = $this->doctrine->getManager();
        $em->persist($client);
        $em->flush();
    }

    public function deleteClient($id)
    {
        $client = $this->getClientById($id);

        if ($client !== null){
            $em = $this->doctrine->getManager();
            $em->remove($client);
            $em->flush();
        }

    }

}