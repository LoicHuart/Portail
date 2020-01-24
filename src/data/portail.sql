-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 23 jan. 2020 à 10:22
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `portail`
--

-- --------------------------------------------------------

--
-- Structure de la table `identifiants`
--

DROP TABLE IF EXISTS `identifiants`;
CREATE TABLE IF NOT EXISTS `identifiants` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `identifiants`
--

INSERT INTO `identifiants` (`id`, `login`, `mdp`) VALUES
(1, 'root', 'root');

-- --------------------------------------------------------

--
-- Structure de la table `portail_items`
--

DROP TABLE IF EXISTS `portail_items`;
CREATE TABLE IF NOT EXISTS `portail_items` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nom` varchar(120) CHARACTER SET utf8 NOT NULL,
  `lienhttp` varchar(120) CHARACTER SET utf8 NOT NULL,
  `cheminimage` varchar(120) CHARACTER SET utf8 NOT NULL,
  `numeroligne` int(50) NOT NULL,
  `positionInLigne` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `portail_ligne`
--

DROP TABLE IF EXISTS `portail_ligne`;
CREATE TABLE IF NOT EXISTS `portail_ligne` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nomligne` varchar(120) CHARACTER SET utf8mb4 NOT NULL,
  `numeroligne` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
