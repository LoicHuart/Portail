-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2017 at 05:26 PM
-- Server version: 5.5.55-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aiman.bahouala`
--

-- --------------------------------------------------------

--
-- Table structure for table `fiche_pc`
--

CREATE TABLE IF NOT EXISTS `fiche_pc` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `Banque` varchar(200) NOT NULL,
  `Comptabilite_et_Gestion` varchar(200) NOT NULL,
  `Negociation_et_Relation_Client` varchar(200) NOT NULL,
  `Services_Informatiques_aux_Organisations` varchar(200) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `code_postal` char(5) NOT NULL,
  `Ville` varchar(200) NOT NULL,
  `tel_por` char(20) DEFAULT NULL,
  `mail` varchar(200) NOT NULL,
  `datenais` char(20) DEFAULT NULL,
  `annee_en_cours` char(20) DEFAULT NULL,
  `etablissement` varchar(200) DEFAULT NULL,
  `Formation` varchar(200) DEFAULT NULL,
  `specialite` varchar(200) DEFAULT NULL,
  `spec` varchar(200) DEFAULT NULL,
  `etablissement_titu` varchar(200) DEFAULT NULL,
  `anneeobt` char(20) DEFAULT NULL,
  `Forum` char(3) DEFAULT NULL,
  `porte_ouverte` char(3) DEFAULT NULL,
  `autres` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
