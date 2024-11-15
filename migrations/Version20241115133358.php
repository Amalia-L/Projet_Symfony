<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241115133358 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE remedy_stock DROP FOREIGN KEY FK_FD5788B3F18AC057');
        $this->addSql('DROP INDEX IDX_FD5788B3F18AC057 ON remedy_stock');
        $this->addSql('ALTER TABLE remedy_stock DROP remedy_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE remedy_stock ADD remedy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE remedy_stock ADD CONSTRAINT FK_FD5788B3F18AC057 FOREIGN KEY (remedy_id) REFERENCES remedy_recipe (id)');
        $this->addSql('CREATE INDEX IDX_FD5788B3F18AC057 ON remedy_stock (remedy_id)');
    }
}
