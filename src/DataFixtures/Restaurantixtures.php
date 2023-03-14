<?php

namespace App\DataFixtures;

use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class Restaurantixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $restaurant = new Restaurant();
        $restaurant->setAddress('1 quai Antique');
        $restaurant->setIsSeatAvailable('yes');
        $manager->persist($restaurant);

        $manager->flush();
    }
}
