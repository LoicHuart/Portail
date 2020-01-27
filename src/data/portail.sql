-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 27 Janvier 2020 à 21:09
-- Version du serveur :  5.7.28-0ubuntu0.18.04.4
-- Version de PHP :  7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `identifiants` (
  `id` int(50) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `identifiants`
--

INSERT INTO `identifiants` (`id`, `login`, `mdp`) VALUES
(1, 'root', 'root');

-- --------------------------------------------------------

--
-- Structure de la table `portail_items`
--

CREATE TABLE `portail_items` (
  `id` int(50) NOT NULL,
  `nom` varchar(120) CHARACTER SET utf8 NOT NULL,
  `lienhttp` varchar(120) CHARACTER SET utf8 NOT NULL,
  `cheminimage` varchar(120) CHARACTER SET utf8 NOT NULL,
  `numeroligne` int(50) NOT NULL,
  `positionInLigne` int(50) NOT NULL,
  `reverseProxy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `portail_ligne`
--

CREATE TABLE `portail_ligne` (
  `id` int(50) NOT NULL,
  `nomligne` varchar(120) CHARACTER SET utf8mb4 NOT NULL,
  `numeroligne` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `identifiants`
--
ALTER TABLE `identifiants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `portail_items`
--
ALTER TABLE `portail_items`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `portail_ligne`
--
ALTER TABLE `portail_ligne`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `identifiants`
--
ALTER TABLE `identifiants`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `portail_items`
--
ALTER TABLE `portail_items`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT pour la table `portail_ligne`
--
ALTER TABLE `portail_ligne`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
