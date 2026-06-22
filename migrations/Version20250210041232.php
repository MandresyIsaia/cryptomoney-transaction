<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250210041232 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE crypto_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE portefeuille_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE portfeuille_crypto_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE type_transation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE type_transationdr_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE transaction_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE transactiondr_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tablecrypto_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE commissionachat_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE commissionvente_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE favorie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE pdp_id_seq CASCADE');
        $this->addSql('ALTER TABLE tablecrypto DROP CONSTRAINT tablecrypto_id_crypto_fkey');
        $this->addSql('ALTER TABLE portefeuille DROP CONSTRAINT portefeuille_id_user_fkey');
        $this->addSql('ALTER TABLE portfeuille_crypto DROP CONSTRAINT portfeuille_crypto_id_portefeuille_fkey');
        $this->addSql('ALTER TABLE portfeuille_crypto DROP CONSTRAINT portfeuille_crypto_id_crypto_fkey');
        $this->addSql('ALTER TABLE transaction DROP CONSTRAINT transaction_id_user_fkey');
        $this->addSql('ALTER TABLE transaction DROP CONSTRAINT transaction_id_crypto_fkey');
        $this->addSql('ALTER TABLE transaction DROP CONSTRAINT transaction_id_transaction_fkey');
        $this->addSql('ALTER TABLE transactiondr DROP CONSTRAINT transactiondr_id_user_fkey');
        $this->addSql('ALTER TABLE transactiondr DROP CONSTRAINT transactiondr_id_transaction_fkey');
        $this->addSql('ALTER TABLE favorie DROP CONSTRAINT favorie_id_user_fkey');
        $this->addSql('ALTER TABLE favorie DROP CONSTRAINT favorie_id_crypto_fkey');
        $this->addSql('ALTER TABLE pdp DROP CONSTRAINT pdp_id_user_fkey');
        $this->addSql('DROP TABLE tablecrypto');
        $this->addSql('DROP TABLE portefeuille');
        $this->addSql('DROP TABLE portfeuille_crypto');
        $this->addSql('DROP TABLE crypto');
        $this->addSql('DROP TABLE type_transationdr');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE type_transation');
        $this->addSql('DROP TABLE transactiondr');
        $this->addSql('DROP TABLE commissionachat');
        $this->addSql('DROP TABLE commissionvente');
        $this->addSql('DROP TABLE favorie');
        $this->addSql('DROP TABLE pdp');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE crypto_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE portefeuille_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE portfeuille_crypto_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE type_transation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE type_transationdr_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE transaction_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE transactiondr_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tablecrypto_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE commissionachat_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE commissionvente_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE favorie_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE pdp_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE tablecrypto (id INT DEFAULT tablecrypto_id_seq NOT NULL, id_crypto INT DEFAULT NULL, court DOUBLE PRECISION DEFAULT \'0\', daty TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_EEEC09614E1F9D68 ON tablecrypto (id_crypto)');
        $this->addSql('CREATE TABLE portefeuille (id INT DEFAULT portefeuille_id_seq NOT NULL, id_user INT NOT NULL, fond DOUBLE PRECISION DEFAULT \'0\', PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2955FFFE6B3CA4B ON portefeuille (id_user)');
        $this->addSql('CREATE TABLE portfeuille_crypto (id INT DEFAULT portfeuille_crypto_id_seq NOT NULL, id_portefeuille INT NOT NULL, id_crypto INT DEFAULT NULL, quantite DOUBLE PRECISION DEFAULT \'0\', PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DAB1CD09A948A8C ON portfeuille_crypto (id_portefeuille)');
        $this->addSql('CREATE INDEX IDX_DAB1CD094E1F9D68 ON portfeuille_crypto (id_crypto)');
        $this->addSql('CREATE TABLE crypto (id INT DEFAULT crypto_id_seq NOT NULL, name VARCHAR(200) NOT NULL, court DOUBLE PRECISION DEFAULT \'0\', PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE type_transationdr (id INT DEFAULT type_transationdr_id_seq NOT NULL, nom VARCHAR(200) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE transaction (id INT DEFAULT transaction_id_seq NOT NULL, id_user INT DEFAULT NULL, id_crypto INT DEFAULT NULL, quantite DOUBLE PRECISION DEFAULT NULL, id_transaction INT DEFAULT NULL, daty TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, montanttotal DOUBLE PRECISION DEFAULT NULL, commission DOUBLE PRECISION DEFAULT \'0\', PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_723705D16B3CA4B ON transaction (id_user)');
        $this->addSql('CREATE INDEX IDX_723705D14E1F9D68 ON transaction (id_crypto)');
        $this->addSql('CREATE INDEX IDX_723705D16A25C826 ON transaction (id_transaction)');
        $this->addSql('CREATE TABLE type_transation (id INT DEFAULT type_transation_id_seq NOT NULL, nom VARCHAR(200) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE transactiondr (id INT DEFAULT transactiondr_id_seq NOT NULL, id_user INT DEFAULT NULL, id_transaction INT DEFAULT NULL, datydemande TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, montanttotal DOUBLE PRECISION DEFAULT NULL, datyacceptation TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_160ADEAA6B3CA4B ON transactiondr (id_user)');
        $this->addSql('CREATE INDEX IDX_160ADEAA6A25C826 ON transactiondr (id_transaction)');
        $this->addSql('CREATE TABLE commissionachat (id INT DEFAULT commissionachat_id_seq NOT NULL, valeur DOUBLE PRECISION DEFAULT \'0\', PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE commissionvente (id INT DEFAULT commissionvente_id_seq NOT NULL, valeur DOUBLE PRECISION DEFAULT \'0\', PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE favorie (id INT DEFAULT favorie_id_seq NOT NULL, id_user INT DEFAULT NULL, id_crypto INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7DE771636B3CA4B ON favorie (id_user)');
        $this->addSql('CREATE INDEX IDX_7DE771634E1F9D68 ON favorie (id_crypto)');
        $this->addSql('CREATE TABLE pdp (id INT DEFAULT pdp_id_seq NOT NULL, id_user INT DEFAULT NULL, image VARCHAR(200) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FA246EDD6B3CA4B ON pdp (id_user)');
        $this->addSql('ALTER TABLE tablecrypto ADD CONSTRAINT tablecrypto_id_crypto_fkey FOREIGN KEY (id_crypto) REFERENCES crypto (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE portefeuille ADD CONSTRAINT portefeuille_id_user_fkey FOREIGN KEY (id_user) REFERENCES users (user_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE portfeuille_crypto ADD CONSTRAINT portfeuille_crypto_id_portefeuille_fkey FOREIGN KEY (id_portefeuille) REFERENCES portefeuille (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE portfeuille_crypto ADD CONSTRAINT portfeuille_crypto_id_crypto_fkey FOREIGN KEY (id_crypto) REFERENCES crypto (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT transaction_id_user_fkey FOREIGN KEY (id_user) REFERENCES users (user_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT transaction_id_crypto_fkey FOREIGN KEY (id_crypto) REFERENCES crypto (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT transaction_id_transaction_fkey FOREIGN KEY (id_transaction) REFERENCES type_transation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE transactiondr ADD CONSTRAINT transactiondr_id_user_fkey FOREIGN KEY (id_user) REFERENCES users (user_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE transactiondr ADD CONSTRAINT transactiondr_id_transaction_fkey FOREIGN KEY (id_transaction) REFERENCES type_transationdr (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE favorie ADD CONSTRAINT favorie_id_user_fkey FOREIGN KEY (id_user) REFERENCES users (user_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE favorie ADD CONSTRAINT favorie_id_crypto_fkey FOREIGN KEY (id_crypto) REFERENCES crypto (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pdp ADD CONSTRAINT pdp_id_user_fkey FOREIGN KEY (id_user) REFERENCES users (user_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
