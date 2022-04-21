<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220420185237 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sections ADD formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sections ADD CONSTRAINT FK_2B9643985200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_2B9643985200282E ON sections (formation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sections DROP FOREIGN KEY FK_2B9643985200282E');
        $this->addSql('DROP INDEX IDX_2B9643985200282E ON sections');
        $this->addSql('ALTER TABLE sections DROP formation_id');
    }
}
