-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 05. Apr 2023 um 15:10
-- Server-Version: 10.4.27-MariaDB
-- PHP-Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `BE18_CR5_Ruedenauer`
--
CREATE DATABASE IF NOT EXISTS `BE18_CR5_Ruedenauer` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `BE18_CR5_Ruedenauer`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animal_size`
--

CREATE TABLE `animal_size` (
  `size_id` int(11) NOT NULL,
  `size` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `animal_size`
--

INSERT INTO `animal_size` (`size_id`, `size`) VALUES
(1, 'small'),
(2, 'big');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animal_status`
--

CREATE TABLE `animal_status` (
  `animalstatus_id` int(11) NOT NULL,
  `animal_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `animal_status`
--

INSERT INTO `animal_status` (`animalstatus_id`, `animal_status`) VALUES
(1, 'available'),
(2, 'reserved');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animal_type`
--

CREATE TABLE `animal_type` (
  `type_id` int(11) NOT NULL,
  `animal_type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `animal_type`
--

INSERT INTO `animal_type` (`type_id`, `animal_type`) VALUES
(1, 'Dog'),
(2, 'Cat'),
(3, 'Bird'),
(4, 'Reptile');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `breed`
--

CREATE TABLE `breed` (
  `breed_id` int(11) NOT NULL,
  `breed_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `breed`
--

INSERT INTO `breed` (`breed_id`, `breed_name`) VALUES
(1, 'Dobermann'),
(2, 'Deutscher Schäferhund'),
(3, 'Hauskatze'),
(4, 'Crocodile'),
(5, 'Snake'),
(6, 'Wellensittich'),
(7, 'Amsel'),
(8, 'Krähe'),
(9, 'Asian cat'),
(10, 'Balinese');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pets`
--

CREATE TABLE `pets` (
  `pet_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `fk_animal_type_id` int(11) NOT NULL,
  `fk_breed_id` int(11) NOT NULL,
  `fk_vaccination_id` int(11) NOT NULL,
  `fk_size_id` int(11) NOT NULL,
  `fk_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `pets`
--

INSERT INTO `pets` (`pet_id`, `name`, `picture`, `age`, `description`, `fk_animal_type_id`, `fk_breed_id`, `fk_vaccination_id`, `fk_size_id`, `fk_status_id`) VALUES
(12, 'Rudi', '6429ad24adf2e.jpeg', 2, 'Bird, which was given to us by a finder', 3, 7, 1, 1, 1),
(14, 'Frederico', 'animal.jpg', 3, 'really nice little bird', 3, 7, 2, 1, 2),
(15, 'Siluna', '642c606a6c6ce.jpeg', 11, 'our senior cat here at Animal Farn', 2, 3, 1, 2, 1),
(16, 'wanda', 'animal.jpg', 3, 'our tortoise', 4, 5, 1, 2, 1),
(18, 'Arlo', '642c804d9bbed.jpg', 12, 'HE is one of the most beautiful Dobermann dogs at our center', 1, 1, 1, 1, 2),
(20, 'Rex', '642d6626292f0.jpg', 7, 'plays games loving HU', 2, 1, 1, 1, 1),
(21, 'Flummy', '642c2b56ea1c6.jpg', 3, 'Flummi und Amalia (Protokollnummer: 1920534) sind im Herbst 2019 im Tierheim eingezogen. Bei den beiden scheuen Schönheiten handelt es sich um zwei Streunerkatzen, die bei Tierschutz Austria zueinander gefunden haben und seit diesem Zeitpunkt unzertrennlich sind. Für Flummi und Amalia sind ein geregelter Tagesablauf, ausreichend Rückzugsmöglichkeiten, Geduld bei der Eingewöhnung und die Möglichkeit auf Freigang unerlässlich', 2, 3, 1, 2, 1),
(22, 'Anna', '642c2bdb958e6.jpg', 2, 'Menschen: freundlich nach Kennenlernphase Kinder: Teenager Hunde: ja Katzen: unbekannt Stubenrein: ja Leinenführigkeit: kennt noch kein Brustgeschirr Kennt Innenräume: ja Alleine bleiben: unbekannt Kann im Auto mitfahren: unbekannt Zuhause gesucht: ländlich, ruhig Haus mit Garten, gerne an der Seite eines Zweithundes', 4, 1, 1, 2, 1),
(23, 'Toni', '642c2c4522514.jpg', 10, 'Das Geschwisterpaar Toni und Bommerle (Protokollnummer: 1620550) zählt zu unseren Langsitzern. Die beiden Fellnasen sind seit Herbst 2016 im Tierschutzhaus Vösendorf – Tierschutz Austria. Anfangs sind Toni und Bommerle skeptisch und brauchen Zeit und Geduld bei tierlieben Menschen, um Vertrauen zu fassen. Mit ausreichend Rückzugsmöglichkeiten', 2, 3, 1, 2, 1),
(24, 'Charly', '642c2c984e6d4.jpg', 10, 'Menschen: freundlich nach Kennenlernphase Kinder: nein Hunde: ja Katzen: unbekannt Stubenrein: im Erlernen Leinenführigkeit: im Erlernen Kennt Innenräume: unbekannt Alleine bleiben: unbekannt Kann im Auto mitfahren: unbekannt Zuhause gesucht: ruhiges, kinderloses Zuhause mit viel Platz in eher ländlicher Umgebung', 1, 2, 1, 2, 1),
(25, 'Smiley', '642c2d10588b8.jpg', 11, 'Menschen: freundlich  Kinder: größere Hunde: ja Katzen: unbekannt Stubenrein: ja Leinenführigkeit: ja Kennt Innenräume: unbekannt Alleine bleiben: unbekannt Kann im Auto mitfahren: unbekannt Zuhause gesucht: Stadtrand oder ruhiger,ohne Stufen', 1, 1, 1, 2, 1),
(26, 'Lari', '642c854064415.jpg', 6, 'Menschen: freundlich Kinder: ab Teenager-Alter Hunde: ruhige Hunde ok Katzen: unbekannt Stubenrein: ja Leinenführigkeit: ja  Kennt Innenräume: ja  Alleine bleiben: unbekannt Kann im Auto mitfahren: ja Zuhause gesucht: mit Garten am Land', 1, 2, 2, 2, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `status` varchar(9) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `address`, `phone`, `picture`, `status`) VALUES
(12, 'stefan', 'Ruedenauer', 'stefan@digitaleseele.at', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'jedleseer', '06644341127', '642d61e9b98fa.jpg', 'user'),
(14, 'Manfred', 'Heller', 'manfred@heller.at', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'weberstraße', '74389294298', 'avatar.jpg', 'admin'),
(16, 'stefan', 'alter', 'ruedi@ruedi.de', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'weber', '92494320', 'avatar.jpg', 'admin'),
(20, 'Stefan', 'alter', 'web@love.at', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'weber', '848038021', '642bfcdd764b0.jpg', 'user');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vaccination`
--

CREATE TABLE `vaccination` (
  `vacc_id` int(11) NOT NULL,
  `vacc_text` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `vaccination`
--

INSERT INTO `vaccination` (`vacc_id`, `vacc_text`) VALUES
(1, 'yes'),
(2, 'no');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `animal_size`
--
ALTER TABLE `animal_size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indizes für die Tabelle `animal_status`
--
ALTER TABLE `animal_status`
  ADD PRIMARY KEY (`animalstatus_id`);

--
-- Indizes für die Tabelle `animal_type`
--
ALTER TABLE `animal_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indizes für die Tabelle `breed`
--
ALTER TABLE `breed`
  ADD PRIMARY KEY (`breed_id`);

--
-- Indizes für die Tabelle `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `fk_animal_type_id` (`fk_animal_type_id`),
  ADD KEY `fk_breed_id` (`fk_breed_id`),
  ADD KEY `fk_vaccination_id` (`fk_vaccination_id`),
  ADD KEY `fk_size_id` (`fk_size_id`),
  ADD KEY `fk_status_id` (`fk_status_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indizes für die Tabelle `vaccination`
--
ALTER TABLE `vaccination`
  ADD PRIMARY KEY (`vacc_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `animal_size`
--
ALTER TABLE `animal_size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `animal_status`
--
ALTER TABLE `animal_status`
  MODIFY `animalstatus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `animal_type`
--
ALTER TABLE `animal_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `breed`
--
ALTER TABLE `breed`
  MODIFY `breed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `pets`
--
ALTER TABLE `pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `vaccination`
--
ALTER TABLE `vaccination`
  MODIFY `vacc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`fk_animal_type_id`) REFERENCES `animal_type` (`type_id`),
  ADD CONSTRAINT `pets_ibfk_2` FOREIGN KEY (`fk_breed_id`) REFERENCES `breed` (`breed_id`),
  ADD CONSTRAINT `pets_ibfk_3` FOREIGN KEY (`fk_vaccination_id`) REFERENCES `vaccination` (`vacc_id`),
  ADD CONSTRAINT `pets_ibfk_4` FOREIGN KEY (`fk_size_id`) REFERENCES `animal_size` (`size_id`),
  ADD CONSTRAINT `pets_ibfk_5` FOREIGN KEY (`fk_status_id`) REFERENCES `animal_status` (`animalstatus_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
