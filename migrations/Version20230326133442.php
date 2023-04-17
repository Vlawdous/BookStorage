<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230326133442 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE author_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE book_category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE book_product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cover_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE household_category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE household_product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE product_tag_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE product_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE rating_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE stationery_category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE stationery_product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE author (id INT NOT NULL, full_name VARCHAR(255) NOT NULL, alias VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE book_category (id INT NOT NULL, name VARCHAR(255) NOT NULL, alias VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE book_product (id INT NOT NULL, product_id INT NOT NULL, cover_type_id INT NOT NULL, date_publicate DATE DEFAULT NULL, image_src VARCHAR(255) NOT NULL, number_of_pages INT NOT NULL, publisher VARCHAR(255) NOT NULL, circulation INT NOT NULL, weight NUMERIC(10, 2) NOT NULL, age_limit INT NOT NULL, horizontal_length NUMERIC(10, 2) NOT NULL, vertical_length NUMERIC(10, 2) NOT NULL, width NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_406A2C3B4584665A ON book_product (product_id)');
        $this->addSql('CREATE INDEX IDX_406A2C3BCDA10D3B ON book_product (cover_type_id)');
        $this->addSql('CREATE TABLE book_product_book_category (book_product_id INT NOT NULL, book_category_id INT NOT NULL, PRIMARY KEY(book_product_id, book_category_id))');
        $this->addSql('CREATE INDEX IDX_69E45F67DA292CE9 ON book_product_book_category (book_product_id)');
        $this->addSql('CREATE INDEX IDX_69E45F6740B1D29E ON book_product_book_category (book_category_id)');
        $this->addSql('CREATE TABLE book_product_author (book_product_id INT NOT NULL, author_id INT NOT NULL, PRIMARY KEY(book_product_id, author_id))');
        $this->addSql('CREATE INDEX IDX_D6003C7FDA292CE9 ON book_product_author (book_product_id)');
        $this->addSql('CREATE INDEX IDX_D6003C7FF675F31B ON book_product_author (author_id)');
        $this->addSql('CREATE TABLE cover_type (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE household_category (id INT NOT NULL, name VARCHAR(255) NOT NULL, alias VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE household_product (id INT NOT NULL, product_id INT NOT NULL, household_category_id INT NOT NULL, horizintal_lenght NUMERIC(10, 2) NOT NULL, vertical_lenght NUMERIC(10, 2) NOT NULL, width NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BEBEEE834584665A ON household_product (product_id)');
        $this->addSql('CREATE INDEX IDX_BEBEEE83B50D29C5 ON household_product (household_category_id)');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, product_type_id INT NOT NULL, name VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, alias VARCHAR(255) NOT NULL, price NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D34A04AD14959723 ON product (product_type_id)');
        $this->addSql('CREATE TABLE product_tag (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE product_tag_product (product_tag_id INT NOT NULL, product_id INT NOT NULL, PRIMARY KEY(product_tag_id, product_id))');
        $this->addSql('CREATE INDEX IDX_4D54B718D8AE22B5 ON product_tag_product (product_tag_id)');
        $this->addSql('CREATE INDEX IDX_4D54B7184584665A ON product_tag_product (product_id)');
        $this->addSql('CREATE TABLE product_type (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE rating (id INT NOT NULL, product_id INT DEFAULT NULL, rating_value NUMERIC(2, 1) NOT NULL, plus_text TEXT DEFAULT NULL, minus_text TEXT DEFAULT NULL, total_text TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D88926224584665A ON rating (product_id)');
        $this->addSql('CREATE TABLE stationery_category (id INT NOT NULL, name VARCHAR(255) NOT NULL, alias VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE stationery_product (id INT NOT NULL, product_id INT NOT NULL, stationery_category_id INT NOT NULL, horizontal_lenght NUMERIC(10, 2) NOT NULL, vertical_lenght NUMERIC(10, 2) NOT NULL, width NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CF342CFE4584665A ON stationery_product (product_id)');
        $this->addSql('CREATE INDEX IDX_CF342CFE581D22C1 ON stationery_product (stationery_category_id)');
        $this->addSql('ALTER TABLE book_product ADD CONSTRAINT FK_406A2C3B4584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE book_product ADD CONSTRAINT FK_406A2C3BCDA10D3B FOREIGN KEY (cover_type_id) REFERENCES cover_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE book_product_book_category ADD CONSTRAINT FK_69E45F67DA292CE9 FOREIGN KEY (book_product_id) REFERENCES book_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE book_product_book_category ADD CONSTRAINT FK_69E45F6740B1D29E FOREIGN KEY (book_category_id) REFERENCES book_category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE book_product_author ADD CONSTRAINT FK_D6003C7FDA292CE9 FOREIGN KEY (book_product_id) REFERENCES book_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE book_product_author ADD CONSTRAINT FK_D6003C7FF675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE household_product ADD CONSTRAINT FK_BEBEEE834584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE household_product ADD CONSTRAINT FK_BEBEEE83B50D29C5 FOREIGN KEY (household_category_id) REFERENCES household_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD14959723 FOREIGN KEY (product_type_id) REFERENCES product_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_tag_product ADD CONSTRAINT FK_4D54B718D8AE22B5 FOREIGN KEY (product_tag_id) REFERENCES product_tag (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_tag_product ADD CONSTRAINT FK_4D54B7184584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D88926224584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE stationery_product ADD CONSTRAINT FK_CF342CFE4584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE stationery_product ADD CONSTRAINT FK_CF342CFE581D22C1 FOREIGN KEY (stationery_category_id) REFERENCES stationery_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE author_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE book_category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE book_product_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cover_type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE household_category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE household_product_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE product_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE product_tag_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE product_type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE rating_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE stationery_category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE stationery_product_id_seq CASCADE');
        $this->addSql('ALTER TABLE book_product DROP CONSTRAINT FK_406A2C3B4584665A');
        $this->addSql('ALTER TABLE book_product DROP CONSTRAINT FK_406A2C3BCDA10D3B');
        $this->addSql('ALTER TABLE book_product_book_category DROP CONSTRAINT FK_69E45F67DA292CE9');
        $this->addSql('ALTER TABLE book_product_book_category DROP CONSTRAINT FK_69E45F6740B1D29E');
        $this->addSql('ALTER TABLE book_product_author DROP CONSTRAINT FK_D6003C7FDA292CE9');
        $this->addSql('ALTER TABLE book_product_author DROP CONSTRAINT FK_D6003C7FF675F31B');
        $this->addSql('ALTER TABLE household_product DROP CONSTRAINT FK_BEBEEE834584665A');
        $this->addSql('ALTER TABLE household_product DROP CONSTRAINT FK_BEBEEE83B50D29C5');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD14959723');
        $this->addSql('ALTER TABLE product_tag_product DROP CONSTRAINT FK_4D54B718D8AE22B5');
        $this->addSql('ALTER TABLE product_tag_product DROP CONSTRAINT FK_4D54B7184584665A');
        $this->addSql('ALTER TABLE rating DROP CONSTRAINT FK_D88926224584665A');
        $this->addSql('ALTER TABLE stationery_product DROP CONSTRAINT FK_CF342CFE4584665A');
        $this->addSql('ALTER TABLE stationery_product DROP CONSTRAINT FK_CF342CFE581D22C1');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE book_category');
        $this->addSql('DROP TABLE book_product');
        $this->addSql('DROP TABLE book_product_book_category');
        $this->addSql('DROP TABLE book_product_author');
        $this->addSql('DROP TABLE cover_type');
        $this->addSql('DROP TABLE household_category');
        $this->addSql('DROP TABLE household_product');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_tag');
        $this->addSql('DROP TABLE product_tag_product');
        $this->addSql('DROP TABLE product_type');
        $this->addSql('DROP TABLE rating');
        $this->addSql('DROP TABLE stationery_category');
        $this->addSql('DROP TABLE stationery_product');
    }
}
