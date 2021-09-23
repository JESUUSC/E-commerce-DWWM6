<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210923141313 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contenu_panier (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, quantite INTEGER NOT NULL, date_ajout DATE NOT NULL)');
        $this->addSql('CREATE TABLE contenu_panier_produit (contenu_panier_id INTEGER NOT NULL, produit_id INTEGER NOT NULL, PRIMARY KEY(contenu_panier_id, produit_id))');
        $this->addSql('CREATE INDEX IDX_179C43E361405BF ON contenu_panier_produit (contenu_panier_id)');
        $this->addSql('CREATE INDEX IDX_179C43E3F347EFB ON contenu_panier_produit (produit_id)');
        $this->addSql('CREATE TABLE panier (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, date_achat DATETIME NOT NULL, etat BOOLEAN NOT NULL)');
        $this->addSql('CREATE TABLE panier_user (panier_id INTEGER NOT NULL, user_id INTEGER NOT NULL, PRIMARY KEY(panier_id, user_id))');
        $this->addSql('CREATE INDEX IDX_7975F330F77D927C ON panier_user (panier_id)');
        $this->addSql('CREATE INDEX IDX_7975F330A76ED395 ON panier_user (user_id)');
        $this->addSql('CREATE TABLE produit (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(60) NOT NULL, description VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, stock INTEGER NOT NULL, photo VARCHAR(40) DEFAULT NULL)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, is_verified BOOLEAN NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE contenu_panier');
        $this->addSql('DROP TABLE contenu_panier_produit');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE panier_user');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE user');
    }
}
