<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Users;
use App\DataFixtures\CitiesFixtures;
use App\DataFixtures\GroupsFixtures;
use App\DataFixtures\CountriesFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UsersFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        //Chargement de FakerPHP dans une variable en appelant la méthode "create"
        $faker = Faker\Factory::create('fr_FR');

        //Boucle permettant de créer un nombre de Pays choisi
        for ($usr = 1; $usr <= 30; $usr++) {
            $user = new Users();

            //Définition des priopriété user grâce à FakerPHP
            $user->setFirstname($faker->firstName)
                ->setlastName($faker->lastName)
                ->setEmail($faker->email)
                ->setBirth($faker->dateTime())
                ->setProfession($faker->jobTitle())
                ->setIntro($faker->realText(100))
                ->setDescription($faker->realTextBetween(150, 300));


            //Récupération de la référence à l'objet city.
            //Application d'une référence aléatoire entre le pays 1 à 20.
            $idCity = $this->getReference('city-' . rand(1, 20));
            
            //Récupération de l'id d'une ville
            $user->setIdCity($idCity);
            //Création d'une référence à l'objet user
            $this->setReference('user-' . $usr, $user);

            //Persistance des données
            $manager->persist($user);
        }

        //Envoi des données sur la base de données
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            GroupsFixtures::class,
            CountriesFixtures::class,
            CitiesFixtures::class
        ];
    }
}
