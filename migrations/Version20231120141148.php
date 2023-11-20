<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231120141148 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur_roster (id INT AUTO_INCREMENT NOT NULL, joueur_id_id INT DEFAULT NULL, roster_id_id INT DEFAULT NULL, date_roster DATE NOT NULL, INDEX IDX_8902BD75A7F12751 (joueur_id_id), INDEX IDX_8902BD7567FBAB0D (roster_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matchs (id INT AUTO_INCREMENT NOT NULL, tournoi_id_id INT DEFAULT NULL, date_match DATE NOT NULL, INDEX IDX_6B1E604195CC3A82 (tournoi_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roster (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roster_matchs (id INT AUTO_INCREMENT NOT NULL, matchs_id_id INT DEFAULT NULL, roster_id_id INT DEFAULT NULL, victorieux TINYINT(1) NOT NULL, INDEX IDX_E0B8679E5C0ED822 (matchs_id_id), INDEX IDX_E0B8679E67FBAB0D (roster_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stat_joueur_match (id INT AUTO_INCREMENT NOT NULL, match_id_id INT DEFAULT NULL, joueur_id_id INT DEFAULT NULL, kills INT NOT NULL, deaths INT NOT NULL, assists INT NOT NULL, kda INT NOT NULL, INDEX IDX_A5161A9C12EE1F6 (match_id_id), INDEX IDX_A5161A9A7F12751 (joueur_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tournoi (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE joueur_roster ADD CONSTRAINT FK_8902BD75A7F12751 FOREIGN KEY (joueur_id_id) REFERENCES joueur (id)');
        $this->addSql('ALTER TABLE joueur_roster ADD CONSTRAINT FK_8902BD7567FBAB0D FOREIGN KEY (roster_id_id) REFERENCES roster (id)');
        $this->addSql('ALTER TABLE matchs ADD CONSTRAINT FK_6B1E604195CC3A82 FOREIGN KEY (tournoi_id_id) REFERENCES tournoi (id)');
        $this->addSql('ALTER TABLE roster_matchs ADD CONSTRAINT FK_E0B8679E5C0ED822 FOREIGN KEY (matchs_id_id) REFERENCES matchs (id)');
        $this->addSql('ALTER TABLE roster_matchs ADD CONSTRAINT FK_E0B8679E67FBAB0D FOREIGN KEY (roster_id_id) REFERENCES roster (id)');
        $this->addSql('ALTER TABLE stat_joueur_match ADD CONSTRAINT FK_A5161A9C12EE1F6 FOREIGN KEY (match_id_id) REFERENCES matchs (id)');
        $this->addSql('ALTER TABLE stat_joueur_match ADD CONSTRAINT FK_A5161A9A7F12751 FOREIGN KEY (joueur_id_id) REFERENCES joueur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE joueur_roster DROP FOREIGN KEY FK_8902BD75A7F12751');
        $this->addSql('ALTER TABLE joueur_roster DROP FOREIGN KEY FK_8902BD7567FBAB0D');
        $this->addSql('ALTER TABLE matchs DROP FOREIGN KEY FK_6B1E604195CC3A82');
        $this->addSql('ALTER TABLE roster_matchs DROP FOREIGN KEY FK_E0B8679E5C0ED822');
        $this->addSql('ALTER TABLE roster_matchs DROP FOREIGN KEY FK_E0B8679E67FBAB0D');
        $this->addSql('ALTER TABLE stat_joueur_match DROP FOREIGN KEY FK_A5161A9C12EE1F6');
        $this->addSql('ALTER TABLE stat_joueur_match DROP FOREIGN KEY FK_A5161A9A7F12751');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE joueur');
        $this->addSql('DROP TABLE joueur_roster');
        $this->addSql('DROP TABLE matchs');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE roster');
        $this->addSql('DROP TABLE roster_matchs');
        $this->addSql('DROP TABLE stat_joueur_match');
        $this->addSql('DROP TABLE tournoi');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
