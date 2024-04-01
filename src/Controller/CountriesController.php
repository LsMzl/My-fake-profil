<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CountriesController extends AbstractController
{
    #[Route('/countries', name: 'app_countries')]
    public function index(): Response
    {
        return $this->render('countries/index.html.twig', [
            'controller_name' => 'CountriesController',
        ]);
    }
}
