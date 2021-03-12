<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210312135051 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE kraken (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, age INT DEFAULT NULL, size INT NOT NULL, weight INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE power (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, max_use INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pwer (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tentacle (id INT AUTO_INCREMENT NOT NULL, kraken_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, health_point VARCHAR(255) NOT NULL, strength VARCHAR(255) NOT NULL, dexterity VARCHAR(255) NOT NULL, stamina VARCHAR(255) NOT NULL, INDEX IDX_97815F076374DF63 (kraken_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tentacle_power (tentacle_id INT NOT NULL, power_id INT NOT NULL, INDEX IDX_2B4DFAB5C492210F (tentacle_id), INDEX IDX_2B4DFAB5AB4FC384 (power_id), PRIMARY KEY(tentacle_id, power_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tentacle ADD CONSTRAINT FK_97815F076374DF63 FOREIGN KEY (kraken_id_id) REFERENCES kraken (id)');
        $this->addSql('ALTER TABLE tentacle_power ADD CONSTRAINT FK_2B4DFAB5C492210F FOREIGN KEY (tentacle_id) REFERENCES tentacle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tentacle_power ADD CONSTRAINT FK_2B4DFAB5AB4FC384 FOREIGN KEY (power_id) REFERENCES power (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tentacle DROP FOREIGN KEY FK_97815F076374DF63');
        $this->addSql('ALTER TABLE tentacle_power DROP FOREIGN KEY FK_2B4DFAB5AB4FC384');
        $this->addSql('ALTER TABLE tentacle_power DROP FOREIGN KEY FK_2B4DFAB5C492210F');
        $this->addSql('DROP TABLE kraken');
        $this->addSql('DROP TABLE power');
        $this->addSql('DROP TABLE pwer');
        $this->addSql('DROP TABLE tentacle');
        $this->addSql('DROP TABLE tentacle_power');
    }
}
