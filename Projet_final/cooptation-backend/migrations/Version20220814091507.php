<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220814091507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cooptation (id INT AUTO_INCREMENT NOT NULL, status_id INT DEFAULT NULL, coopted_entity_id INT DEFAULT NULL, user_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, cv VARCHAR(255) NOT NULL, civility VARCHAR(255) NOT NULL, phone INT NOT NULL, link VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, professional_experience VARCHAR(255) NOT NULL, application_date DATE NOT NULL, current_position VARCHAR(255) NOT NULL, first_experience_date DATE NOT NULL, fields_activity TINYINT(1) NOT NULL, current_salary TINYINT(1) NOT NULL, key_figures TINYINT(1) NOT NULL, interview_date DATE NOT NULL, interview_type LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', geographical_wishes LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', comments LONGTEXT NOT NULL, personality LONGTEXT NOT NULL, skils LONGTEXT NOT NULL, experience LONGTEXT NOT NULL, desired_salary LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', salary INT NOT NULL, INDEX IDX_60F616356BF700BD (status_id), INDEX IDX_60F61635A7607E37 (coopted_entity_id), INDEX IDX_60F61635A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coopted_entity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pole (id INT AUTO_INCREMENT NOT NULL, coopted_entity_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_FD6042E1A7607E37 (coopted_entity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, name VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cooptation ADD CONSTRAINT FK_60F616356BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE cooptation ADD CONSTRAINT FK_60F61635A7607E37 FOREIGN KEY (coopted_entity_id) REFERENCES coopted_entity (id)');
        $this->addSql('ALTER TABLE cooptation ADD CONSTRAINT FK_60F61635A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE pole ADD CONSTRAINT FK_FD6042E1A7607E37 FOREIGN KEY (coopted_entity_id) REFERENCES coopted_entity (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cooptation DROP FOREIGN KEY FK_60F616356BF700BD');
        $this->addSql('ALTER TABLE cooptation DROP FOREIGN KEY FK_60F61635A7607E37');
        $this->addSql('ALTER TABLE cooptation DROP FOREIGN KEY FK_60F61635A76ED395');
        $this->addSql('ALTER TABLE pole DROP FOREIGN KEY FK_FD6042E1A7607E37');
        $this->addSql('DROP TABLE cooptation');
        $this->addSql('DROP TABLE coopted_entity');
        $this->addSql('DROP TABLE pole');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE user');
    }
}
