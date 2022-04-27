-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 27 avr. 2022 à 12:00
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `behero`
--
CREATE DATABASE IF NOT EXISTS `behero` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `behero`;

-- --------------------------------------------------------

--
-- Structure de la table `histoire`
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
-- Structure de la table `histoiredejoueur`
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
-- Structure de la table `joueur`
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
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`Id`, `NiveauDeJeu`, `Mdp`, `NomUtilisateur`, `Droit`, `Nom`, `Prénom`, `Email`) VALUES
(2, 0, 'knrkntrn', 'mninous', 0, 'Ninous', 'Mathilde', 'mninous@ensc.fr');

-- --------------------------------------------------------

--
-- Structure de la table `paragraphe`
--

CREATE TABLE `paragraphe` (
  `Id` int(11) NOT NULL,
  `Description` text NOT NULL,
  `IdHistoire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `Id` int(11) NOT NULL,
  `Description` text NOT NULL,
  `IdParagraphe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `histoire`
--
ALTER TABLE `histoire`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `histoiredejoueur`
--
ALTER TABLE `histoiredejoueur`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UnJoueur` (`IdJoueur`),
  ADD KEY `UneHistoire` (`IdHistoire`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NomUtilisateur` (`NomUtilisateur`);

--
-- Index pour la table `paragraphe`
--
ALTER TABLE `paragraphe`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `MonHistoire` (`IdHistoire`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `MonParagraphe` (`IdParagraphe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `histoire`
--
ALTER TABLE `histoire`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `histoiredejoueur`
--
ALTER TABLE `histoiredejoueur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `paragraphe`
--
ALTER TABLE `paragraphe`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `histoiredejoueur`
--
ALTER TABLE `histoiredejoueur`
  ADD CONSTRAINT `UnJoueur` FOREIGN KEY (`IdJoueur`) REFERENCES `joueur` (`Id`),
  ADD CONSTRAINT `UneHistoire` FOREIGN KEY (`IdHistoire`) REFERENCES `histoire` (`Id`);

--
-- Contraintes pour la table `paragraphe`
--
ALTER TABLE `paragraphe`
  ADD CONSTRAINT `MonHistoire` FOREIGN KEY (`IdHistoire`) REFERENCES `histoire` (`Id`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `MonParagraphe` FOREIGN KEY (`IdParagraphe`) REFERENCES `paragraphe` (`Id`);
COMMIT;
