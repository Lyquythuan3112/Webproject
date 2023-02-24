<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230224201119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scores ADD student_name_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scores ADD CONSTRAINT FK_750375E9C21292E FOREIGN KEY (student_name_id) REFERENCES student (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_750375E9C21292E ON scores (student_name_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scores DROP FOREIGN KEY FK_750375E9C21292E');
        $this->addSql('DROP INDEX UNIQ_750375E9C21292E ON scores');
        $this->addSql('ALTER TABLE scores DROP student_name_id');
    }
}
