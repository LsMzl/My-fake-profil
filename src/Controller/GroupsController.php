<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GroupsController extends AbstractController
{
    #[Route('/groups', name: 'app_groups')]
    public function index(): Response
    {
        return $this->render('groups/index.html.twig', [
            'controller_name' => 'GroupsController',
        ]);
    }
}
