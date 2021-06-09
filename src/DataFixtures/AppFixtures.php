<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Picture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        self::saveline ("cabinet 1","build/images/cabinet1.jpg",$manager);
        self::saveline ("cabinet 1","build/images/cabinet2.jpg",$manager);
        self::saveline ("cabinet 1","build/images/cabinet3.jpg",$manager);
        self::saveline ("cabinet 2","build/images/cabinet21.jpg",$manager);
        self::saveline ("cabinet 2","build/images/cabinet22.jpg",$manager);
        self::saveline ("cabinet 2","build/images/cabinet23.jpg",$manager);
    }

    static function saveline(string $name,string $url,ObjectManager $manager)
    {
        $picture = new Picture();
        $picture->setName($name);
        $picture->setUrl($url);
        $manager->persist($picture);
        $manager->flush();
    }
}
