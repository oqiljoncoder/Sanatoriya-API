<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240625025924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE leadership ADD image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE leadership ADD CONSTRAINT FK_5D4299CE3DA5256D FOREIGN KEY (image_id) REFERENCES media_object (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5D4299CE3DA5256D ON leadership (image_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE leadership DROP FOREIGN KEY FK_5D4299CE3DA5256D');
        $this->addSql('DROP INDEX UNIQ_5D4299CE3DA5256D ON leadership');
        $this->addSql('ALTER TABLE leadership DROP image_id');
    }
}
