<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230417160841 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Создание дополнительных ограничений';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BDAFD8C8E16C6B94 ON author (alias)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1FB30F98E16C6B94 ON book_category (alias)');
        $this->addSql('ALTER TABLE book_product DROP image_src');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DAF7E0E4E16C6B94 ON household_category (alias)');
        $this->addSql('ALTER TABLE product ADD image_src VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04ADE16C6B94 ON product (alias)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F43267A7E16C6B94 ON stationery_category (alias)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX UNIQ_D34A04ADE16C6B94');
        $this->addSql('ALTER TABLE product DROP image_src');
        $this->addSql('ALTER TABLE book_product ADD image_src VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX UNIQ_1FB30F98E16C6B94');
        $this->addSql('DROP INDEX UNIQ_BDAFD8C8E16C6B94');
        $this->addSql('DROP INDEX UNIQ_DAF7E0E4E16C6B94');
        $this->addSql('DROP INDEX UNIQ_F43267A7E16C6B94');
    }
}
