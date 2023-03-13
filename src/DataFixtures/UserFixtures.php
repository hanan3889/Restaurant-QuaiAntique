<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker;

class UserFixtures extends Fixture
{

    public function __construct(private UserPasswordHasherInterface $passwordEncoder)
    {

    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setEmail('admin@quaiantique.live');
        $admin->setlastname('Michand');
        $admin->setfirstname('Arnaud');
        $admin->setaddress('1 quai antique');
        $admin->setcity('Chambery');
        $admin->setzipcode('73000');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'admin')
        );
        $admin->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);

        $faker = Faker\Factory::create('fr_FR');

        for($usr = 1; $usr <= 5; $usr++){
            $user = new User();
            $user->setEmail($faker->email);
            $user->setlastname($faker->lastName);
            $user->setfirstname($faker->firstName);
            $user->setaddress($faker->streetAddress);
            $user->setcity($faker->city);
            $user->setzipcode($faker->postcode);
            $user->setPassword(
                $this->passwordEncoder->hashPassword($user, 'secret')
            );
    
            $manager->persist($user);
        }

        $manager->flush();
        
    }
}
