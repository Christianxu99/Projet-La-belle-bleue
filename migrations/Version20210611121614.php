<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210611121614 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, id_customer INT NOT NULL, customer_type VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, photo LONGTEXT DEFAULT NULL, phone INT DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, zipcode VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, facebook LONGTEXT DEFAULT NULL, instagram LONGTEXT DEFAULT NULL, twitter LONGTEXT DEFAULT NULL, email LONGTEXT NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE establishment (id INT AUTO_INCREMENT NOT NULL, id_customer INT NOT NULL, type VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price_range INT NOT NULL, id_product INT NOT NULL, social_network VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE establishment_product_type (establishment_id INT NOT NULL, product_type_id INT NOT NULL, INDEX IDX_F365D28C8565851 (establishment_id), INDEX IDX_F365D28C14959723 (product_type_id), PRIMARY KEY(establishment_id, product_type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opening_hours (id INT AUTO_INCREMENT NOT NULL, establishment_link_id INT DEFAULT NULL, id_customer INT NOT NULL, day_name VARCHAR(255) NOT NULL, opening VARCHAR(255) NOT NULL, closing VARCHAR(255) NOT NULL, INDEX IDX_2640C10BD0837754 (establishment_link_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_type (id INT AUTO_INCREMENT NOT NULL, id_product INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialty (id INT AUTO_INCREMENT NOT NULL, establishment_link_id INT DEFAULT NULL, id_customer INT NOT NULL, photo VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price INT NOT NULL, INDEX IDX_E066A6ECD0837754 (establishment_link_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, user_link_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649F5A91C7B (user_link_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE establishment_product_type ADD CONSTRAINT FK_F365D28C8565851 FOREIGN KEY (establishment_id) REFERENCES establishment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE establishment_product_type ADD CONSTRAINT FK_F365D28C14959723 FOREIGN KEY (product_type_id) REFERENCES product_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE opening_hours ADD CONSTRAINT FK_2640C10BD0837754 FOREIGN KEY (establishment_link_id) REFERENCES establishment (id)');
        $this->addSql('ALTER TABLE specialty ADD CONSTRAINT FK_E066A6ECD0837754 FOREIGN KEY (establishment_link_id) REFERENCES establishment (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649F5A91C7B FOREIGN KEY (user_link_id) REFERENCES establishment (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE establishment_product_type DROP FOREIGN KEY FK_F365D28C8565851');
        $this->addSql('ALTER TABLE opening_hours DROP FOREIGN KEY FK_2640C10BD0837754');
        $this->addSql('ALTER TABLE specialty DROP FOREIGN KEY FK_E066A6ECD0837754');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649F5A91C7B');
        $this->addSql('ALTER TABLE establishment_product_type DROP FOREIGN KEY FK_F365D28C14959723');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE establishment');
        $this->addSql('DROP TABLE establishment_product_type');
        $this->addSql('DROP TABLE opening_hours');
        $this->addSql('DROP TABLE product_type');
        $this->addSql('DROP TABLE specialty');
        $this->addSql('DROP TABLE `user`');
    }
}
