<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230108215944 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(255) NOT NULL, ordered_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orderitem (id INT AUTO_INCREMENT NOT NULL, product_id VARCHAR(100) NOT NULL, order_id INT DEFAULT NULL, quantity INT NOT NULL, INDEX IDX_112B73844584665A (product_id), INDEX IDX_112B73848D9F6D38 (order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products (id VARCHAR(100) NOT NULL, name VARCHAR(100) NOT NULL, ingredients TINYTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email CHAR(32) NOT NULL COMMENT \'User\'\'s email addres\', name VARCHAR(60) NOT NULL, password VARCHAR(100) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE orderitem ADD CONSTRAINT FK_112B73844584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE orderitem ADD CONSTRAINT FK_112B73848D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orderitem DROP FOREIGN KEY FK_112B73844584665A');
        $this->addSql('ALTER TABLE orderitem DROP FOREIGN KEY FK_112B73848D9F6D38');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE orderitem');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE users');
    }
}
