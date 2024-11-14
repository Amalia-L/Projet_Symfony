<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241114131608 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cure_essential_oil (id INT AUTO_INCREMENT NOT NULL, symptom_id INT NOT NULL, essential_oil_id INT NOT NULL, INDEX IDX_AF8BCFDBDEEFDA95 (symptom_id), INDEX IDX_AF8BCFDB38BA078 (essential_oil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cure_homeopathic (id INT AUTO_INCREMENT NOT NULL, symptom_id INT NOT NULL, granules_homeopathic_id INT NOT NULL, INDEX IDX_70940F1CDEEFDA95 (symptom_id), INDEX IDX_70940F1CF8B1043 (granules_homeopathic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cure_essential_oil ADD CONSTRAINT FK_AF8BCFDBDEEFDA95 FOREIGN KEY (symptom_id) REFERENCES symptom (id)');
        $this->addSql('ALTER TABLE cure_essential_oil ADD CONSTRAINT FK_AF8BCFDB38BA078 FOREIGN KEY (essential_oil_id) REFERENCES essential_oil (id)');
        $this->addSql('ALTER TABLE cure_homeopathic ADD CONSTRAINT FK_70940F1CDEEFDA95 FOREIGN KEY (symptom_id) REFERENCES symptom (id)');
        $this->addSql('ALTER TABLE cure_homeopathic ADD CONSTRAINT FK_70940F1CF8B1043 FOREIGN KEY (granules_homeopathic_id) REFERENCES granules_homeopathic (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cure_essential_oil DROP FOREIGN KEY FK_AF8BCFDBDEEFDA95');
        $this->addSql('ALTER TABLE cure_essential_oil DROP FOREIGN KEY FK_AF8BCFDB38BA078');
        $this->addSql('ALTER TABLE cure_homeopathic DROP FOREIGN KEY FK_70940F1CDEEFDA95');
        $this->addSql('ALTER TABLE cure_homeopathic DROP FOREIGN KEY FK_70940F1CF8B1043');
        $this->addSql('DROP TABLE cure_essential_oil');
        $this->addSql('DROP TABLE cure_homeopathic');
    }
}
