-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 03 jan. 2024 à 21:51
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetbdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `id_activite` int NOT NULL,
  `nom_activite` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_activite`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`id_activite`, `nom_activite`) VALUES
(201, 'Football'),
(202, 'Basketball'),
(203, 'Volleyball');

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `id_adherent` int NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `numero_carte_adherent` int DEFAULT NULL,
  PRIMARY KEY (`id_adherent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`id_adherent`, `nom`, `prenom`, `numero_carte_adherent`) VALUES
(501, 'Smith', 'John', 1001),
(502, 'Johnson', 'Alice', 1002),
(503, 'Brown', 'David', 1003);

-- --------------------------------------------------------

--
-- Structure de la table `benevole`
--

DROP TABLE IF EXISTS `benevole`;
CREATE TABLE IF NOT EXISTS `benevole` (
  `id_benevole` int NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_benevole`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `benevole`
--

INSERT INTO `benevole` (`id_benevole`, `nom`, `prenom`) VALUES
(1, 'Dupont', 'Jean'),
(2, 'Martin', 'Sophie'),
(3, 'Lefevre', 'Paul');

-- --------------------------------------------------------

--
-- Structure de la table `estmembre`
--

DROP TABLE IF EXISTS `estmembre`;
CREATE TABLE IF NOT EXISTS `estmembre` (
  `id_benevole` int DEFAULT NULL,
  `id_section` int DEFAULT NULL,
  `fonction` varchar(255) DEFAULT NULL,
  KEY `id_benevole` (`id_benevole`),
  KEY `id_section` (`id_section`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `estmembre`
--

INSERT INTO `estmembre` (`id_benevole`, `id_section`, `fonction`) VALUES
(1, 1, 'Président'),
(2, 2, 'Secrétaire');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id_inscription` int NOT NULL,
  `montant_paye` decimal(10,2) DEFAULT NULL,
  `date_inscription` date DEFAULT NULL,
  `id_adherent` int DEFAULT NULL,
  `id_activite` int DEFAULT NULL,
  `id_section` int DEFAULT NULL,
  PRIMARY KEY (`id_inscription`),
  KEY `id_adherent` (`id_adherent`),
  KEY `id_activite` (`id_activite`),
  KEY `id_section` (`id_section`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id_inscription`, `montant_paye`, `date_inscription`, `id_adherent`, `id_activite`, `id_section`) VALUES
(301, 50.00, '2023-01-15', 501, 201, 101),
(302, 40.00, '2023-02-20', 502, 202, 102),
(303, 30.00, '2023-03-25', 503, 203, 103);

-- --------------------------------------------------------

--
-- Structure de la table `parente`
--

DROP TABLE IF EXISTS `parente`;
CREATE TABLE IF NOT EXISTS `parente` (
  `id_adherent1` int NOT NULL,
  `id_adherent2` int NOT NULL,
  `type_lien` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_adherent1`,`id_adherent2`),
  KEY `id_adherent2` (`id_adherent2`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `parente`
--

INSERT INTO `parente` (`id_adherent1`, `id_adherent2`, `type_lien`) VALUES
(501, 502, 'Frere'),
(502, 503, 'Soeur');

-- --------------------------------------------------------

--
-- Structure de la table `remboursement`
--

DROP TABLE IF EXISTS `remboursement`;
CREATE TABLE IF NOT EXISTS `remboursement` (
  `id_remboursement` int NOT NULL,
  `montant_rembourse` decimal(10,2) DEFAULT NULL,
  `date_remboursement` date DEFAULT NULL,
  `id_adherent` int DEFAULT NULL,
  PRIMARY KEY (`id_remboursement`),
  KEY `id_adherent` (`id_adherent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `remboursement`
--

INSERT INTO `remboursement` (`id_remboursement`, `montant_rembourse`, `date_remboursement`, `id_adherent`) VALUES
(401, 20.00, '2023-04-10', 501),
(402, 15.00, '2023-05-12', 502);

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

DROP TABLE IF EXISTS `section`;
CREATE TABLE IF NOT EXISTS `section` (
  `id_section` int NOT NULL,
  `nom_section` varchar(255) DEFAULT NULL,
  `id_referent` int DEFAULT NULL,
  PRIMARY KEY (`id_section`),
  KEY `id_referent` (`id_referent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `section`
--

INSERT INTO `section` (`id_section`, `nom_section`, `id_referent`) VALUES
(101, 'Section A', 1),
(102, 'Section B', 2),
(103, 'Section C', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
