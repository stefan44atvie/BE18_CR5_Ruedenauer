-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 01. Apr 2023 um 21:50
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
(1, 'aladine', '', 9, 'ganz lieber', 1, 2, 1, 2, 1),
(2, 'alfred', '', 2, '', 2, 9, 2, 1, 2),
(3, 'catbum', '', 4, 'willfähig, treu', 2, 10, 2, 2, 2),
(4, 'sina', '', 2, 'neugierig', 3, 8, 1, 2, 1);

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
(1, 'hallo', 'hallo', 'we@we.de', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'uewheiwhi', '7234782843', '', 'user'),
(2, 'weber', 'weber', 'we@alfa.de', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'webernel', '6372843249', '', 'user'),
(3, 'stefan', 'rette', 'rette@stefan.at', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'weber', '7234791', 'avatar.jpg', 'user'),
(4, 'ter', 'terrk', 'get@what.de', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'weber', '7234791', 'avatar.jpg', 'user'),
(5, 'stefan', 'halool', 'ste@ste.de', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'wefieofe', '63278', 'avatar.jpg', 'user'),
(6, 'stefan', 'tarz', 'ste@web.de', 'd84eefc1ae267106ef600763e9d5501de635b2296724f36c5477958f1d511be5', 'hallollooi', '732746279', 'avatar.jpg', 'user'),
(7, 'hallo', 'weber', 'uzui@web.at', 'e71eae0a9fc1db629c50ca3d98fe1f78af818ad96c97d5dbb9f2c66de2c019e2', 'hducisahcc', '88e28479', 'avatar.jpg', 'user'),
(8, 'stefan', 'test', 'test@test.de', '432761be2fe9e4bc7164f7cfd8038cb3776a1a8bec675e1e7785c77cd6f29e06', 'gsvuavqugq', '772386424ß2', '../pictures/avatar.jpg', 'user'),
(9, 'alfa', 'heys', 'tre@web.de', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'weber', '3572826', 'avatar.jpg', 'user'),
(10, 'stefan', 'test', 'te@te.de', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'bhdibwq', '632662387', 'avatar.jpg', 'user'),
(11, 'hat', 'ghat', 'hat@hat.at', '7762778da9400caae168204b08baae803510db4a977e2b72252c09eeda81bdee', 'gzdwzqgigz', '663626388', '642810fc2fe0a.jpg', 'user'),
(12, 'stefan', 'ruedenauer', 'stefan@digitaleseele.at', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'jedleseer', '06644342127', 'avatar.jpg', 'user'),
(13, 'halnt', 'herta', 'hert@hert.de', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'weberlein', '3635278', '6428132545462.jpg', 'user'),
(14, 'manfred', 'heller', 'manfred@heller.at', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'weberelein', '74389294298', 'avatar.jpg', 'user'),
(15, 'stefan', 'ruede', 'stefan@ruedi.at', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'weber', '32324242', 'avatar.jpg', 'admin');

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
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
