<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240626150139 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE new_page_media_object DROP FOREIGN KEY FK_C6EA4FBCD705300A');
        $this->addSql('ALTER TABLE new_page_media_object DROP FOREIGN KEY FK_C6EA4FBC64DE5A5');
        $this->addSql('DROP TABLE new_page_media_object');
        $this->addSql('ALTER TABLE new_page ADD image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE new_page ADD CONSTRAINT FK_E0E702FD3DA5256D FOREIGN KEY (image_id) REFERENCES media_object (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E0E702FD3DA5256D ON new_page (image_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE new_page_media_object (new_page_id INT NOT NULL, media_object_id INT NOT NULL, INDEX IDX_C6EA4FBCD705300A (new_page_id), INDEX IDX_C6EA4FBC64DE5A5 (media_object_id), PRIMARY KEY(new_page_id, media_object_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE new_page_media_object ADD CONSTRAINT FK_C6EA4FBCD705300A FOREIGN KEY (new_page_id) REFERENCES new_page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE new_page_media_object ADD CONSTRAINT FK_C6EA4FBC64DE5A5 FOREIGN KEY (media_object_id) REFERENCES media_object (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE new_page DROP FOREIGN KEY FK_E0E702FD3DA5256D');
        $this->addSql('DROP INDEX UNIQ_E0E702FD3DA5256D ON new_page');
        $this->addSql('ALTER TABLE new_page DROP image_id');
    }
}
