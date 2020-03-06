<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200305143103 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE par_date (id INT AUTO_INCREMENT NOT NULL, loc_achat_id INT DEFAULT NULL, type_produits_id INT DEFAULT NULL, date_de_creation DATE NOT NULL, description VARCHAR(255) NOT NULL, photo_base VARCHAR(255) NOT NULL, INDEX IDX_93C0151E992DBAB2 (loc_achat_id), INDEX IDX_93C0151E8608755E (type_produits_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE par_date ADD CONSTRAINT FK_93C0151E992DBAB2 FOREIGN KEY (loc_achat_id) REFERENCES loc_achat (id)');
        $this->addSql('ALTER TABLE par_date ADD CONSTRAINT FK_93C0151E8608755E FOREIGN KEY (type_produits_id) REFERENCES type_produit (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE par_date');
    }
}
