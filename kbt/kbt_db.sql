-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 24 okt 2016 kl 12:35
-- Serverversion: 10.1.16-MariaDB
-- PHP-version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `kbtkund`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `bokning`
--

CREATE TABLE `bokning` (
  `bokning_id` int(11) NOT NULL,
  `terapeut_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `bokning_datum` date NOT NULL,
  `bokning_tid` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `bokning`
--

INSERT INTO `bokning` (`bokning_id`, `terapeut_id`, `patient_id`, `bokning_datum`, `bokning_tid`) VALUES
(1, 1, 1, '2016-09-26', '15:00:00');

-- --------------------------------------------------------

--
-- Tabellstruktur `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `fnamn` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `enamn` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `telefon` varchar(15) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `patient`
--

INSERT INTO `patient` (`id`, `fnamn`, `enamn`, `email`, `telefon`) VALUES
(1, 'Marko', 'Ivanovic', 'marko.ivanovic@hotmail.com', '0720050404'),
(2, 'Stig', 'Kent', 'test@test.tt', '011111111');

-- --------------------------------------------------------

--
-- Tabellstruktur `terapeut`
--

CREATE TABLE `terapeut` (
  `id` int(11) NOT NULL,
  `namn` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `telefon` varchar(15) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `terapeut`
--

INSERT INTO `terapeut` (`id`, `namn`, `email`, `telefon`) VALUES
(1, 'Mats Carlsson', 'test', '*111#');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `bokning`
--
ALTER TABLE `bokning`
  ADD PRIMARY KEY (`bokning_id`);

--
-- Index för tabell `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `terapeut`
--
ALTER TABLE `terapeut`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `bokning`
--
ALTER TABLE `bokning`
  MODIFY `bokning_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT för tabell `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT för tabell `terapeut`
--
ALTER TABLE `terapeut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
