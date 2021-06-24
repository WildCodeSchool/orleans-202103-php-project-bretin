<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Office;

class OfficeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $indexReference = 0;
        $office = new Office();
        $office->setName("Centre-ville");
        $office->setAddress("1 Rue Courcaille");
        $office->setZipcode("45000");
        $office->setCity("Orléans");
        $office->setPhone("0651856989");
        $office->setMail("cabinet.bretin@gmail.com");
        $this->addReference("office_" . $indexReference, $office);
        $manager->persist($office);
        $manager->flush();
        $indexReference++;

        $office = new Office();
        $office->setName("Périphérie");
        $office->setAddress("85-89 Rue du Haut Midi");
        $office->setZipcode("45160");
        $office->setCity("Saint-Hilaire-Saint-Mesmin");
        $office->setPhone("0651856989");
        $office->setMail("cabinet.bretin@gmail.com");
        $this->addReference("office_" . $indexReference, $office);
        $manager->persist($office);
        $manager->flush();
    }
}
