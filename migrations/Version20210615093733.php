<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210615093733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE establishment ADD id_pro_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE establishment ADD CONSTRAINT FK_DBEFB1EEE5805157 FOREIGN KEY (id_pro_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_DBEFB1EEE5805157 ON establishment (id_pro_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE establishment DROP FOREIGN KEY FK_DBEFB1EEE5805157');
        $this->addSql('DROP INDEX IDX_DBEFB1EEE5805157 ON establishment');
        $this->addSql('ALTER TABLE establishment DROP id_pro_id');
    }
}
