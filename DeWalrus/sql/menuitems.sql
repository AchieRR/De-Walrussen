CREATE DATABASE IF NOT EXISTS walrus
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE walrus;

-- 2) Tabel voor sollicitaties
CREATE TABLE IF NOT EXISTS applications (
  id            INT UNSIGNED NOT NULL AUTO_INCREMENT,

   naam       VARCHAR(80)  NOT NULL,

  ingredienten         VARCHAR(190) NOT NULL,
  prijs      VARCHAR(32)  NOT NULL,

  PRIMARY KEY (id)
)ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci;