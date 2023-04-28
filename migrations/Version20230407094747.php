<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230407094747 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voiture ADD COLUMN contact VARCHAR(150) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__voiture AS SELECT id, nom, image, prix, description, a_louer FROM voiture');
        $this->addSql('DROP TABLE voiture');
        $this->addSql('CREATE TABLE voiture (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(20) NOT NULL, image VARCHAR(255) NOT NULL, prix VARCHAR(30) NOT NULL, description CLOB DEFAULT NULL, a_louer BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO voiture (id, nom, image, prix, description, a_louer) SELECT id, nom, image, prix, description, a_louer FROM __temp__voiture');
        $this->addSql('DROP TABLE __temp__voiture');
    }
}
