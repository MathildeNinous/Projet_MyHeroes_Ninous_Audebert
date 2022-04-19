-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 10:12 AM
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
-- Table structure for table `histoire`
--

CREATE TABLE `histoire` (
  `Id` int(11) NOT NULL,
  `Titre` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `NombreJoue` int(11) NOT NULL,
  `NombreVictoire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `histoiredejoueur`
--

CREATE TABLE `histoiredejoueur` (
  `IdJoueur` int(11) NOT NULL,
  `IdHistoire` int(11) NOT NULL,
  `Etat` varchar(25) NOT NULL,
  `Point` int(11) NOT NULL,
  `PointEndurance` int(11) NOT NULL,
  `PointHabilite` int(11) NOT NULL,
  `PointVistesse` int(11) NOT NULL,
  `Id` int(11) NOT NULL,
  `Avancement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `joueur`
--

CREATE TABLE `joueur` (
  `Id` int(11) NOT NULL,
  `NiveauDeJeu` int(11) NOT NULL COMMENT 'Plus le joueur à fini d''histoire et plus son niveau est haut',
  `Mdp` varchar(50) NOT NULL,
  `NomUtilisateur` int(11) NOT NULL,
  `Droit` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prénom` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paragraphe`
--

CREATE TABLE `paragraphe` (
  `Id` int(11) NOT NULL,
  `Description` text NOT NULL,
  `IdHistoire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reponse`
--

CREATE TABLE `reponse` (
  `Id` int(11) NOT NULL,
  `Description` text NOT NULL,
  `IdParagraphe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`Id`),
  ADD KEY `MonHistoire` (`IdHistoire`);

--
-- Indexes for table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `MonParagraphe` (`IdParagraphe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `histoire`
--
ALTER TABLE `histoire`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histoiredejoueur`
--
ALTER TABLE `histoiredejoueur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paragraphe`
--
ALTER TABLE `paragraphe`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `MonParagraphe` FOREIGN KEY (`IdParagraphe`) REFERENCES `paragraphe` (`Id`);
COMMIT;
