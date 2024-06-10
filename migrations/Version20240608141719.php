<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240608141719 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utilisateur_promotion (utilisateur_id INT NOT NULL, promotion_id INT NOT NULL, INDEX IDX_A1B388FDFB88E14F (utilisateur_id), INDEX IDX_A1B388FD139DF194 (promotion_id), PRIMARY KEY(utilisateur_id, promotion_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utilisateur_promotion ADD CONSTRAINT FK_A1B388FDFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_promotion ADD CONSTRAINT FK_A1B388FD139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session ADD professeur_id INT NOT NULL');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4BAB22EE9 FOREIGN KEY (professeur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_D044D5D4BAB22EE9 ON session (professeur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur_promotion DROP FOREIGN KEY FK_A1B388FDFB88E14F');
        $this->addSql('ALTER TABLE utilisateur_promotion DROP FOREIGN KEY FK_A1B388FD139DF194');
        $this->addSql('DROP TABLE utilisateur_promotion');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4BAB22EE9');
        $this->addSql('DROP INDEX IDX_D044D5D4BAB22EE9 ON session');
        $this->addSql('ALTER TABLE session DROP professeur_id');
    }
}
