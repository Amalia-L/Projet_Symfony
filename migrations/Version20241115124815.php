<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241115124815 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE remedy_stock (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, remedy_id INT DEFAULT NULL, quantity INT NOT NULL, unity VARCHAR(100) NOT NULL, INDEX IDX_FD5788B3A76ED395 (user_id), INDEX IDX_FD5788B3F18AC057 (remedy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE remedy_stock ADD CONSTRAINT FK_FD5788B3A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE remedy_stock ADD CONSTRAINT FK_FD5788B3F18AC057 FOREIGN KEY (remedy_id) REFERENCES remedy_recipe (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE remedy_stock DROP FOREIGN KEY FK_FD5788B3A76ED395');
        $this->addSql('ALTER TABLE remedy_stock DROP FOREIGN KEY FK_FD5788B3F18AC057');
        $this->addSql('DROP TABLE remedy_stock');
    }
}
