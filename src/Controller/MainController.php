<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use App\Service\ClientManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="clients")
     * @param ClientManager $clientManager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ClientManager $clientManager)
    {
        $clients = $clientManager->getClients();
        return $this->render('clients.html.twig', [
            'clients' => $clients,
        ]);
    }

    /**
     * @Route("/client/add", name="add_client")
     */
    public function addClient(Request $request, ClientManager $clientManager)
    {
        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $clientManager->saveClient($client);
            return $this->redirectToRoute('clients');
        }
        return $this->render('add_client.html.twig', [
            'action' => 'Add',
            'client' => $client,
            'form' => $form->createView(),
            'errors' => $form->getErrors(true, true)
        ]);
    }

    /**
     * @Route("/client/show/{id}", name="show_client")
     */
    public function showClientInfo(int $id, ClientManager $clientManager)
    {
        $client = $clientManager->getClientById($id);

        return $this->render('show_client.html.twig', [
            'client' => $client,
        ]);
    }

    /**
     * @Route("/client/edit/{id}", name="edit_client")
     */
    public function editClient(int $id, Request $request, ClientManager $clientManager)
    {
        $client = $clientManager->getClientById($id);
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $clientManager->saveClient($client);
            return $this->redirectToRoute('clients');
        }
        return $this->render('add_client.html.twig', [
            'action' => 'Edit',
            'client' => $client,
            'form' => $form->createView(),
            'errors' => $form->getErrors(true, true)
        ]);
    }

    /**
     * @Route("/client/delete/{id}", name="delete_client")
     */
    public function deleteClient(int $id, ClientManager $clientManager)
    {
        $clientManager->deleteClient($id);
        return $this->redirectToRoute('clients');
    }
}