-- DeWalrus/sql/create_reservations.sql
-- Nieuwe tabel voor reserveringen
-- log in je PHPMYADMIN en maak een nieuwe database met de naam walrus ( kleine letters ) en daarna als je op die walrus klikt zie je boven in t midden ong SQL staan dan klik je daarop en plak je de code hier onder helemaal er in en daarna druk je op GO
CREATE DATABASE IF NOT EXISTS walrus
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE walrus;


CREATE TABLE IF NOT EXISTS reservations (
  id                INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  created_at        TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

  voornaam          VARCHAR(80)      NOT NULL,
  tussenvoegsel     VARCHAR(30)      NULL,
  achternaam        VARCHAR(120)     NOT NULL,

  email             VARCHAR(190)     NOT NULL,
  telefoon          VARCHAR(20)      NOT NULL,

  locatie           ENUM('Leeuwarden','Sneek') NOT NULL,
  type              VARCHAR(60)      NOT NULL,

  reservation_date  DATE             NOT NULL,
  reservation_time  TIME             NOT NULL,
  guests            TINYINT UNSIGNED NOT NULL,

  user_agent        VARCHAR(255)     NULL,
  ip_address        VARBINARY(16)    NULL,

  INDEX idx_date_time (reservation_date, reservation_time),
  INDEX idx_email_date (email, reservation_date)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_0900_ai_ci;
