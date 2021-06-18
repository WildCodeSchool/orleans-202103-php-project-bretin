<?php

namespace App\DataFixtures;

use App\Entity\Education;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EducationFixtures extends Fixture
{
    public const EDUCATIONS = [
        [
            'name' => 'Titre Psychologue du Travail - Cnam',
            'obtention_year' => 2020
        ],
        [
            'name' => 'Certifié MBTI - Myers Briggs Company',
            'obtention_year' => 2020
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::EDUCATIONS as $educationData) {
            $education = new Education();
            $education->setName($educationData['name']);
            $education->setObtentionYear($educationData['obtention_year']);
            $manager->persist($education);
        }
        $manager->flush();
    }
}
