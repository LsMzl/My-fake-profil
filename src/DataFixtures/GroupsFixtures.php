<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Groups;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class GroupsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Chargement de FakerPHP dans une variable en appelant la méthode "create".
        $faker = Faker\Factory::create('fr_FR');

        //Boucle permettant de créer un nombre de groupe choisi.
        for ($grp = 1; $grp <= 20; $grp++) {
            $group = new Groups();

            //Définition du nom du groupe grâce à FakerPHP.
            //Le nom du pays comprendrant entre 5 et 20 caractères.
            $group->setName($faker->word);

            //Création d'une référence à l'objet Groups.
            $this->setReference('group-' . $grp, $group);

            //Persistance des données
            $manager->persist($group);
        }

        //Envoi des données sur la base de données
        $manager->flush();
    }
}
