<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Cities;
use App\DataFixtures\CountriesFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CitiesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        //Chargement de FakerPHP dans une variable en appelant la méthode "create".
        $faker = Faker\Factory::create('fr_FR');

        //Boucle permettant de créer un nombre de ville choisi.
        for ($cty = 1; $cty <= 20; $cty++) {
            $city = new Cities();

            //Définition du nom du pays grâce à FakerPHP.
            //Le nom du pays comprendrant entre 5 et 25 caractères.
            $city->setName($faker->word);

            //Récupération de la référence à l'objet country.
            //Application d'une référence aléatoire entre le pays 1 à 20.
            $idCountry = $this->getReference('country-' . rand(1, 20));

            //Ajout de l'id d'un pays grâce à la référence à l'objet country.
            $city->setIdCountry($idCountry);
            //Création d'une référence à l'objet city.
            $this->setReference('city-' . $cty, $city);

            //Persistance des données
            $manager->persist($city);
        }

        //Envoi des données sur la base de données
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CountriesFixtures::class
        ];
    }
}
