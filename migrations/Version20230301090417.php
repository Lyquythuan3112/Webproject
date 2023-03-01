<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301090417 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE campus (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scores (id INT AUTO_INCREMENT NOT NULL, subject_name_id INT DEFAULT NULL, student_name_id INT DEFAULT NULL, score DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_750375ED4953074 (subject_name_id), UNIQUE INDEX UNIQ_750375E9C21292E (student_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE scores ADD CONSTRAINT FK_750375ED4953074 FOREIGN KEY (subject_name_id) REFERENCES subject (id)');
        $this->addSql('ALTER TABLE scores ADD CONSTRAINT FK_750375E9C21292E FOREIGN KEY (student_name_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE classes ADD campus_name_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE classes ADD CONSTRAINT FK_2ED7EC538EFCF5 FOREIGN KEY (campus_name_id) REFERENCES campus (id)');
        $this->addSql('CREATE INDEX IDX_2ED7EC538EFCF5 ON classes (campus_name_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classes DROP FOREIGN KEY FK_2ED7EC538EFCF5');
        $this->addSql('ALTER TABLE scores DROP FOREIGN KEY FK_750375ED4953074');
        $this->addSql('ALTER TABLE scores DROP FOREIGN KEY FK_750375E9C21292E');
        $this->addSql('DROP TABLE campus');
        $this->addSql('DROP TABLE scores');
        $this->addSql('DROP INDEX IDX_2ED7EC538EFCF5 ON classes');
        $this->addSql('ALTER TABLE classes DROP campus_name_id');
    }
}
