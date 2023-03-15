<?php

namespace App\DataFixtures;

use App\Entity\Menu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class MenuFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for($i = 1; $i <= 9; $i++){
            $menus = new Menu();
            $menus->setName($faker->word);
            $menus->setDescription($faker->text(200));
            $menus->setPrice($faker->numberBetween(7,34));

            $manager->persist($menus);
            
        }
        
            $manager->flush();
    }
}
