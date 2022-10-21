-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 14 mai 2021 à 20:13
-- Version du serveur :  5.7.19
-- Version de PHP :  7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pointage`
--

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `NUMEMP` int(5) NOT NULL,
  `NUMFONCT` int(5) NOT NULL,
  `NOMEMP` varchar(128) NOT NULL,
  `PRENOMEMP` varchar(50) NOT NULL,
  `CONTACT` varchar(10) NOT NULL,
  PRIMARY KEY (`NUMEMP`),
  KEY `I_FK_EMPLOYE_FONCTION` (`NUMFONCT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`NUMEMP`, `NUMFONCT`, `NOMEMP`, `PRENOMEMP`, `CONTACT`) VALUES
(1, 1, 'RAKOTONDRANAIVO', 'Yvon', '0320462685'),
(2, 2, 'RAZAFITONINJARA', 'Erdelin', '0327631836'),
(3, 4, 'RANDIMBISON', 'Alina', '0320726613');

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

DROP TABLE IF EXISTS `fonction`;
CREATE TABLE IF NOT EXISTS `fonction` (
  `NUMFONCT` int(5) NOT NULL AUTO_INCREMENT,
  `NOMFONCT` varchar(150) NOT NULL,
  `CATFONCT` varchar(128) NOT NULL,
  PRIMARY KEY (`NUMFONCT`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fonction`
--

INSERT INTO `fonction` (`NUMFONCT`, `NOMFONCT`, `CATFONCT`) VALUES
(1, 'Directeur Inter-Régional', 'DIRECTION'),
(2, 'Responsable en Suivi Evaluation', 'DIRECTION'),
(3, 'Assistante informatique', 'DIRECTION'),
(4, 'Secrétaire de Direction', 'DIRECTION'),
(5, 'Chef de Service Administratif et Financier', 'SERVICE ADMINITRATIF ET FINANCE'),
(6, 'Comptable', 'SERVICE ADMINITRATIF ET FINANCE'),
(7, 'Assistant Comptable PAEB', 'SERVICE ADMINITRATIF ET FINANCE'),
(8, 'Comptable CERC', 'SERVICE ADMINITRATIF ET FINANCE'),
(9, 'Chef de Service des Opérations Environnements', 'SERVICE DES OPERATIONS ET ENVIRONNEMENT'),
(10, 'Socio-organisateur Chargé du Gouvernance Citoyenne et Cas Spéciaux', 'SERVICE DES OPERATIONS ET ENVIRONNEMENT'),
(11, 'Socio-organisateur - Sauvegarde Environnementale Sociale et Sécurisation', 'SERVICE DES OPERATIONS ET ENVIRONNEMENT'),
(12, 'Socio-organisateur Chargé de Mesure d\'Accompagnement', 'SERVICE DES OPERATIONS ET ENVIRONNEMENT'),
(13, 'Responsable de Transfert Monétaire pour le Développement Humain', 'SERVICE DES OPERATIONS ET ENVIRONNEMENT'),
(14, 'Responsable CERC', 'SERVICE DES OPERATIONS ET ENVIRONNEMENT'),
(15, 'Ingénieur Responsable Inclusion Productive', 'SERVICE DES OPERATIONS ET ENVIRONNEMENT'),
(16, 'Socio-organisateur - Argent Contre Travail Productif', 'SERVICE DES OPERATIONS ET ENVIRONNEMENT'),
(17, 'Socio-organisateur - FSP', 'SERVICE DES OPERATIONS ET ENVIRONNEMENT'),
(18, 'Ingénieur du Programme PAEB', 'SERVICE DES OPERATIONS ET ENVIRONNEMENT'),
(19, 'Socio-organisateur  CERC', 'SERVICE DES OPERATIONS ET ENVIRONNEMENT'),
(20, 'Socio-organisateur /RPI', 'SERVICE DES OPERATIONS ET ENVIRONNEMENT'),
(21, 'Socio-organisateur-Transfert Monétaire pour le Développement Humain', 'SERVICE DES OPERATIONS ET ENVIRONNEMENT'),
(22, 'Socio-organisateur-LUL', 'SERVICE DES OPERATIONS ET ENVIRONNEMENT'),
(23, 'Chauffeur', 'PERSONNEL D‘APPUI'),
(24, 'Gardien', 'PERSONNEL D‘APPUI'),
(25, 'Femme de ménage', 'PERSONNEL D‘APPUI'),
(26, 'Stagiaire SAF', 'STAGIAIRES'),
(27, 'Stagiaire CERC', 'STAGIAIRES'),
(28, 'Stagiaire SI', 'STAGIAIRES'),
(29, 'Stagiaire SD', 'STAGIAIRES'),
(30, 'Stagiaire TMDH', 'STAGIAIRES'),
(31, 'Stagiaire FSP', 'STAGIAIRES');

-- --------------------------------------------------------

--
-- Structure de la table `pointage`
--

DROP TABLE IF EXISTS `pointage`;
CREATE TABLE IF NOT EXISTS `pointage` (
  `IDPOINTAGE` int(5) NOT NULL AUTO_INCREMENT,
  `NUMEMP` int(6) NOT NULL,
  `NUMFONCT` int(5) NOT NULL,
  `DATEPOINTAGE` date NOT NULL,
  `HEUREENTMA` time NOT NULL,
  `HEURESORTMA` time NOT NULL,
  `HEUREENTSO` time NOT NULL,
  `HEURESORTSO` time NOT NULL,
  `OBSERVATION1` varchar(128) NOT NULL,
  PRIMARY KEY (`IDPOINTAGE`),
  KEY `I_FK_POINTAGE_EMPLOYE` (`NUMEMP`),
  KEY `NUMFONCT` (`NUMFONCT`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pointage`
--

INSERT INTO `pointage` (`IDPOINTAGE`, `NUMEMP`, `NUMFONCT`, `DATEPOINTAGE`, `HEUREENTMA`, `HEURESORTMA`, `HEUREENTSO`, `HEURESORTSO`, `OBSERVATION1`) VALUES
(1, 1, 1, '2021-05-10', '00:00:00', '00:00:00', '00:00:00', '00:00:00', ''),
(2, 2, 2, '2021-05-10', '00:00:00', '00:00:00', '00:00:00', '00:00:00', ''),
(3, 3, 4, '2021-05-10', '00:00:00', '00:00:00', '00:00:00', '00:00:00', ''),
(4, 1, 1, '2021-05-11', '08:12:00', '20:14:00', '00:00:00', '00:00:00', ''),
(5, 2, 2, '2021-05-11', '20:21:00', '20:26:00', '00:00:00', '00:00:00', ''),
(6, 3, 4, '2021-05-11', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `NUMSEC` int(5) NOT NULL AUTO_INCREMENT,
  `NOMSEC` char(50) DEFAULT NULL,
  `ROLE` varchar(20) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `MDP` char(200) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`NUMSEC`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`NUMSEC`, `NOMSEC`, `ROLE`, `EMAIL`, `MDP`, `date`) VALUES
(6, 'Rindra', 'admin', 'rindrarochel@gmail.com', '$2y$10$x1SpGnz/56xbneyOEGW9bem4ebZbQcbZk5/vEfXfYjjRHFoSCnTGO', '2021-04-12 13:36:05'),
(7, 'TOMMY', '', 'tommy@gmail.com', '$2y$10$Zau.XSAHp1yq9X1wNbtvwO6//FUihqWC8EP9qp3JFyNxNyUcSBcrK', '2021-05-04 11:45:04');

-- --------------------------------------------------------

--
-- Structure de la table `visite`
--

DROP TABLE IF EXISTS `visite`;
CREATE TABLE IF NOT EXISTS `visite` (
  `IDVISITE` int(5) NOT NULL AUTO_INCREMENT,
  `NUMEMP` int(5) NOT NULL,
  `NOMVISITEUR` varchar(150) NOT NULL,
  `CIN` varchar(12) NOT NULL,
  `DATEV` date NOT NULL,
  `HEUREENTV` time NOT NULL,
  `HEURESORTV` time NOT NULL,
  `OBSERVATION` varchar(120) NOT NULL,
  PRIMARY KEY (`IDVISITE`),
  KEY `numemp` (`NUMEMP`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `visite`
--

INSERT INTO `visite` (`IDVISITE`, `NUMEMP`, `NOMVISITEUR`, `CIN`, `DATEV`, `HEUREENTV`, `HEURESORTV`, `OBSERVATION`) VALUES
(1, 2, 'ANDRIAMBOLOLONA Rindra Rochel', '201031123458', '2021-05-11', '20:15:21', '20:18:45', 'dépot de dossier');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
