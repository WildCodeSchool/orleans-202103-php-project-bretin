<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Service;

class ServiceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $service = new Service();
        $service->setName("Aide psychologique");
        $service->setPrice("50");
        $manager->persist($service);
        $manager->flush();

        $service = new Service();
        $service->setName("Psychologie travail");
        $service->setPrice("50");
        $manager->persist($service);
        $manager->flush();

        $service = new Service();
        $service->setName("Insomnie");
        $service->setPrice("50");
        $manager->persist($service);
        $manager->flush();

        $service = new Service();
        $service->setName("Dépression");
        $service->setPrice("50");
        $manager->persist($service);
        $manager->flush();

        $service = new Service();
        $service->setName("Anxiété");
        $service->setPrice("50");
        $manager->persist($service);
        $manager->flush();

        $service = new Service();
        $service->setName("Harcèlement travail");
        $service->setPrice("50");
        $manager->persist($service);
        $manager->flush();

        $service = new Service();
        $service->setName("Stress");
        $service->setPrice("50");
        $manager->persist($service);
        $manager->flush();

        $service = new Service();
        $service->setName("Personnes handicapées");
        $service->setPrice("50");
        $manager->persist($service);
        $manager->flush();

        $service = new Service();
        $service->setName("Burn-out");
        $service->setPrice("50");
        $manager->persist($service);
        $manager->flush();

        $service = new Service();
        $service->setName("Test de personnalité");
        $service->setPrice("50");
        $manager->persist($service);
        $manager->flush();

        $service = new Service();
        $service->setName("Test psychotechnique");
        $service->setPrice("50");
        $manager->persist($service);
        $manager->flush();

        $service = new Service();
        $service->setName("Test d'orientation professionnelle");
        $service->setPrice("50");
        $manager->persist($service);
        $manager->flush();

        $service = new Service();
        $service->setName("Test de recrutement");
        $service->setPrice("50");
        $manager->persist($service);
        $manager->flush();

        $service = new Service();
        $service->setName("Développement personnel");
        $service->setPrice("50");
        $manager->persist($service);
        $manager->flush();

        $service = new Service();
        $service->setName("Confiance en soi");
        $service->setPrice("50");
        $manager->persist($service);
        $manager->flush();

        $service = new Service();
        $service->setName("Aptitudes sociales");
        $service->setPrice("50");
        $manager->persist($service);
        $manager->flush();
    }
}
