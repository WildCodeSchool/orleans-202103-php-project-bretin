<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Picture;
use App\Entity\Office;

class AppFixturesPicture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        self::office("cabinet 1", "build/images/cabinet1.jpg", $manager, $this);
        self::office("cabinet 1", "build/images/cabinet2.jpg", $manager, $this);
        self::office("cabinet 1", "build/images/cabinet3.jpg", $manager, $this);
        self::office("cabinet 2", "build/images/cabinet21.jpg", $manager, $this);
        self::office("cabinet 2", "build/images/cabinet22.jpg", $manager, $this);
        self::office("cabinet 2", "build/images/cabinet23.jpg", $manager, $this);
    }

    private static function office(string $name, string $url, ObjectManager $manager)
    {
        $picture = new Picture();
        $picture->setName($name);
        $picture->setUrl($url);
        $manager->persist($picture);
        $manager->flush();
    }
}
