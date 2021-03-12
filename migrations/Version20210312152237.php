<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210312152237 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE pwer');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_257B8A8F5E237E06 ON kraken (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AB8A01A05E237E06 ON power (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_97815F075E237E06 ON tentacle (name)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pwer (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP INDEX UNIQ_257B8A8F5E237E06 ON kraken');
        $this->addSql('DROP INDEX UNIQ_AB8A01A05E237E06 ON power');
        $this->addSql('DROP INDEX UNIQ_97815F075E237E06 ON tentacle');
    }
}
