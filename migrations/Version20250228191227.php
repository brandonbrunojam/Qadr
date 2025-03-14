<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250228191227 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users_tournaments (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, tournaments_id INT NOT NULL, INDEX IDX_1309C63167B3B43D (users_id), INDEX IDX_1309C631D92C1B5D (tournaments_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE users_tournaments ADD CONSTRAINT FK_1309C63167B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users_tournaments ADD CONSTRAINT FK_1309C631D92C1B5D FOREIGN KEY (tournaments_id) REFERENCES tournaments (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users_tournaments DROP FOREIGN KEY FK_1309C63167B3B43D');
        $this->addSql('ALTER TABLE users_tournaments DROP FOREIGN KEY FK_1309C631D92C1B5D');
        $this->addSql('DROP TABLE users_tournaments');
    }
}
