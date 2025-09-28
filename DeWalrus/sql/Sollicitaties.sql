-- deze gebruiken we voor niks 

-- log in je PHPMYADMIN en maak een nieuwe database met de naam walrus ( kleine letters ) en daarna als je op die walrus klikt zie je boven in t midden ong SQL staan dan klik je daarop en plak je de code hier onder helemaal er in en daarna druk je op GO
CREATE DATABASE IF NOT EXISTS walrus
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE walrus;

-- 2) Tabel voor sollicitaties
CREATE TABLE IF NOT EXISTS applications (
  id            INT UNSIGNED NOT NULL AUTO_INCREMENT,
  created_at    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

  voornaam      VARCHAR(80)  NOT NULL,
  tussenvoegsel VARCHAR(40)  NULL,
  achternaam    VARCHAR(120) NOT NULL,

  email         VARCHAR(190) NOT NULL,
  telefoon      VARCHAR(32)  NOT NULL,

  straat        VARCHAR(120) NOT NULL,
  huisnummer    VARCHAR(20)  NOT NULL,
  postcode      VARCHAR(8)   NOT NULL,
  woonplaats    VARCHAR(120) NOT NULL,

  leeftijd      TINYINT UNSIGNED NOT NULL,

  dienstverband ENUM('Fulltime','Parttime') NOT NULL,
  maxuren       TINYINT UNSIGNED NULL,

  functie       VARCHAR(120) NOT NULL,
  motivatie     TEXT         NOT NULL,

  locatie       ENUM('Leeuwarden','Sneek','Beide') NOT NULL,

  bron          TEXT NULL,            -- CSV van de checkboxen
  bron_anders   VARCHAR(255) NULL,

  PRIMARY KEY (id),
  KEY idx_created_at (created_at),
  KEY idx_email (email)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci;
