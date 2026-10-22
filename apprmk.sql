-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 03, 2023 at 11:40 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apprmk`
--

-- --------------------------------------------------------

--
-- Table structure for table `conges`
--

DROP TABLE IF EXISTS `conges`;
CREATE TABLE IF NOT EXISTS `conges` (
  `IDconge` int(15) NOT NULL AUTO_INCREMENT,
  `userMat` varchar(15) NOT NULL,
  `congeType` varchar(26) NOT NULL,
  `dateDepo` date NOT NULL,
  `timeDepo` time DEFAULT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `duree` float NOT NULL,
  `cngETAT` varchar(20) NOT NULL,
  `dateRep` date DEFAULT NULL,
  `dateTitre` date DEFAULT NULL,
  `Note` text,
  PRIMARY KEY (`IDconge`,`userMat`)
) ENGINE=InnoDB AUTO_INCREMENT=10113 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conges`
--

INSERT INTO `conges` (`IDconge`, `userMat`, `congeType`, `dateDepo`, `timeDepo`, `dateDebut`, `dateFin`, `duree`, `cngETAT`, `dateRep`, `dateTitre`, `Note`) VALUES
(10109, 'SONAE543788', 'Annuel', '2023-07-03', '22:31:46', '2023-07-05', '2023-07-15', 9, 'valid&eacute;e', '2023-07-03', '2023-07-03', NULL),
(10112, 'SONAE543788', 'R&eacute;cup&eacute;ration', '2023-07-03', '22:52:41', '2023-07-07', '2023-07-10', 3, 'refus&eacute;e', '2023-07-03', NULL, 'Nous avons besoin de vous pendant cette pÃ©riode');

-- --------------------------------------------------------

--
-- Table structure for table `depart`
--

DROP TABLE IF EXISTS `depart`;
CREATE TABLE IF NOT EXISTS `depart` (
  `IDdep` varchar(15) NOT NULL,
  `nomDep` varchar(15) NOT NULL,
  `IDchef` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IDdep`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depart`
--

INSERT INTO `depart` (`IDdep`, `nomDep`, `IDchef`) VALUES
('IT001', 'IT', NULL),
('RH010', 'RH', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `interim`
--

DROP TABLE IF EXISTS `interim`;
CREATE TABLE IF NOT EXISTS `interim` (
  `IDchef` varchar(15) NOT NULL,
  `IDemp` varchar(15) NOT NULL,
  `dateD` date NOT NULL,
  `dateF` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interim`
--

INSERT INTO `interim` (`IDchef`, `IDemp`, `dateD`, `dateF`) VALUES
('SONAC000650', 'SONAG004050', '2023-06-29', '2023-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `soldes`
--

DROP TABLE IF EXISTS `soldes`;
CREATE TABLE IF NOT EXISTS `soldes` (
  `empMat` varchar(15) NOT NULL,
  `soldeAN` int(5) NOT NULL DEFAULT '0',
  `soldeREC` int(5) NOT NULL DEFAULT '0',
  `soldeINZC` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`empMat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soldes`
--

INSERT INTO `soldes` (`empMat`, `soldeAN`, `soldeREC`, `soldeINZC`) VALUES
('SONAE004050', 15, 2, 0),
('SONAE543788', 16, 10, 0),
('SONAG004050', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userMAT` varchar(25) NOT NULL,
  `userPWD` varchar(15) NOT NULL,
  `userROLE` varchar(15) NOT NULL,
  `userNOM` varchar(25) NOT NULL,
  `userPRE` varchar(25) NOT NULL,
  `userPHOTO` varchar(20) NOT NULL,
  `userGENRE` varchar(5) NOT NULL,
  `userETACIV` varchar(10) NOT NULL,
  `userNAISS` date NOT NULL,
  `userEMAIL` varchar(35) NOT NULL,
  `userPHONE` int(50) NOT NULL,
  `userADRESSE` varchar(50) NOT NULL,
  `userDEPARTEMENT` varchar(25) NOT NULL,
  `userPOST` varchar(30) NOT NULL,
  PRIMARY KEY (`userMAT`),
  UNIQUE KEY `userEMAIL` (`userEMAIL`),
  UNIQUE KEY `userPHONE` (`userPHONE`),
  UNIQUE KEY `userPWD` (`userPWD`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userMAT`, `userPWD`, `userROLE`, `userNOM`, `userPRE`, `userPHOTO`, `userGENRE`, `userETACIV`, `userNAISS`, `userEMAIL`, `userPHONE`, `userADRESSE`, `userDEPARTEMENT`, `userPOST`) VALUES
('SonaA00001', '1', 'admin', 'Benacer', 'Mohamed', '14.png', 'H', 'Mr', '1963-09-20', 'M.benaser@gmail.com', 551234567, 'Rue mouradoudia-alger', '---', 'Admin'),
('SONAC000650', 'SONA2474199648', 'chef', 'BENYOUCEF', 'WALID', '5.png', 'Homme', 'Mr', '1989-05-29', 'W.Benyoucef@gmail.com', 677843976, 'Rue Ouled heddaj-Alger', 'RH010', 'chef de dÃ©partement'),
('SONAC003475', 'SONA4476578351', 'chef', 'BENALI', 'Djamal', '1.png', 'Homme', 'Mr', '1983-10-11', 'D.benAli@gmail.com', 547634890, 'Rue des frÃ©res sahraoui', 'IT001', 'chef de dÃ©partement'),
('SONAE004050', 'SONA9317888641', 'emp', 'HASNI', 'Amel', '10.png', 'Femme', 'Melle', '1990-10-12', 'A.Hasni@gmail.com', 613253809, 'Rue 850 Maisons-Boumerdes', 'RH010', 'ingÃ©nieur d\'Ã©tat '),
('SONAE543788', 'SONA0733683966', 'emp', 'TAIB', 'Idris', '9.png', 'Homme', 'Mr', '1989-01-29', 'I.Taib@gmail.com', 765432016, '18 Rue Mohamed Felah Kouba', 'IT001', 'technicien '),
('SONAG004050', 'SONA5171484687', 'grh', 'BENSAADALLAH', 'Maria', '6.png', 'Femme', 'Mme', '1986-01-12', 'M.Bensaad@gmail.com', 644366241, 'Rue 1er Novembre-Boumerdes', 'RH010', 'Gestionnaire RH');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
