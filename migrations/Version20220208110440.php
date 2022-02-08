<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220208110440 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE flux (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, flux VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE screen ADD screen_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE screen ADD CONSTRAINT FK_DF4C6130243BE13 FOREIGN KEY (screen_id_id) REFERENCES flux (id)');
        $this->addSql('CREATE INDEX IDX_DF4C6130243BE13 ON screen (screen_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE screen DROP FOREIGN KEY FK_DF4C6130243BE13');
        $this->addSql('DROP TABLE flux');
        $this->addSql('ALTER TABLE `group` CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE media CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE contenu contenu VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX IDX_DF4C6130243BE13 ON screen');
        $this->addSql('ALTER TABLE screen DROP screen_id_id, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ip_adress ip_adress VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
