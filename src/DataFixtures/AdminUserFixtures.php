<?php

namespace App\DataFixtures;

use App\Entity\AdminUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminUserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new AdminUser();
        $admin->setEmail('cabinet.bretin@gmail.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setBiographyFile(null);
        $admin->setUrl('cabinet2-60e6fb363885b176406252.jpg');
        $admin->setBiography('
        L’expérience du travail transforme.
        Les difficultés vécues et exprimées à l’occasion ou autour du travail m’ont toujours questionnées.
        
        Mes expériences et rencontres ont nourri cet intérêt, Pourquoi certains collègues tombent malade ? 
        Pourquoi le travail rend malade ? Pourquoi ces tensions et conflits ? 
        Pourquoi ces difficultés à avancer ? Pourquoi ces symptômes ?

        Issu du monde de l’emploi, de l’accompagnement et de la formation, j’ai orienté ma carrière vers l’écoute et le 
        soutien à la personne.
        
        Ayant eu une activité salariée, ayant travaillé dans différentes organisations, à la fois publiques et privées, 
        c’est avec une réelle compréhension et connaissance des situations de travail que je vous accompagne et soutiens

        Titulaire du titre de psychologue du travail, certifié sur le MBTI niveau 1 et niveau 2, j’aborde mon activité 
        d’écoute et de soutien avec une connaissance des paradoxes, tensions, impasses, empêchements du travail.
        Je vous accompagne également sur les sphères qui s’articulent avec celles du travail.
        ');
        $admin->setPassword($this->passwordEncoder->encodePassword(
            $admin,
            'orleans'
        ));

        $manager->persist($admin);
        $manager->flush();
    }
}
