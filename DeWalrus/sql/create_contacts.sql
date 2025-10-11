
CREATE DATABASE IF NOT EXISTS walrus
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_0900_ai_ci;
USE walrus;


CREATE TABLE IF NOT EXISTS contacts (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  voornaam        VARCHAR(80)   NOT NULL,
  tussenvoegsel   VARCHAR(40)   NULL,
  achternaam      VARCHAR(120)  NOT NULL,
  email           VARCHAR(254)  NOT NULL,
  telefoon        VARCHAR(20)   NOT NULL,
  locatie         ENUM('Leeuwarden','Sneek','Beide') NOT NULL,
  onderwerp       VARCHAR(200)  NOT NULL,
  bericht         TEXT          NOT NULL,

  created_at      TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY idx_created (created_at),
  KEY idx_email (email)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_0900_ai_ci;
