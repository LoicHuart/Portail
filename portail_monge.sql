-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 02 Octobre 2017 à 11:12
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `portail_monge`
--

-- --------------------------------------------------------

--
-- Structure de la table `identifiants`
--

CREATE TABLE `identifiants` (
  `id` int(50) NOT NULL,
  `user` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `identifiants`
--

INSERT INTO `identifiants` (`id`, `user`, `mdp`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `portail_items`
--

CREATE TABLE `portail_items` (
  `id` int(50) NOT NULL,
  `nom` varchar(120) NOT NULL,
  `nomid` varchar(120) NOT NULL,
  `lienhttp` varchar(120) NOT NULL,
  `cheminimage` varchar(120) NOT NULL,
  `numeroligne` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `portail_items`
--

INSERT INTO `portail_items` (`id`, `nom`, `nomid`, `lienhttp`, `cheminimage`, `numeroligne`) VALUES
(1, 'ENT', 'ent', 'https://www.ent-lycees.fr/', 'img/cate/contact.png', 1),
(2, 'PRONOTE', 'pronote', 'http://pronote.lyceemonge.eu/', 'img/cate/pronote.png', 1),
(3, 'CNAM', 'cnam', 'https://lecnam.net/', 'img/cate/cnam.png', 1),
(4, 'SIO OVH', 'ovh', 'http://ovh.infomonge.net/', 'img/cate/ovh.png', 1),
(5, 'GITLAB', 'git', 'https://portail.infomonge.net/gitlab', 'img/cate/git.png', 2),
(6, 'MOODLE', 'mood', 'https://portail.infomonge.net/gitlab', 'img/cate/mood.png', 2),
(7, 'SLAM', 'slam', 'https://portail.infomonge.net/slam', 'img/cate/slam.png', 2),
(8, 'NODE', 'node', 'https://portail.infomonge.net/node', 'img/cate/node.png', 2),
(9, 'ROULETTE', 'roule', 'https://portail.infomonge.net/ROULETTE', 'img/cate/roule.png', 2),
(10, 'AFFICHAGE', 'aff', 'https://portail.infomonge.net/aff', 'img/cate/aff.png', 3),
(11, 'SIG', 'sig', 'https://portail.infomonge.net/sig', 'img/cate/sig.png', 3),
(12, 'GLPI', 'glpi', 'https://portail.infomonge.net/glpi', 'img/cate/glpi.png', 3),
(13, 'PUBLIC', 'public', 'https://portail.infomonge.net/contact', 'img/cate/contact.png', 3);

-- --------------------------------------------------------

--
-- Structure de la table `portail_ligne`
--

CREATE TABLE `portail_ligne` (
  `id` int(50) NOT NULL,
  `nomligne` varchar(120) NOT NULL,
  `numeroligne` int(50) NOT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `portail_ligne`
--

INSERT INTO `portail_ligne` (`id`, `nomligne`, `numeroligne`, `description`) VALUES
(1, '1', 1, 'Service ENT...'),
(2, '2', 2, 'Service SLAM...'),
(3, '3', 3, 'Service projet...');

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `portail_ligne`
--
ALTER TABLE `portail_ligne`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
