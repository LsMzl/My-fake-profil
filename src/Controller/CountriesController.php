<?php

namespace App\Controller;

use App\Entity\Countries;
use App\Repository\CountriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CountriesController extends AbstractController
{
    #[Route('/countries', name: 'app_countries')]
    public function allCountries(CountriesRepository $repository): Response
    {
        $countries = $repository->findAll();

        return $this->render(
            'countries/countries.html.twig',
            [
                'countries' => $countries
            ]
        );
    }

    #[Route('/country/{id}', name: 'id_country')]
    public function countryById(Countries $country): Response
    {
        return $this->render(
            'countries/country.html.twig',
            [
                'country' => $country
            ]
        );
    }
}
