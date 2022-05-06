-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2022 at 03:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `behero`
--
CREATE DATABASE IF NOT EXISTS `behero` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `behero`;

-- --------------------------------------------------------

--
-- Table structure for table `capacite`
--

CREATE TABLE `capacite` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `NbPoint` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `capacite`
--

INSERT INTO `capacite` (`Id`, `Nom`, `NbPoint`) VALUES
(1, 'Puissance', 3),
(2, 'Souplesse', 1),
(3, 'Fatigue', -3),
(4, 'Deshydratation', -2);

-- --------------------------------------------------------

--
-- Table structure for table `histoire`
--

CREATE TABLE `histoire` (
  `Id` int(11) NOT NULL,
  `Titre` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `NombreJoue` int(11) NOT NULL,
  `NombreVictoire` int(11) NOT NULL,
  `PremierParagraphe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `histoire`
--

INSERT INTO `histoire` (`Id`, `Titre`, `Description`, `NombreJoue`, `NombreVictoire`, `PremierParagraphe`) VALUES
(1, 'Titre1', 'test histoire 1', 0, 0, 1),
(2, 'titre2', 'test histoire 2\nje suis le paragraphe 1', 0, 0, 5),
(3, 'Histoire3', 'histoire 3\r\rje suis le paragraphe 3\rje suis le paragraphe 2\rje suis le paragraphe 3', 0, 0, 1),
(4, 'Histoire4', 'je suis histoire 4', 0, 0, 0),
(5, 'Titre 5', 'histoire 5', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `histoiredejoueur`
--

CREATE TABLE `histoiredejoueur` (
  `IdJoueur` int(11) NOT NULL,
  `IdHistoire` int(11) NOT NULL,
  `Etat` varchar(25) NOT NULL,
  `Point` int(11) NOT NULL,
  `Puissance` int(11) NOT NULL,
  `Souplesse` int(11) NOT NULL,
  `Fatigue` int(11) NOT NULL,
  `Id` int(11) NOT NULL,
  `Avancement` int(11) NOT NULL,
  `Deshydratation` int(11) NOT NULL,
  `Mort` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `histoiredejoueur`
--

INSERT INTO `histoiredejoueur` (`IdJoueur`, `IdHistoire`, `Etat`, `Point`, `Puissance`, `Souplesse`, `Fatigue`, `Id`, `Avancement`, `Deshydratation`, `Mort`) VALUES
(3, 1, '', 0, 15, 4, -9, 27, 4, -46, 0),
(3, 2, '', 0, 0, 0, 0, 28, 5, 0, 0),
(3, 3, '', 0, 0, 0, 0, 29, 3, 0, 0),
(4, 1, '', 0, 3, 1, -3, 32, 4, -2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `joueur`
--

CREATE TABLE `joueur` (
  `Id` int(11) NOT NULL,
  `NiveauDeJeu` int(11) NOT NULL COMMENT 'Plus le joueur à fini d''histoire et plus son niveau est haut',
  `Mdp` varchar(50) NOT NULL,
  `NomUtilisateur` varchar(25) NOT NULL,
  `Droit` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prénom` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joueur`
--

INSERT INTO `joueur` (`Id`, `NiveauDeJeu`, `Mdp`, `NomUtilisateur`, `Droit`, `Nom`, `Prénom`, `Email`) VALUES
(2, 0, 'knrkntrn', 'mninous', 0, 'Ninous', 'Mathilde', 'mninous@ensc.fr'),
(3, 0, 'test', 'alaudebert', 0, 'Audebert', 'Alex', 'audebert.alex33@gmail.com'),
(4, 0, 'test', 'shaclem', 0, 'Lasserre', 'Clément', 'clement.lasserre@sfr.fr'),
(6, 0, 'test', 'emorando', 0, 'Morando', 'Emma', 'emorando@ensc.fr'),
(22, 0, 'test', 'laudebert', 0, 'Audebert', 'lena', 'audebert.alex33@gmail.com'),
(24, 0, 'test', 'test', 0, 'test', 'test', 'test@test.fr');

-- --------------------------------------------------------

--
-- Table structure for table `paragraphe`
--

CREATE TABLE `paragraphe` (
  `Id` int(11) NOT NULL,
  `Description` text NOT NULL,
  `IdHistoire` int(11) NOT NULL,
  `Capacite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paragraphe`
--

INSERT INTO `paragraphe` (`Id`, `Description`, `IdHistoire`, `Capacite`) VALUES
(1, 'je suis le paragraphe 1\r\nje suis un test de saut de ligne', 1, 1),
(2, 'je suis le paragraphe 2', 1, 2),
(3, 'je suis le paragraphe 3', 1, 3),
(4, 'je suis le paragraphe 4', 1, 4),
(5, 'je suis le paragraphe 1', 2, 0),
(6, 'je suis le paragraphe 2', 2, 0),
(7, 'je suis le paragraphe 3', 2, 0),
(8, 'je suis le paragraphe 4', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reponse`
--

CREATE TABLE `reponse` (
  `Id` int(11) NOT NULL,
  `Description` text NOT NULL,
  `IdParagrapheEntrant` int(11) NOT NULL,
  `IdParagrapheSortant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reponse`
--

INSERT INTO `reponse` (`Id`, `Description`, `IdParagrapheEntrant`, `IdParagrapheSortant`) VALUES
(22, 'reponse 1', 1, 2),
(23, 'reponse 2', 2, 3),
(24, 'reponse 3', 3, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `capacite`
--
ALTER TABLE `capacite`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `histoire`
--
ALTER TABLE `histoire`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `histoiredejoueur`
--
ALTER TABLE `histoiredejoueur`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UnJoueur` (`IdJoueur`),
  ADD KEY `UneHistoire` (`IdHistoire`);

--
-- Indexes for table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NomUtilisateur` (`NomUtilisateur`);

--
-- Indexes for table `paragraphe`
--
ALTER TABLE `paragraphe`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `capacite`
--
ALTER TABLE `capacite`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `histoire`
--
ALTER TABLE `histoire`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `histoiredejoueur`
--
ALTER TABLE `histoiredejoueur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `paragraphe`
--
ALTER TABLE `paragraphe`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `histoiredejoueur`
--
ALTER TABLE `histoiredejoueur`
  ADD CONSTRAINT `UnJoueur` FOREIGN KEY (`IdJoueur`) REFERENCES `joueur` (`Id`),
  ADD CONSTRAINT `UneHistoire` FOREIGN KEY (`IdHistoire`) REFERENCES `histoire` (`Id`);

--
-- Constraints for table `paragraphe`
--
ALTER TABLE `paragraphe`
  ADD CONSTRAINT `MonHistoire` FOREIGN KEY (`IdHistoire`) REFERENCES `histoire` (`Id`);

--
-- Constraints for table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `MonParagraphe` FOREIGN KEY (`IdParagrapheEntrant`) REFERENCES `paragraphe` (`Id`);
COMMIT;