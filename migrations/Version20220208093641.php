<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220208093641 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE broadcast (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `group` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE screen (id INT AUTO_INCREMENT NOT NULL, broadcast_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, ip_adress VARCHAR(255) NOT NULL, INDEX IDX_DF4C61309C7E80E0 (broadcast_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE screen_group (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE screen_group_screen (screen_group_id INT NOT NULL, screen_id INT NOT NULL, INDEX IDX_905749ED82274D27 (screen_group_id), INDEX IDX_905749ED41A67722 (screen_id), PRIMARY KEY(screen_group_id, screen_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE screen_group_group (screen_group_id INT NOT NULL, group_id INT NOT NULL, INDEX IDX_A91ACB6682274D27 (screen_group_id), INDEX IDX_A91ACB66FE54D947 (group_id), PRIMARY KEY(screen_group_id, group_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE screen ADD CONSTRAINT FK_DF4C61309C7E80E0 FOREIGN KEY (broadcast_id) REFERENCES broadcast (id)');
        $this->addSql('ALTER TABLE screen_group_screen ADD CONSTRAINT FK_905749ED82274D27 FOREIGN KEY (screen_group_id) REFERENCES screen_group (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE screen_group_screen ADD CONSTRAINT FK_905749ED41A67722 FOREIGN KEY (screen_id) REFERENCES screen (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE screen_group_group ADD CONSTRAINT FK_A91ACB6682274D27 FOREIGN KEY (screen_group_id) REFERENCES screen_group (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE screen_group_group ADD CONSTRAINT FK_A91ACB66FE54D947 FOREIGN KEY (group_id) REFERENCES `group` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE screen DROP FOREIGN KEY FK_DF4C61309C7E80E0');
        $this->addSql('ALTER TABLE screen_group_group DROP FOREIGN KEY FK_A91ACB66FE54D947');
        $this->addSql('ALTER TABLE screen_group_screen DROP FOREIGN KEY FK_905749ED41A67722');
        $this->addSql('ALTER TABLE screen_group_screen DROP FOREIGN KEY FK_905749ED82274D27');
        $this->addSql('ALTER TABLE screen_group_group DROP FOREIGN KEY FK_A91ACB6682274D27');
        $this->addSql('DROP TABLE broadcast');
        $this->addSql('DROP TABLE `group`');
        $this->addSql('DROP TABLE screen');
        $this->addSql('DROP TABLE screen_group');
        $this->addSql('DROP TABLE screen_group_screen');
        $this->addSql('DROP TABLE screen_group_group');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
