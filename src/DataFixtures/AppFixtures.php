<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Users;
use App\Entity\Tournaments;
use App\Entity\UsersTournaments;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker\Factory;

class AppFixtures extends Fixture
{

    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {

        
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create();

        $users = [];
        $tournaments = [];

        // Créer des utilisateurs de test
        for ($i = 0; $i < 10; $i++) {
            $user = new Users();
            $user->setName($faker->name());
            $user->setEmail($faker->email());
            $user->setHashedPassword($this->passwordHasher->hashPassword($user, 'password'));
            $user->setPhone($faker->phoneNumber());
            if ($i < 7) {
                $user->setRoles(['ROLE_JOUEUR']);
            } elseif ($i == 7) {
                $user->setRoles(['ROLE_ARBITRE']);
            } else {
                $user->setRoles(['ROLE_ADMIN']);
            }
            $user->setCreatedAt(new \DateTimeImmutable());
            $manager->persist($user);
            $users[] = $user; // Ajouter à la liste des utilisateurs
        }

        // Créer des tournois de test
        for ($i = 0; $i < 5; $i++) {
            $tournament = new Tournaments();
            $tournament->setName("Tournoi " . ($i + 1));
            $tournament->setStartDate(new \DateTimeImmutable('now'));
            $tournament->setEndDate(new \DateTimeImmutable('+7 days'));
            $tournament->setTicketBronze(10);
            $tournament->setTicketSilver(12);
            $tournament->setTicketGold(15);
            $tournament->setCreatedAt(new \DateTimeImmutable());
            $manager->persist($tournament);
            $tournaments[] = $tournament; // Ajouter à la liste des tournois
        }

        // Associer aléatoirement des utilisateurs aux tournois
        foreach ($users as $user) {
            // Chaque utilisateur participe entre 1 et 3 tournois aléatoirement
            $randomTournaments = (array) array_rand($tournaments, rand(1, 3));

            foreach ($randomTournaments as $index) {
                $userTournament = new UsersTournaments();
                $userTournament->setUsers($user);
                $userTournament->setTournaments($tournaments[$index]);
                $manager->persist($userTournament);
            }
        // Exécuter l'insertion des données en base
        $manager->flush();
        }
    }
}