<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241102154203 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE resume (
          id INT AUTO_INCREMENT NOT NULL,
          full_name VARCHAR(255) NOT NULL,
          title VARCHAR(255) NOT NULL,
          linkedin VARCHAR(255) DEFAULT NULL,
          github VARCHAR(255) DEFAULT NULL,
          tagline VARCHAR(255) NOT NULL,
          bio LONGTEXT DEFAULT NULL,
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER
        SET
          utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resume_education (
          id INT AUTO_INCREMENT NOT NULL,
          resume_id INT DEFAULT NULL,
          degree VARCHAR(255) NOT NULL,
          institution VARCHAR(255) NOT NULL,
          location VARCHAR(255) DEFAULT NULL,
          start_date DATE NOT NULL,
          end_date DATE DEFAULT NULL,
          description LONGTEXT DEFAULT NULL,
          INDEX IDX_1673BF6BD262AF09 (resume_id),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER
        SET
          utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resume_experience (
          id INT AUTO_INCREMENT NOT NULL,
          resume_id INT DEFAULT NULL,
          job_title VARCHAR(255) NOT NULL,
          company_name VARCHAR(255) NOT NULL,
          start_date DATE NOT NULL,
          end_date DATE DEFAULT NULL,
          description LONGTEXT DEFAULT NULL,
          INDEX IDX_B7E0B3CAD262AF09 (resume_id),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER
        SET
          utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resume_skill (
          id INT AUTO_INCREMENT NOT NULL,
          resume_id INT DEFAULT NULL,
          name VARCHAR(255) NOT NULL,
          level INT DEFAULT NULL,
          INDEX IDX_C2CA241FD262AF09 (resume_id),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER
        SET
          utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE
          resume_education
        ADD
          CONSTRAINT FK_1673BF6BD262AF09 FOREIGN KEY (resume_id) REFERENCES resume (id)');
        $this->addSql('ALTER TABLE
          resume_experience
        ADD
          CONSTRAINT FK_B7E0B3CAD262AF09 FOREIGN KEY (resume_id) REFERENCES resume (id)');
        $this->addSql('ALTER TABLE
          resume_skill
        ADD
          CONSTRAINT FK_C2CA241FD262AF09 FOREIGN KEY (resume_id) REFERENCES resume (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resume_education DROP FOREIGN KEY FK_1673BF6BD262AF09');
        $this->addSql('ALTER TABLE resume_experience DROP FOREIGN KEY FK_B7E0B3CAD262AF09');
        $this->addSql('ALTER TABLE resume_skill DROP FOREIGN KEY FK_C2CA241FD262AF09');
        $this->addSql('DROP TABLE resume');
        $this->addSql('DROP TABLE resume_education');
        $this->addSql('DROP TABLE resume_experience');
        $this->addSql('DROP TABLE resume_skill');
    }
}
