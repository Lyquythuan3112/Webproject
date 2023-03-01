<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301093606 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE campus (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classes (id INT AUTO_INCREMENT NOT NULL, campus_name_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_2ED7EC538EFCF5 (campus_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scores (id INT AUTO_INCREMENT NOT NULL, subject_name_id INT DEFAULT NULL, student_name_id INT DEFAULT NULL, score DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_750375ED4953074 (subject_name_id), UNIQUE INDEX UNIQ_750375E9C21292E (student_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, class_name_id INT DEFAULT NULL, subject_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, sex VARCHAR(255) NOT NULL, dateofbirth DATE NOT NULL, phone INT NOT NULL, INDEX IDX_B723AF33B462FB2A (class_name_id), INDEX IDX_B723AF3323EDC87 (subject_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subject (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classes ADD CONSTRAINT FK_2ED7EC538EFCF5 FOREIGN KEY (campus_name_id) REFERENCES campus (id)');
        $this->addSql('ALTER TABLE scores ADD CONSTRAINT FK_750375ED4953074 FOREIGN KEY (subject_name_id) REFERENCES subject (id)');
        $this->addSql('ALTER TABLE scores ADD CONSTRAINT FK_750375E9C21292E FOREIGN KEY (student_name_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33B462FB2A FOREIGN KEY (class_name_id) REFERENCES classes (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF3323EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classes DROP FOREIGN KEY FK_2ED7EC538EFCF5');
        $this->addSql('ALTER TABLE scores DROP FOREIGN KEY FK_750375ED4953074');
        $this->addSql('ALTER TABLE scores DROP FOREIGN KEY FK_750375E9C21292E');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33B462FB2A');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF3323EDC87');
        $this->addSql('DROP TABLE campus');
        $this->addSql('DROP TABLE classes');
        $this->addSql('DROP TABLE scores');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE subject');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
