<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260312134024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Renommage de la colonne fisrtname en firstname';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE "user" RENAME COLUMN fisrtname TO firstname');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE "user" RENAME COLUMN firstname TO fisrtname');
    }
}
