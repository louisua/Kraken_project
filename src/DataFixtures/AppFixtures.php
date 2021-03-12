<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $kraken = new Kraken();
            $kraken->setName($faker->name);
            $kraken->setAge($faker->age);
            $kraken->setSize($faker->size);
            $kraken->getWeight($faker->weight);
            $manager->persist($kraken);
        }

        $manager->flush();
    }
}
