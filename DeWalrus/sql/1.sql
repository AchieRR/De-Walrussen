CREATE TABLE `arrangementen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) NOT NULL,
  `beschrijving` text NOT NULL,
  `prijs` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `arrangementen` (`naam`, `beschrijving`, `prijs`) VALUES
('Romantisch Diner', 'Een speciaal diner voor twee personen met kaarslicht en een fles wijn.', 75.00),
('Familie Uitje', 'Een dag vol plezier voor het hele gezin, inclusief lunch en activiteiten.', 120.00),
('Wellness Dag', 'Een ontspannende dag in onze spa met massages en toegang tot alle faciliteiten.', 90.00);