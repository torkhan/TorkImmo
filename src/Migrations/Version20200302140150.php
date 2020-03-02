<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200302140150 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produits ADD type_produits_id_id INT NOT NULL, ADD ville_id_id INT NOT NULL, ADD loc_achat_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8C5CF0C38D FOREIGN KEY (type_produits_id_id) REFERENCES type_produit (id)');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8CF0C17188 FOREIGN KEY (ville_id_id) REFERENCES zip (id)');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8CFB6EF590 FOREIGN KEY (loc_achat_id_id) REFERENCES loc_achat (id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8C5CF0C38D ON produits (type_produits_id_id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8CF0C17188 ON produits (ville_id_id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8CFB6EF590 ON produits (loc_achat_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8C5CF0C38D');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8CF0C17188');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8CFB6EF590');
        $this->addSql('DROP INDEX IDX_BE2DDF8C5CF0C38D ON produits');
        $this->addSql('DROP INDEX IDX_BE2DDF8CF0C17188 ON produits');
        $this->addSql('DROP INDEX IDX_BE2DDF8CFB6EF590 ON produits');
        $this->addSql('ALTER TABLE produits DROP type_produits_id_id, DROP ville_id_id, DROP loc_achat_id_id');
    }
}
