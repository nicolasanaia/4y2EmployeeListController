<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210428181949 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE students_class (id INT AUTO_INCREMENT NOT NULL, week_day VARCHAR(255) NOT NULL, class_schedule VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE students_class_students (students_class_id INT NOT NULL, students_id INT NOT NULL, INDEX IDX_20673BFEF6CF6CAE (students_class_id), INDEX IDX_20673BFE1AD8D010 (students_id), PRIMARY KEY(students_class_id, students_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE students_class_students ADD CONSTRAINT FK_20673BFEF6CF6CAE FOREIGN KEY (students_class_id) REFERENCES students_class (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE students_class_students ADD CONSTRAINT FK_20673BFE1AD8D010 FOREIGN KEY (students_id) REFERENCES students (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE address CHANGE students_id students_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE students CHANGE unit_id unit_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE students_class_students DROP FOREIGN KEY FK_20673BFEF6CF6CAE');
        $this->addSql('DROP TABLE students_class');
        $this->addSql('DROP TABLE students_class_students');
        $this->addSql('ALTER TABLE address CHANGE students_id students_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE students CHANGE unit_id unit_id INT DEFAULT NULL');
    }
}
