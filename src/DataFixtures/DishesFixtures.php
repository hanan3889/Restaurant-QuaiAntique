<?php

namespace App\DataFixtures;

use App\Entity\Dishes;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker;

class DishesFixtures extends Fixture
{
    
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i <= 10; $i++){
            $dish = new Dishes();
            $dish->setName($faker->word);
            $dish->setDescription($faker->text(200));
            $dish->setPrice($faker->numberBetween(7,34));

            $manager->persist($dish);
        }
            $manager->flush();
    
    }
}
