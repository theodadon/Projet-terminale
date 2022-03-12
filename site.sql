-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 30 mai 2021 à 13:50
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `site`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Id` SERIAL PRIMARY KEY,
  `pseudo` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `adresse` varchar(70) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `codepostal` int UNSIGNED NOT NULL,
  `pays` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  UNIQUE KEY `mail` (`mail`)
);

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`Id`, `pseudo`, `nom`, `prenom`, `adresse`, `ville`, `codepostal`, `pays`, `mail`, `mdp`) VALUES(1, 'test', 'Dad', 'Theo', 'rue jacques', 'Tourcoing', 59560, 'France', 'dad@gmail.com', 'azerty123');
INSERT INTO `admin` (`Id`, `pseudo`, `nom`, `prenom`, `adresse`, `ville`, `codepostal`, `pays`, `mail`, `mdp`) VALUES(2, 'test1', 'Lou', 'Momo', 'rue jacques', 'Tourcoing', 59560, 'France', 'momo@gmail.com', 'azerty123');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `Id` SERIAL PRIMARY KEY,
  `pseudo` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `adresse` varchar(70) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `codepostal` int UNSIGNED NOT NULL,
  `pays` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `mail` (`mail`)
);

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`Id`, `pseudo`, `nom`, `prenom`, `adresse`, `ville`, `codepostal`, `pays`, `mail`, `mdp`) VALUES(1, 'mano', 'Szef', 'Manoé', 'rue des Olivier', 'Roubaix', 59170, 'France', 'mano@gmail.com', 'azerty123');
INSERT INTO `client` (`Id`, `pseudo`, `nom`, `prenom`, `adresse`, `ville`, `codepostal`, `pays`, `mail`, `mdp`) VALUES(2, 'Ronale780', 'duj', 'ronale', 'rue des dep', 'Co', 59560, 'France', 'duj@hotmail.fr', 'rclens');
INSERT INTO `client` (`Id`, `pseudo`, `nom`, `prenom`, `adresse`, `ville`, `codepostal`, `pays`, `mail`, `mdp`) VALUES(3, 'thib', 'Leoy', 'Thibaut', 'rue jacques', 'Tourcoing', 59200, 'France', 'leroy@gmail.com', 'azerty123');
INSERT INTO `client` (`Id`, `pseudo`, `nom`, `prenom`, `adresse`, `ville`, `codepostal`, `pays`, `mail`, `mdp`) VALUES(4, 'momo', 'Loui', 'Mohammed', 'rue des feignants', 'Tourcoing', 59200, 'France', 'lou@gmail.com', 'azerty123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
