<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Testimony;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TestimonyFixtures extends Fixture
{
    public const MAX_TESTIMONIES = 12;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < self::MAX_TESTIMONIES; $i++) {
            $testimony = new Testimony();
            $testimony->setName($faker->title() . $faker->lastname());
            $testimony->setAge($faker->numberBetween(18, 100));
            $testimony->setMessage($faker->paragraph(2));

            $manager->persist($testimony);
            $this->addReference('testimony' . $i, $testimony);
        }
        $manager->flush();
    }
}
