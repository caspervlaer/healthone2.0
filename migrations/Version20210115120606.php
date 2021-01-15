<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210115120606 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recept ADD CONSTRAINT FK_B92268A11BDAEE1 FOREIGN KEY (patienten_id) REFERENCES patienten (id)');
        $this->addSql('CREATE INDEX IDX_B92268A11BDAEE1 ON recept (patienten_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recept DROP FOREIGN KEY FK_B92268A11BDAEE1');
        $this->addSql('DROP INDEX IDX_B92268A11BDAEE1 ON recept');
    }
}
