<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220525210805 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE condicion_iva (id INT AUTO_INCREMENT NOT NULL, codigo SMALLINT NOT NULL, condicion_iva VARCHAR(50) NOT NULL, alicuota NUMERIC(10, 3) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE producto_servicio (id INT AUTO_INCREMENT NOT NULL, rubro_id INT DEFAULT NULL, unidad_medida_id INT DEFAULT NULL, condicion_iva_id INT DEFAULT NULL, tipo VARCHAR(1) DEFAULT NULL, codigo VARCHAR(20) DEFAULT NULL, producto_servicio VARCHAR(255) DEFAULT NULL, precio_bruto_unitario NUMERIC(30, 2) DEFAULT NULL, UNIQUE INDEX UNIQ_E31583FF20332D99 (codigo), INDEX IDX_E31583FF96C5081 (rubro_id), INDEX IDX_E31583FF2E003F4 (unidad_medida_id), INDEX IDX_E31583FFE262B53E (condicion_iva_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rubro (id INT AUTO_INCREMENT NOT NULL, rubro VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unidad_medida (id INT AUTO_INCREMENT NOT NULL, codigo VARCHAR(5) NOT NULL, unidad_medida VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE producto_servicio ADD CONSTRAINT FK_E31583FF96C5081 FOREIGN KEY (rubro_id) REFERENCES rubro (id)');
        $this->addSql('ALTER TABLE producto_servicio ADD CONSTRAINT FK_E31583FF2E003F4 FOREIGN KEY (unidad_medida_id) REFERENCES unidad_medida (id)');
        $this->addSql('ALTER TABLE producto_servicio ADD CONSTRAINT FK_E31583FFE262B53E FOREIGN KEY (condicion_iva_id) REFERENCES condicion_iva (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE producto_servicio DROP FOREIGN KEY FK_E31583FFE262B53E');
        $this->addSql('ALTER TABLE producto_servicio DROP FOREIGN KEY FK_E31583FF96C5081');
        $this->addSql('ALTER TABLE producto_servicio DROP FOREIGN KEY FK_E31583FF2E003F4');
        $this->addSql('DROP TABLE condicion_iva');
        $this->addSql('DROP TABLE producto_servicio');
        $this->addSql('DROP TABLE rubro');
        $this->addSql('DROP TABLE unidad_medida');
    }
}
