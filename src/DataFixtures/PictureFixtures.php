<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Picture;

class PictureFixtures extends Fixture
{
    public const PICTURE = [
        ['name' => 'cabinet 1', 'url' => 'uploads/cabinet1.jpg', 'reference' => 'office_0'],
        ['name' => 'cabinet 1', 'url' => 'uploads/cabinet2.jpg', 'reference' => 'office_0'],
        ['name' => 'cabinet 1', 'url' => 'uploads/cabinet3.jpg', 'reference' => 'office_0'],
        ['name' => 'cabinet 2', 'url' => 'uploads/cabinet21.jpg', 'reference' => 'office_1'],
        ['name' => 'cabinet 2', 'url' => 'uploads/cabinet22.jpg', 'reference' => 'office_1'],
        ['name' => 'cabinet 2', 'url' => 'uploads/cabinet23.jpg', 'reference' => 'office_1'],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PICTURE as $pic) {
            $picture = new Picture();
            $picture->setUrl($pic["url"]);
            $picture->setOfficeFile(NULL);
            $picture->setOffice($this->getReference($pic["reference"]));
            $manager->persist($picture);
            $manager->flush();
        }
    }
}
