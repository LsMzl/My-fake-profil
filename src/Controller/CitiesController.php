<?php

namespace App\Controller;

use App\Entity\Cities;
use App\Repository\CitiesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CitiesController extends AbstractController
{
    #[Route('/cities', name: 'app_cities')]
    public function index(CitiesRepository $repository): Response
    {
        $cities = $repository->findAll();
        
        return $this->render(
            'cities/cities.html.twig',
            [
                'cities' => $cities
            ]
        );
    }

    #[Route('/city/{id}', name: 'id_city')]
    public function groupById(Cities $city): Response
    {
        
        return $this->render(
            'cities/city.html.twig',
            [
                'city' => $city
            ]
        );
    }
}
