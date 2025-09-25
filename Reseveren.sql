-- Postgres / MySQL (veelal compatibel)
CREATE TABLE reservations (
  id SERIAL PRIMARY KEY,           -- MySQL: use INT AUTO_INCREMENT
  customer_name VARCHAR(150) NOT NULL,
  customer_email VARCHAR(255),
  customer_phone VARCHAR(30),
  reserved_at TIMESTAMP NOT NULL,  -- datum en tijd van de reservering
  party_size INT DEFAULT 1,
  location VARCHAR(200),
  notes TEXT,
  status VARCHAR(20) DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
