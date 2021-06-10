<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210610111352 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE office_picture (office_id INT NOT NULL, picture_id INT NOT NULL, INDEX IDX_62872CCBFFA0C224 (office_id), INDEX IDX_62872CCBEE45BDBF (picture_id), PRIMARY KEY(office_id, picture_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE office_picture ADD CONSTRAINT FK_62872CCBFFA0C224 FOREIGN KEY (office_id) REFERENCES office (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE office_picture ADD CONSTRAINT FK_62872CCBEE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE office_picture');
    }
}
