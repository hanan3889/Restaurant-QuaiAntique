<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class CustomerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for($i = 1; $i <= 5; $i++){
            $customers = new Customer();
            $customers->setNumberGuest($faker->numberBetween(1,6));

            $manager->persist($customers);

        }


            $manager->flush();
    }
}
