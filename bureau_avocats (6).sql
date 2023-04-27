-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 19 avr. 2023 à 10:43
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bureau_avocats`
--

-- --------------------------------------------------------

--
-- Structure de la table `affaire`
--

DROP TABLE IF EXISTS `affaire`;
CREATE TABLE IF NOT EXISTS `affaire` (
  `id_aff` int NOT NULL AUTO_INCREMENT,
  `commission` float NOT NULL,
  `date_dep` date NOT NULL,
  `date_fin` date NOT NULL,
  `id_cin` int NOT NULL,
  `id_trib` int NOT NULL,
  `id_cin_hn` int NOT NULL,
  `id_cin_ex` int NOT NULL,
  `id_cin_clphy` int NOT NULL,
  `id_ClMor` int NOT NULL,
  PRIMARY KEY (`id_aff`),
  KEY `id_cin` (`id_cin`),
  KEY `id_trib` (`id_trib`),
  KEY `id_cin_hn` (`id_cin_hn`),
  KEY `id_cin_ex` (`id_cin_ex`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `affaire`
--

INSERT INTO `affaire` (`id_aff`, `commission`, `date_dep`, `date_fin`, `id_cin`, `id_trib`, `id_cin_hn`, `id_cin_ex`, `id_cin_clphy`, `id_ClMor`) VALUES
(1, 5000, '2022-01-10', '2023-02-25', 10543611, 2, 0, 13656422, 0, 22),
(2, 0, '2023-01-12', '0000-00-00', 10035274, 1, 10205339, 12456489, 10263251, 0);

-- --------------------------------------------------------

--
-- Structure de la table `avocat`
--

DROP TABLE IF EXISTS `avocat`;
CREATE TABLE IF NOT EXISTS `avocat` (
  `id_cin` varchar(8) NOT NULL,
  `nomA` varchar(20) NOT NULL,
  `prenomA` varchar(20) NOT NULL,
  `specialiteA` text NOT NULL,
  `adresseA` text NOT NULL,
  `num_telA` varchar(8) NOT NULL,
  `mdpA` text NOT NULL,
  `emailA` text NOT NULL,
  `cv` text NOT NULL,
  `id_chef` varchar(8) NOT NULL,
  `id_cin_s` varchar(8) NOT NULL,
  `id_cin_c` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `avocat`
--

INSERT INTO `avocat` (`id_cin`, `nomA`, `prenomA`, `specialiteA`, `adresseA`, `num_telA`, `mdpA`, `emailA`, `cv`, `id_chef`, `id_cin_s`, `id_cin_c`) VALUES
('10035274', 'Khaled', 'Hanen', '-Droit privé\r\n-Droit immobilier', '13 Rue Jasmin El Menzah Ariana', '98528920', 'hanen123', 'khaledHanen@gmail.com', 'Agrégation en Droit privé,\r\nDoctorat en droit privé,\r\nDEA en droit privé,\r\nMaîtrise en Droit Judiciaire privé  , en 1989, au Faculté de Droit et des sciences Politiques de Tunis.\r\nInscription à l\'Ordre National des Avocats Tunis-Tunisie.', '10035274', '11564482', '12239114'),
('10270614', 'Chammari', 'Sami', '-Droit pénal\n-Droit de la famille\n-Droit des contrats', '1 Rue Naceur Bey La Marsa', '20351211', 'sami@sami', 'chsami@gmail.com', 'Diplomé en 1995,\r\nMaîtrise en Droit pénal , Droit de la famille ,Droit des contrats .\r\nDEA en Droit pénal. ', '10035274', '11564482', '12239114'),
('10543611', 'Bettaieb', 'Ahmed', 'Droit commercial, des affaires et de la concurrence.', '10 Rue Taher Sfar Yasminet Ben Arous', '55736651', 'ahmed456', 'Bettaiebahmed@gmail.com', '-Diplomé en 1998,\r\nMaîtrise en Droit commercial.  ', '10035274', '11564482', '12239114');

-- --------------------------------------------------------

--
-- Structure de la table `client_mor`
--

DROP TABLE IF EXISTS `client_mor`;
CREATE TABLE IF NOT EXISTS `client_mor` (
  `id_ClMor` int NOT NULL AUTO_INCREMENT,
  `num_telClMor` varchar(8) NOT NULL,
  `adresseClMor` text NOT NULL,
  `emailClMor` text NOT NULL,
  `mdpClMor` text NOT NULL,
  `secteur` text NOT NULL,
  `nomClMor` text NOT NULL,
  PRIMARY KEY (`id_ClMor`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client_mor`
