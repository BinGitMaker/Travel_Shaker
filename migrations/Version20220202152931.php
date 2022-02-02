<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220202152931 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE resto (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE city ADD resto_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B02342978E8D1 FOREIGN KEY (resto_id) REFERENCES resto (id)');
        $this->addSql('CREATE INDEX IDX_2D5B02342978E8D1 ON city (resto_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B02342978E8D1');
        $this->addSql('DROP TABLE resto');
        $this->addSql('ALTER TABLE activity CHANGE name name VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE picture picture VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX IDX_2D5B02342978E8D1 ON city');
        $this->addSql('ALTER TABLE city DROP resto_id, CHANGE name name VARCHAR(100) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE picture picture VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE content content LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE country CHANGE name name VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE hello hello VARCHAR(45) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE thanku thanku VARCHAR(45) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE picture picture VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE diving diving VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE content content LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE links links LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE hotel CHANGE name name VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE picture picture VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE url url VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
