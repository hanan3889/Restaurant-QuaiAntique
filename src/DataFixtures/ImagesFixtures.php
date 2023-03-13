<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ImagesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for($i = 1; $i <= 10; $i++ ){
            $img = new Image();
            $img->setTitle($faker->word);
            $img->setDescription($faker->text(200));
            $img->setPrice($faker->numberBetween(7, 30));
            
            $manager->persist($img);
        }

            $manager->flush();
    }
}