--

INSERT INTO `client_mor` (`id_ClMor`, `num_telClMor`, `adresseClMor`, `emailClMor`, `mdpClMor`, `secteur`, `nomClMor`) VALUES
(22, '71115100', 'Bd de l\'environnement Rte de Nàassen 2013 Bir Elkassaa  BEN AROUS', 'commercial@electrostar.com.tn', 'STESTE', 'industrie électronique', 'STE TUNISIENNE DE CABLAGE');

-- --------------------------------------------------------

--
-- Structure de la table `client_phy`
--

DROP TABLE IF EXISTS `client_phy`;
CREATE TABLE IF NOT EXISTS `client_phy` (
  `id_cin_clphy` varchar(8) NOT NULL,
  `nomClphy` varchar(20) NOT NULL,
  `prenomClphy` varchar(20) NOT NULL,
  `date_naiss` date NOT NULL,
  `profession` text NOT NULL,
  `num_telClphy` varchar(8) NOT NULL,
  `adresse_Clphy` text NOT NULL,
  `emailClphy` text NOT NULL,
  `mdpClphy` text NOT NULL,
  `sexe` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client_phy`
--

INSERT INTO `client_phy` (`id_cin_clphy`, `nomClphy`, `prenomClphy`, `date_naiss`, `profession`, `num_telClphy`, `adresse_Clphy`, `emailClphy`, `mdpClphy`, `sexe`) VALUES
('10263251', 'Arfaoui', 'Saber', '1975-03-15', 'Médecin', '95051370', '5 Rue Farhad Hached Mourouj 3 Ben Arous', 'arfaouisaber@gmail.com', 'saber123', 'homme'),
('11395231', 'Mejri', 'Maryem', '1984-03-01', 'actrice', '55614300', '1 Rue ezzouhour Den-Den Manouba', 'mejrimaryem1@gmail.com', 'maryem55', 'femme'),
('14656423', 'Hammemi', 'wiem', '2001-02-08', 'ingénieur informatique', '55714391', 'ben arous mourouj 3', 'hammemiwiem231@gmail.com', '6437f927825a0', 'femme');

-- --------------------------------------------------------

--
-- Structure de la table `comptable`
--

DROP TABLE IF EXISTS `comptable`;
CREATE TABLE IF NOT EXISTS `comptable` (
  `id_cin_c` varchar(8) NOT NULL,
  `nomComp` varchar(20) NOT NULL,
  `prenomComp` varchar(20) NOT NULL,
  `adresseComp` text NOT NULL,
  `num_telComp` varchar(8) NOT NULL,
  `mdpComp` text NOT NULL,
  `emailComp` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comptable`
--

INSERT INTO `comptable` (`id_cin_c`, `nomComp`, `prenomComp`, `adresseComp`, `num_telComp`, `mdpComp`, `emailComp`) VALUES
('12239114', 'Manai', 'Ali', '2 Avenue de la Liberté  Boumhel  Ben Arous', '22151360', 'Manaiali', 'manaiali@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

DROP TABLE IF EXISTS `consultation`;
CREATE TABLE IF NOT EXISTS `consultation` (
  `id_cons` int NOT NULL,
  `dateCons` date NOT NULL,
  `id_cin_clphy` varchar(8) NOT NULL,
  `id_ClMor` varchar(8) NOT NULL,
  `heure` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `consultation`
--

INSERT INTO `consultation` (`id_cons`, `dateCons`, `id_cin_clphy`, `id_ClMor`, `heure`) VALUES
(1, '2023-01-12', '10263251', '0', '14:00:00'),
(2, '2023-02-12', '10263251', '0', '10:30:00'),
(3, '2023-04-27', '', '22', '12:00:00'),
(4, '2023-04-18', '10263251', '', '10:30:00'),
(5, '2023-04-18', '', '22', '17:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `expert`
--

DROP TABLE IF EXISTS `expert`;
CREATE TABLE IF NOT EXISTS `expert` (
  `id_cin_ex` varchar(8) NOT NULL,
  `nomEx` varchar(20) NOT NULL,
  `prenomEx` varchar(20) NOT NULL,
  `emailEx` text NOT NULL,
  `specialiteEx` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `expert`
--

INSERT INTO `expert` (`id_cin_ex`, `nomEx`, `prenomEx`, `emailEx`, `specialiteEx`) VALUES
('13656422', 'Barhoumi', 'Emna', 'Barhoumiemna@gmail.com', 'Expert en gestion de projets'),
('12456489', 'Naffeti', 'Amin', 'naffetiamin@gmail.com', 'Expert en droit immobilier');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `code` int NOT NULL,
  `designation` text NOT NULL,
  `montant` float NOT NULL,
  `dateFact` date NOT NULL,
  `id_aff` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`code`, `designation`, `montant`, `dateFact`, `id_aff`) VALUES
(1, 'Facture de services professionnels pour la gestion de projet\".', 5000, '2023-02-25', 2);

-- --------------------------------------------------------

--
-- Structure de la table `houss_not`
--

DROP TABLE IF EXISTS `houss_not`;
CREATE TABLE IF NOT EXISTS `houss_not` (
  `id_cin_hn` varchar(8) NOT NULL,
  `nomHN` varchar(20) NOT NULL,
  `prenomHN` varchar(20) NOT NULL,
  `email_HN` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `houss_not`
--

INSERT INTO `houss_not` (`id_cin_hn`, `nomHN`, `prenomHN`, `email_HN`) VALUES
('10205339', 'Ben Younes', 'Mohamed', 'BYmohamed@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `moy_pay`
--

DROP TABLE IF EXISTS `moy_pay`;
CREATE TABLE IF NOT EXISTS `moy_pay` (
  `id_pay` int NOT NULL,
  `id_cin_clphy` int NOT NULL,
  `id_ClMor` int NOT NULL,
  `numCarte` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `moy_pay`
--

INSERT INTO `moy_pay` (`id_pay`, `id_cin_clphy`, `id_ClMor`, `numCarte`) VALUES
(1, 0, 22, '5359401123046659');

-- --------------------------------------------------------

--
-- Structure de la table `secretaire`
--

DROP TABLE IF EXISTS `secretaire`;
CREATE TABLE IF NOT EXISTS `secretaire` (
  `id_cin_s` varchar(8) NOT NULL,
  `nomS` varchar(20) NOT NULL,
  `prenomS` varchar(20) NOT NULL,
  `adresseS` text NOT NULL,
  `num_telS` varchar(8) NOT NULL,
  `mdpS` text NOT NULL,
  `emailS` text NOT NULL,
  `nivEtudeS` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `secretaire`
--

INSERT INTO `secretaire` (`id_cin_s`, `nomS`, `prenomS`, `adresseS`, `num_telS`, `mdpS`, `emailS`, `nivEtudeS`) VALUES
('11564482', 'Hrichi', 'Oumayma', '30 rue 13 Août  El Ouardia  Tunis', '99120554', 'oumayma99120554', 'hrichioumayma02@gmail.com', 'bac + 3');

-- --------------------------------------------------------

--
-- Structure de la table `tribunal`
--

DROP TABLE IF EXISTS `tribunal`;
CREATE TABLE IF NOT EXISTS `tribunal` (
  `id_trib` int NOT NULL AUTO_INCREMENT,
  `nomT` text NOT NULL,
  `spetialiteT` text NOT NULL,
  `zone` text NOT NULL,
  `region` text NOT NULL,
  PRIMARY KEY (`id_trib`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tribunal`
--

INSERT INTO `tribunal` (`id_trib`, `nomT`, `spetialiteT`, `zone`, `region`) VALUES
(1, 'Tribunal Immobilier de Tunis.', 'Tribunal Immobilier de Tunis.', 'Le siège principal  de Tunis', 'Ariana,  Ben Arous,   Manouba, Nabeul et  Zaghouane'),
(2, 'Le tribunal de première instance de Tunis', 'Le tribunal de première instance de Tunis', 'Tunis', 'La Médina, Beb Bhar, Beb Souika, El Omrane, Cité El Kadra, El Manzah, Sidi El Béchir, Carthage,El Omrane supérieur,La Goulette, El Kram, La Marsa, Bardo, Ettahrir');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
