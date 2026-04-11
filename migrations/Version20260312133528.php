<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260312133528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // Ajout des colonnes avec une valeur par défaut temporaire pour les anciens utilisateurs
        $this->addSql("ALTER TABLE \"user\" ADD fisrtname VARCHAR(100) DEFAULT 'Inconnu' NOT NULL");
        $this->addSql("ALTER TABLE \"user\" ADD lastname VARCHAR(100) DEFAULT 'Inconnu' NOT NULL");
        $this->addSql("ALTER TABLE \"user\" ADD username VARCHAR(255) DEFAULT 'Inconnu' NOT NULL");

        // Suppression des valeurs par défaut (champs obligatoires sans défaut pour les nouveaux)
        $this->addSql('ALTER TABLE "user" ALTER COLUMN fisrtname DROP DEFAULT');
        $this->addSql('ALTER TABLE "user" ALTER COLUMN lastname DROP DEFAULT');
        $this->addSql('ALTER TABLE "user" ALTER COLUMN username DROP DEFAULT');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE "user" DROP fisrtname');
        $this->addSql('ALTER TABLE "user" DROP lastname');
        $this->addSql('ALTER TABLE "user" DROP username');
    }
}
