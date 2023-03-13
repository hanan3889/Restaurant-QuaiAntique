<?php

namespace App\DataFixtures;

use App\Entity\Allergy;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AllergyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $allergys = new Allergy();
        $allergys->setIsAllergy('oui');
        $manager->persist($allergys);

        $manager->flush();
    }
}
