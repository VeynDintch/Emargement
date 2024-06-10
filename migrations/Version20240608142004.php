<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240608142004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4BAB22EE9');
        $this->addSql('DROP INDEX IDX_D044D5D4BAB22EE9 ON session');
        $this->addSql('ALTER TABLE session DROP professeur_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE session ADD professeur_id INT NOT NULL');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4BAB22EE9 FOREIGN KEY (professeur_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D044D5D4BAB22EE9 ON session (professeur_id)');
    }
}
