<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210726081901 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {

        $bioUrl = '20210622-203950-60e81212021f1033095278.webp';
        $bioText = 'Issu du monde du travail et de l’entreprise, ayant évolué dans le secteur public et privé, j’ai évolué sur des 
        fonctions managériales en ressources humaines.
        L’expérience du travail transforme.
        Les difficultés vécues et exprimées à l’occasion ou autour du travail m’ont toujours questionnées.
        Mes expériences et rencontres ont nourri cet intérêt, Pourquoi certains collègues tombent malade ? Pourquoi le 
        travail rend malade ? Pourquoi ces tensions et conflits ? Pourquoi ces difficultés à avancer ? Pourquoi
        ces symptômes ?
        Issu du monde de l’emploi, de l’accompagnement et de la formation, j’ai orienté ma carrière vers l’écoute et le 
        soutien à la personne.
        Je vous recevrai donc avec une réelle compréhension et connaissance des expériences et problématiques que vous 
        avez vécues. 
        Titulaire du titre de psychologue du travail, certifié sur le MBTI niveau et niveau 2, j’aborde mon activité 
        d’écoute et de soutien avec une connaissance des paradoxes, tensions, impasses, empêchements du travail,
        pour y avoir été également exposé.
        Je vous accompagne également sur les sphères qui s’articulent avec celles du travail.
        ';

        $this->addSql( "INSERT INTO admin_user (email,roles,password, biography, url) values ('', '[\"\"]','','$bioText', '$bioUrl')" );
    }

    public function down(Schema $schema): void
    {
        $this->addSql( "DELETE from admin_user");
    }
}
