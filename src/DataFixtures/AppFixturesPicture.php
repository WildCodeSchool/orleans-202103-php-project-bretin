<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Picture;

class AppFixturesPicture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        self::office1("cabinet 1", "build/images/cabinet1.jpg", $manager, $this);
        self::office1("cabinet 1", "build/images/cabinet2.jpg", $manager, $this);
        self::office1("cabinet 1", "build/images/cabinet3.jpg", $manager, $this);
        self::office2("cabinet 2", "build/images/cabinet21.jpg", $manager, $this);
        self::office2("cabinet 2", "build/images/cabinet22.jpg", $manager, $this);
        self::office2("cabinet 2", "build/images/cabinet23.jpg", $manager, $this);
    }

    private static function office1(string $name, string $url, ObjectManager $manager, AppFixturesPicture $fixture)
    {
        $picture = new Picture();
        $picture->setName($name);
        $picture->setUrl($url);
        $picture->setOffice($fixture->getReference(AppFixturesOffice::OFFICE_1));
        $manager->persist($picture);
        $manager->flush();
    }

    private static function office2(string $name, string $url, ObjectManager $manager, AppFixturesPicture $fixture)
    {
        $picture = new Picture();
        $picture->setName($name);
        $picture->setUrl($url);
        $picture->setOffice($fixture->getReference(AppFixturesOffice::OFFICE_2));
        $manager->persist($picture);
        $manager->flush();
    }
}
