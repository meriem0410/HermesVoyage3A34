<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240218011046 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE guide (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, num_tel INT NOT NULL, prenom VARCHAR(255) NOT NULL, disponibilite TINYINT(1) DEFAULT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE programme DROP FOREIGN KEY fk_programme_voyage');
        $this->addSql('DROP INDEX fk_programme_voyage ON programme');
        $this->addSql('ALTER TABLE programme DROP voyage_id');
        $this->addSql('ALTER TABLE tickets MODIFY id_ticket INT NOT NULL');
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY tickets_ibfk_1');
        $this->addSql('DROP INDEX transport_id ON tickets');
        $this->addSql('DROP INDEX `primary` ON tickets');
        $this->addSql('ALTER TABLE tickets DROP transport_id, CHANGE id_ticket id INT AUTO_INCREMENT NOT NULL, CHANGE depart depar VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE tickets ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE transport MODIFY id_base INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON transport');
        $this->addSql('ALTER TABLE transport CHANGE id_base id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE transport ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE voyage CHANGE type type VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE guide');
        $this->addSql('DROP TABLE test');
        $this->addSql('ALTER TABLE programme ADD voyage_id INT NOT NULL');
        $this->addSql('ALTER TABLE programme ADD CONSTRAINT fk_programme_voyage FOREIGN KEY (voyage_id) REFERENCES voyage (id)');
        $this->addSql('CREATE INDEX fk_programme_voyage ON programme (voyage_id)');
        $this->addSql('ALTER TABLE tickets MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON tickets');
        $this->addSql('ALTER TABLE tickets ADD transport_id INT DEFAULT NULL, CHANGE id id_ticket INT AUTO_INCREMENT NOT NULL, CHANGE depar depart VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT tickets_ibfk_1 FOREIGN KEY (transport_id) REFERENCES transport (id_base)');
        $this->addSql('CREATE INDEX transport_id ON tickets (transport_id)');
        $this->addSql('ALTER TABLE tickets ADD PRIMARY KEY (id_ticket)');
        $this->addSql('ALTER TABLE transport MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON transport');
        $this->addSql('ALTER TABLE transport CHANGE id id_base INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE transport ADD PRIMARY KEY (id_base)');
        $this->addSql('ALTER TABLE voyage CHANGE type type VARCHAR(255) DEFAULT NULL');
    }
}
