<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231120141402 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE roster ADD equipe_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE roster ADD CONSTRAINT FK_60B9ADF9254808DD FOREIGN KEY (equipe_id_id) REFERENCES equipe (id)');
        $this->addSql('CREATE INDEX IDX_60B9ADF9254808DD ON roster (equipe_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE roster DROP FOREIGN KEY FK_60B9ADF9254808DD');
        $this->addSql('DROP INDEX IDX_60B9ADF9254808DD ON roster');
        $this->addSql('ALTER TABLE roster DROP equipe_id_id');
    }
}
