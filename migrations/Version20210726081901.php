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
        $tempPassword = '$argon2id$v=19$m=65536,t=4,p=1$MjhP0ITvZ7nwAC6sMG+ifQ$9HqPdT62Yy4HvvSH1z5Ez0zSi086ds0PypZTn9nRCZ4';
        $this->addSql( "INSERT INTO admin_user (email,roles,password, biography, url) values ('cabinet.bretin@gmail.com', '[\"ROLE_ADMIN\"]','$tempPassword','','')" );
    }

    public function down(Schema $schema): void
    {
        $this->addSql( "DELETE from admin_user");
    }
}
