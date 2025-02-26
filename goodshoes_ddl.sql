CREATE SCHEMA IF NOT EXISTS goodshoes DEFAULT CHARACTER SET utf8 ;
USE goodshoes ;

-- -----------------------------------------------------
-- Table goodshoes.users
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS goodshoes.users (
  id INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(20) NULL,
  email VARCHAR(255) NULL,
  type VARCHAR(20) NULL,
  password VARCHAR(255) NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX email_UNIQUE (email ASC),
  UNIQUE INDEX username_UNIQUE (username ASC))
;

-- -----------------------------------------------------
-- Table goodshoes.products
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS goodshoes.products (
  id INT NOT NULL AUTO_INCREMENT,
  type VARCHAR(10) NULL,
  merk VARCHAR(45) NULL,
  nama VARCHAR(45) NULL,
  kode_produk VARCHAR(45) NULL,
  price INT NULL,
  image VARCHAR(255) NULL,
  PRIMARY KEY (id))
;


-- -----------------------------------------------------
-- Table goodshoes.products_variants
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS goodshoes.products_variants (
  id INT NOT NULL AUTO_INCREMENT,
  id_product INT NOT NULL,
  size_type VARCHAR(2) NULL,
  size INT NULL,
  stock INT NULL,
  warna VARCHAR(10) NULL,
  PRIMARY KEY (id),
  INDEX fk_products_variants_products1_idx (id_product ASC),
  CONSTRAINT fk_products_variants_products1
    FOREIGN KEY (id_product)
    REFERENCES goodshoes.products (id)
)
;


-- -----------------------------------------------------
-- Table goodshoes.transaction
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS goodshoes.transaction (
  id INT NOT NULL AUTO_INCREMENT,
  id_user INT NOT NULL,
  timestamp TIMESTAMP NULL,
  status VARCHAR(10) NULL,
  PRIMARY KEY (id),
  INDEX fk_transaction_users1_idx (id_user ASC),
  CONSTRAINT fk_transaction_users1
    FOREIGN KEY (id_user)
    REFERENCES goodshoes.users (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
;


-- -----------------------------------------------------
-- Table goodshoes.user_transaction_detail
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS goodshoes.user_transaction_detail (
  id INT NOT NULL AUTO_INCREMENT,
  id_transaction INT NOT NULL,
  id_product INT NOT NULL,
  price INT NULL,
  PRIMARY KEY (id),
  INDEX fk_user_transaction_detail_users_transaction_idx (id_transaction ASC),
  INDEX fk_user_transaction_detail_products1_idx (id_product ASC),
  CONSTRAINT fk_user_transaction_detail_users_transaction
    FOREIGN KEY (id_transaction)
    REFERENCES goodshoes.transaction (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_user_transaction_detail_products1
    FOREIGN KEY (id_product)
    REFERENCES goodshoes.products (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
;