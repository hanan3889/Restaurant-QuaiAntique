<?php

namespace App\DataFixtures;

use App\Entity\OpenningHours;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OpenningHoursFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 7; $i++){
            $open = new OpenningHours();
            $open->setName($faker->word);

            $manager->persist($open);
        }
        $manager->flush();
    }
}
