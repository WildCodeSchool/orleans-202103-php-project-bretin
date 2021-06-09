<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Office;

class AppFixturesOffice extends Fixture
{
    public function load(ObjectManager $manager)
    {
        self::saveline("cabinet 1", "1 Rue Courcaille", "45000", "Orléans", "0651856989", $manager);
        self::saveline("cabinet 2", "85-89 Rue du Haut Midi,", "45160", "Saint-Hilaire-Saint-Mesmin", "0651856989", $manager);
    }

    private static function saveline(string $name, string $address, string $zipcode , string $city, string $phone,ObjectManager $manager)
    {
        $office = new Office();
        $office->setName($name);
        $office->setAddress($address);
        $office->setZipcode($zipcode);
        $office->setCity($city);
        $office->setPhone($phone);
        $manager->persist($office);
        $manager->flush();
    }
}
