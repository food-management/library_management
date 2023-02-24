<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230224091126 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE borrower_list ADD userbr_id INT NOT NULL');
        $this->addSql('ALTER TABLE borrower_list ADD CONSTRAINT FK_A0B02135A429BD7 FOREIGN KEY (userbr_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_A0B02135A429BD7 ON borrower_list (userbr_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE borrower_list DROP FOREIGN KEY FK_A0B02135A429BD7');
        $this->addSql('DROP INDEX IDX_A0B02135A429BD7 ON borrower_list');
        $this->addSql('ALTER TABLE borrower_list DROP userbr_id');
    }
}
