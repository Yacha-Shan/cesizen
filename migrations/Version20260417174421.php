<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260417174421 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // D'abord, remplir les NULL avec la date actuelle
        $this->addSql('UPDATE article SET updated_at = NOW() WHERE updated_at IS NULL');

        // Ensuite, rendre la colonne NOT NULL
        $this->addSql('ALTER TABLE article ALTER updated_at SET NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ALTER updated_at DROP NOT NULL');
    }
}
