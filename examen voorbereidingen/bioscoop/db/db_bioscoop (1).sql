-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 31 mei 2020 om 13:51
-- Serverversie: 10.1.38-MariaDB
-- PHP-versie: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bioscoop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tb_film`
--

CREATE TABLE `tb_film` (
  `filmid` int(11) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `beschrijving` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tb_film`
--

INSERT INTO `tb_film` (`filmid`, `titel`, `beschrijving`, `foto`) VALUES
(1, 'bloodshot', 'lorem ipsum', 'image2.jpg'),
(2, 'blackwidow', 'lorem ipsum', 'image1.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tb_locatie`
--

CREATE TABLE `tb_locatie` (
  `locatie_id` int(11) NOT NULL,
  `plaatsnaam` varchar(11) NOT NULL,
  `aantalstoelen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tb_locatie`
--

INSERT INTO `tb_locatie` (`locatie_id`, `plaatsnaam`, `aantalstoelen`) VALUES
(1, 'Sittard', 20),
(2, 'Maastricht', 40),
(3, 'Venlo', 60);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tb_programma`
--

CREATE TABLE `tb_programma` (
  `programma_id` int(11) NOT NULL,
  `filmid` int(11) NOT NULL,
  `locatie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tb_programma`
--

INSERT INTO `tb_programma` (`programma_id`, `filmid`, `locatie_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3),
(7, 3, 1),
(8, 3, 2),
(9, 3, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tb_stoel`
--

CREATE TABLE `tb_stoel` (
  `stoelid` int(11) NOT NULL,
  `programma_id` int(11) NOT NULL,
  `stoelnummer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `tb_film`
--
ALTER TABLE `tb_film`
  ADD PRIMARY KEY (`filmid`),
  ADD UNIQUE KEY `filmid` (`filmid`);

--
-- Indexen voor tabel `tb_locatie`
--
ALTER TABLE `tb_locatie`
  ADD PRIMARY KEY (`locatie_id`),
  ADD UNIQUE KEY `locatie_id` (`locatie_id`);

--
-- Indexen voor tabel `tb_stoel`
--
ALTER TABLE `tb_stoel`
  ADD PRIMARY KEY (`stoelid`),
  ADD UNIQUE KEY `stoelid` (`stoelid`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `tb_stoel`
--
ALTER TABLE `tb_stoel`
  MODIFY `stoelid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
