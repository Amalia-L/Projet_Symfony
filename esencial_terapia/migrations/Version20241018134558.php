<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241018134558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail_recipe ADD essential_oil_id INT NOT NULL, ADD granules_homeopathic_id INT NOT NULL, CHANGE remedy_recipe_id remedy_recipe_id INT NOT NULL');
        $this->addSql('ALTER TABLE detail_recipe ADD CONSTRAINT FK_C842A8AC38BA078 FOREIGN KEY (essential_oil_id) REFERENCES essential_oil (id)');
        $this->addSql('ALTER TABLE detail_recipe ADD CONSTRAINT FK_C842A8ACF8B1043 FOREIGN KEY (granules_homeopathic_id) REFERENCES granules_homeopathic (id)');
        $this->addSql('CREATE INDEX IDX_C842A8AC38BA078 ON detail_recipe (essential_oil_id)');
        $this->addSql('CREATE INDEX IDX_C842A8ACF8B1043 ON detail_recipe (granules_homeopathic_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail_recipe DROP FOREIGN KEY FK_C842A8AC38BA078');
        $this->addSql('ALTER TABLE detail_recipe DROP FOREIGN KEY FK_C842A8ACF8B1043');
        $this->addSql('DROP INDEX IDX_C842A8AC38BA078 ON detail_recipe');
        $this->addSql('DROP INDEX IDX_C842A8ACF8B1043 ON detail_recipe');
        $this->addSql('ALTER TABLE detail_recipe DROP essential_oil_id, DROP granules_homeopathic_id, CHANGE remedy_recipe_id remedy_recipe_id INT DEFAULT NULL');
    }
}
