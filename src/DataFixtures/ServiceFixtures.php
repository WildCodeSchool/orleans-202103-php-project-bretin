<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Service;

class ServiceFixtures extends Fixture
{

    public const SERVICES = [
        'Fatigue',
        'travail',
        'troubles du sommeil',
        'stress',
        'burn out',
        'projet',
        'mobilité',
        'doutes',
        'tensions',
        'conflits',
        'bilan de compétences',
        'orientation',
        'écoute',
        'soutien'
    ];


    public function load(ObjectManager $manager)
    {

        foreach (self::SERVICES as $index => $data) {
            $service = new Service();
            $service->setName($data);
            $service->setPrice("50");
            $service->setPrice2("0");
            $manager->persist($service);
            $this->addReference('service_' . $index, $service);
        }

        $manager->flush();
    }
}
