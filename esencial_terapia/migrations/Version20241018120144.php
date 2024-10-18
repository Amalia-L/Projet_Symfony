<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241018120144 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE detail_recipe (id INT AUTO_INCREMENT NOT NULL, remedy_recipe_id INT NOT NULL, dosage INT NOT NULL, unit_of_measure VARCHAR(50) NOT NULL, INDEX IDX_C842A8ACB4CAE006 (remedy_recipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE granules_homeopathic (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, main_property VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE remedy_recipe (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, steps VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE symptom (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, body_area VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE detail_recipe ADD CONSTRAINT FK_C842A8ACB4CAE006 FOREIGN KEY (remedy_recipe_id) REFERENCES remedy_recipe (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail_recipe DROP FOREIGN KEY FK_C842A8ACB4CAE006');
        $this->addSql('DROP TABLE detail_recipe');
        $this->addSql('DROP TABLE granules_homeopathic');
        $this->addSql('DROP TABLE remedy_recipe');
        $this->addSql('DROP TABLE symptom');
    }
}
