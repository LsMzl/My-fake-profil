<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CitiesController extends AbstractController
{
    #[Route('/cities', name: 'app_cities')]
    public function index(): Response
    {
        return $this->render('cities/index.html.twig', [
            'controller_name' => 'CitiesController',
        ]);
    }
}
