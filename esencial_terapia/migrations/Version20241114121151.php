<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241114121151 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE detail_recipe (id INT AUTO_INCREMENT NOT NULL, remedy_recipe_id INT NOT NULL, essential_oil_id INT NOT NULL, granules_homeopathic_id INT NOT NULL, dosage INT NOT NULL, unit_of_measure VARCHAR(50) NOT NULL, INDEX IDX_C842A8ACB4CAE006 (remedy_recipe_id), INDEX IDX_C842A8AC38BA078 (essential_oil_id), INDEX IDX_C842A8ACF8B1043 (granules_homeopathic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE essential_oil (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, main_property VARCHAR(255) NOT NULL, property_in_skin_application VARCHAR(255) DEFAULT NULL, recommendation VARCHAR(255) DEFAULT NULL, age_of_use INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favorite (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, INDEX IDX_68C58ED9A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favorite_essential_oil (favorite_id INT NOT NULL, essential_oil_id INT NOT NULL, INDEX IDX_DFB1096BAA17481D (favorite_id), INDEX IDX_DFB1096B38BA078 (essential_oil_id), PRIMARY KEY(favorite_id, essential_oil_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favorite_symptom (favorite_id INT NOT NULL, symptom_id INT NOT NULL, INDEX IDX_B9965ECEAA17481D (favorite_id), INDEX IDX_B9965ECEDEEFDA95 (symptom_id), PRIMARY KEY(favorite_id, symptom_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE granules_homeopathic (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, main_property VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE remedy_recipe (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, steps VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE symptom (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, body_area VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE detail_recipe ADD CONSTRAINT FK_C842A8ACB4CAE006 FOREIGN KEY (remedy_recipe_id) REFERENCES remedy_recipe (id)');
        $this->addSql('ALTER TABLE detail_recipe ADD CONSTRAINT FK_C842A8AC38BA078 FOREIGN KEY (essential_oil_id) REFERENCES essential_oil (id)');
        $this->addSql('ALTER TABLE detail_recipe ADD CONSTRAINT FK_C842A8ACF8B1043 FOREIGN KEY (granules_homeopathic_id) REFERENCES granules_homeopathic (id)');
        $this->addSql('ALTER TABLE favorite ADD CONSTRAINT FK_68C58ED9A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE favorite_essential_oil ADD CONSTRAINT FK_DFB1096BAA17481D FOREIGN KEY (favorite_id) REFERENCES favorite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favorite_essential_oil ADD CONSTRAINT FK_DFB1096B38BA078 FOREIGN KEY (essential_oil_id) REFERENCES essential_oil (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favorite_symptom ADD CONSTRAINT FK_B9965ECEAA17481D FOREIGN KEY (favorite_id) REFERENCES favorite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favorite_symptom ADD CONSTRAINT FK_B9965ECEDEEFDA95 FOREIGN KEY (symptom_id) REFERENCES symptom (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail_recipe DROP FOREIGN KEY FK_C842A8ACB4CAE006');
        $this->addSql('ALTER TABLE detail_recipe DROP FOREIGN KEY FK_C842A8AC38BA078');
        $this->addSql('ALTER TABLE detail_recipe DROP FOREIGN KEY FK_C842A8ACF8B1043');
        $this->addSql('ALTER TABLE favorite DROP FOREIGN KEY FK_68C58ED9A76ED395');
        $this->addSql('ALTER TABLE favorite_essential_oil DROP FOREIGN KEY FK_DFB1096BAA17481D');
        $this->addSql('ALTER TABLE favorite_essential_oil DROP FOREIGN KEY FK_DFB1096B38BA078');
        $this->addSql('ALTER TABLE favorite_symptom DROP FOREIGN KEY FK_B9965ECEAA17481D');
        $this->addSql('ALTER TABLE favorite_symptom DROP FOREIGN KEY FK_B9965ECEDEEFDA95');
        $this->addSql('DROP TABLE detail_recipe');
        $this->addSql('DROP TABLE essential_oil');
        $this->addSql('DROP TABLE favorite');
        $this->addSql('DROP TABLE favorite_essential_oil');
        $this->addSql('DROP TABLE favorite_symptom');
        $this->addSql('DROP TABLE granules_homeopathic');
        $this->addSql('DROP TABLE remedy_recipe');
        $this->addSql('DROP TABLE symptom');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
