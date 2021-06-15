<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210615081820 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE establishment ADD address LONGTEXT NOT NULL, ADD zipcode VARCHAR(255) NOT NULL, ADD city VARCHAR(255) NOT NULL, ADD phone VARCHAR(255) DEFAULT NULL, ADD name VARCHAR(255) NOT NULL, ADD email VARCHAR(255) DEFAULT NULL, ADD website VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD name VARCHAR(255) NOT NULL, ADD photo VARCHAR(255) DEFAULT NULL, ADD user_type VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE establishment DROP address, DROP zipcode, DROP city, DROP phone, DROP name, DROP email, DROP website');
        $this->addSql('ALTER TABLE `user` DROP name, DROP photo, DROP user_type');
    }
}
