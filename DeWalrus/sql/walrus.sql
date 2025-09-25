-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 25 sep 2025 om 11:18
-- Serverversie: 8.4.6
-- PHP-versie: 8.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `walrus`
--
CREATE DATABASE IF NOT EXISTS `walrus` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `walrus`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Bestellingen`
--

DROP TABLE IF EXISTS `Bestellingen`;
CREATE TABLE `Bestellingen` (
  `Besteling ID` int NOT NULL,
  `Menukaart ID` int NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `Straat` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tabel leegmaken voor invoegen `Bestellingen`
--

TRUNCATE TABLE `Bestellingen`;
-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Menukaart`
--

DROP TABLE IF EXISTS `Menukaart`;
CREATE TABLE `Menukaart` (
  `Menukaart ID` int NOT NULL,
  `Naam` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Omschrijving` text COLLATE utf8mb4_general_ci NOT NULL,
  `Ingrediënten` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Prijs` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tabel leegmaken voor invoegen `Menukaart`
--

TRUNCATE TABLE `Menukaart`;
--
-- Gegevens worden geëxporteerd voor tabel `Menukaart`
--

INSERT INTO `Menukaart` (`Menukaart ID`, `Naam`, `Omschrijving`, `Ingrediënten`, `Prijs`) VALUES
(1, 'garnalen special', 'garnalen in bieslook en olie ', 'garnaal, olijf olie, bieslook, zoutpeper', '12,50'),
(2, 'Het Bakje', 'bakje eten met alles op de menukaart dat er is. met heel veel honing', 'zuurkool, honing, pitjes, noten, broccoli, boerenkool, pasta, kroepoek, honing, rode kool, ', '4,95');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Menukaart`
--
ALTER TABLE `Menukaart`
  ADD PRIMARY KEY (`Menukaart ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Menukaart`
--
ALTER TABLE `Menukaart`
  MODIFY `Menukaart ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
