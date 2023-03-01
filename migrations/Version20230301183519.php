<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301183519 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, mail VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE allergy (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, is_allergy TINYINT(1) NOT NULL, INDEX IDX_CBB142B5727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, number_guest INT NOT NULL, is_allergy TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_81398E09727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dishes (id INT AUTO_INCREMENT NOT NULL, relation_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, description VARCHAR(200) NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_584DD35D3256915B (relation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, title VARCHAR(50) NOT NULL, description VARCHAR(200) NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_C53D045F727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, description VARCHAR(200) NOT NULL, price DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_7D053A93727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE openning_hours (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, days VARCHAR(50) NOT NULL, hours VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_62BABD6727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, number_guests INT NOT NULL, date DATETIME NOT NULL, hours DATETIME NOT NULL, is_lunch TINYINT(1) NOT NULL, is_dinner TINYINT(1) NOT NULL, is_allergy TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, address VARCHAR(255) NOT NULL, telephone INT NOT NULL, is_seat_available TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_EB95123F727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, zipcode VARCHAR(5) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visitor (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_CAE5E19F727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin ADD CONSTRAINT FK_880E0D76727ACA70 FOREIGN KEY (parent_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE allergy ADD CONSTRAINT FK_CBB142B5727ACA70 FOREIGN KEY (parent_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E09727ACA70 FOREIGN KEY (parent_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE dishes ADD CONSTRAINT FK_584DD35D3256915B FOREIGN KEY (relation_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F727ACA70 FOREIGN KEY (parent_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93727ACA70 FOREIGN KEY (parent_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE openning_hours ADD CONSTRAINT FK_62BABD6727ACA70 FOREIGN KEY (parent_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123F727ACA70 FOREIGN KEY (parent_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE visitor ADD CONSTRAINT FK_CAE5E19F727ACA70 FOREIGN KEY (parent_id) REFERENCES reservation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin DROP FOREIGN KEY FK_880E0D76727ACA70');
        $this->addSql('ALTER TABLE allergy DROP FOREIGN KEY FK_CBB142B5727ACA70');
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E09727ACA70');
        $this->addSql('ALTER TABLE dishes DROP FOREIGN KEY FK_584DD35D3256915B');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F727ACA70');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93727ACA70');
        $this->addSql('ALTER TABLE openning_hours DROP FOREIGN KEY FK_62BABD6727ACA70');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123F727ACA70');
        $this->addSql('ALTER TABLE visitor DROP FOREIGN KEY FK_CAE5E19F727ACA70');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE allergy');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE dishes');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE openning_hours');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE restaurant');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE visitor');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
