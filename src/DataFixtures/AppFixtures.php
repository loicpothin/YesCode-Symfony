<?php

namespace App\DataFixtures;

use App\Entity\Fruit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i=0; $i < 10 ; $i++){
            
            $fruit = new Fruit();
            $fruit->setName("Fruit n°" . $i);
            $manager->persist($fruit);

        }

        $manager->flush();
    }
}
