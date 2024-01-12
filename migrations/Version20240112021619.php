<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240112021619 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cardapio (id INT AUTO_INCREMENT NOT NULL, id_alimento_id INT DEFAULT NULL, data DATETIME NOT NULL, INDEX IDX_828616368F5DE398 (id_alimento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cardapio ADD CONSTRAINT FK_828616368F5DE398 FOREIGN KEY (id_alimento_id) REFERENCES alimento (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cardapio DROP FOREIGN KEY FK_828616368F5DE398');
        $this->addSql('DROP TABLE cardapio');
    }
}
