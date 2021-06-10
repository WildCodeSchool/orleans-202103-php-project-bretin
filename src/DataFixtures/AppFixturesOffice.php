<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Office;

class AppFixturesOffice extends Fixture
{
    public const OFFICE_1 = 1;
    public const OFFICE_2 = 2;

    public function load(ObjectManager $manager)
    {
        $office = new Office();
        $office->setName("cabinet 1");
        $office->setAddress("1 Rue Courcaille");
        $office->setZipcode("45000");
        $office->setCity("Orléans");
        $office->setPhone("0651856989");
        $this->addReference(self::OFFICE_1, $office);
        $manager->persist($office);
        $manager->flush();

        $office = new Office();
        $office->setName("cabinet 2");
        $office->setAddress("85-89 Rue du Haut Midi");
        $office->setZipcode("45160");
        $office->setCity("Saint-Hilaire-Saint-Mesmin");
        $office->setPhone("0651856989");
        $this->addReference(self::OFFICE_2, $office);
        $manager->persist($office);
        $manager->flush();
    }
}
