<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210312173726 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tentacle_power (tentacle_id INT NOT NULL, power_id INT NOT NULL, INDEX IDX_2B4DFAB5C492210F (tentacle_id), INDEX IDX_2B4DFAB5AB4FC384 (power_id), PRIMARY KEY(tentacle_id, power_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tentacle_power ADD CONSTRAINT FK_2B4DFAB5C492210F FOREIGN KEY (tentacle_id) REFERENCES tentacle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tentacle_power ADD CONSTRAINT FK_2B4DFAB5AB4FC384 FOREIGN KEY (power_id) REFERENCES power (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tentacle ADD kraken_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE tentacle ADD CONSTRAINT FK_97815F076374DF63 FOREIGN KEY (kraken_id_id) REFERENCES kraken (id)');
        $this->addSql('CREATE INDEX IDX_97815F076374DF63 ON tentacle (kraken_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE tentacle_power');
        $this->addSql('ALTER TABLE tentacle DROP FOREIGN KEY FK_97815F076374DF63');
        $this->addSql('DROP INDEX IDX_97815F076374DF63 ON tentacle');
        $this->addSql('ALTER TABLE tentacle DROP kraken_id_id');
    }
}
