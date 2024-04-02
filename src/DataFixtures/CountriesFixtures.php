<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Countries;
use App\DataFixtures\GroupsFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CountriesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        //Chargement de FakerPHP dans une variable en appelant la méthode "create"
        $faker = Faker\Factory::create('fr_FR');

        //Boucle permettant de créer un nombre de Pays choisi
        for ($cntr = 1; $cntr <= 20; $cntr++) {
            $country = new Countries();

            //Définition du nom du pays grâce à FakerPHP
            //Le nom du pays comprendrant entre 5 et 12 caractères
            $country->setName($faker->country);

            //Persistance des données
            $manager->persist($country);

            //Création d'une référence à l'objet country
            $this->addReference('country-' . $cntr, $country);
        }

        //Envoi des données sur la base de données
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            GroupsFixtures::class
        ];
    }
}
