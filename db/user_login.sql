-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2015 at 11:57 AM
-- Server version: 5.5.41
-- PHP Version: 5.4.41-0+deb7u1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `user_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE IF NOT EXISTS `clubs` (
  `CLUB_ID` int(10) NOT NULL AUTO_INCREMENT,
  `NOM_CLUB` varchar(200) NOT NULL,
  `ALIAS` varchar(4) NOT NULL,
  `RESPONSABLE` int(5) NOT NULL,
  `CREATED` datetime NOT NULL,
  PRIMARY KEY (`CLUB_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`CLUB_ID`, `NOM_CLUB`, `ALIAS`, `RESPONSABLE`, `CREATED`) VALUES
(1, 'Basket Club Saint-Hubert', 'BASH', 30, '0000-00-00 00:00:00'),
(2, 'Ju-Jutsu club Saint-Hubert', 'JUJU', 43, '0000-00-00 00:00:00'),
(3, 'TTC Saint Hubert (Tennis de table)', 'TTSH', 32, '0000-00-00 00:00:00'),
(4, 'Master boys (Mini-Foot)', 'MABO', 35, '0000-00-00 00:00:00'),
(5, 'MF Saint-Hubert', 'MFSH', 39, '0000-00-00 00:00:00'),
(7, 'Judo club SH', 'JUDO', 43, '2015-06-08 05:59:30'),
(24, 'Curling', 'MAB', 43, '2015-07-06 08:32:25'),
(25, 'Volley', 'NMA', 32, '2015-07-06 16:54:09'),
(28, 'Club de Bridge', 'DUA', 42, '2015-07-20 09:37:16');

-- --------------------------------------------------------

--
-- Table structure for table `factures`
--

CREATE TABLE IF NOT EXISTS `factures` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `NUMERO` int(10) NOT NULL,
  `PERIODE_DEBUT` date NOT NULL,
  `PERIODE_FIN` date NOT NULL,
  `FICHIER` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure`
--

CREATE TABLE IF NOT EXISTS `infrastructure` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `NOM_INFRA` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `infrastructure`
--

INSERT INTO `infrastructure` (`ID`, `NOM_INFRA`) VALUES
(1, 'Salle omnisports'),
(2, 'Piscine');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `CLUB` int(10) DEFAULT NULL,
  `UTILISATEUR` int(10) DEFAULT NULL,
  `DATEHEURELOGIN` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DATEHEURELOGOUT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `INDEXLOGIN` int(20) DEFAULT '0',
  `INDEXLOGOUT` int(20) NOT NULL DEFAULT '0',
  `CONSO` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`ID`, `CLUB`, `UTILISATEUR`, `DATEHEURELOGIN`, `DATEHEURELOGOUT`, `INDEXLOGIN`, `INDEXLOGOUT`, `CONSO`) VALUES
(1, 1, 1, '2014-12-02 08:00:00', '2014-12-02 09:27:00', 13145, 13174, 29),
(2, 1, 2, '2014-12-03 12:00:00', '2014-12-03 13:26:00', 13189, 13256, 67),
(24, 1, 2, '2015-03-28 10:21:26', '2015-03-28 10:21:28', 1000, 1010, 10),
(25, 1, 2, '2015-03-28 10:22:48', '2015-03-28 10:23:08', 1010, 1020, 10),
(26, 1, 2, '2015-03-28 10:24:32', '2015-03-28 10:26:41', 1020, 1030, 10),
(27, 1, 2, '2015-03-28 10:27:21', '2015-03-28 10:28:07', 1030, 1040, 10),
(28, 1, 2, '2015-03-28 10:32:33', '2015-03-28 10:33:25', 1040, 1050, 10),
(30, 1, 2, '2015-03-28 10:34:36', '2015-03-28 10:34:49', 1060, 1070, 10),
(32, 1, 2, '2015-03-28 10:40:03', '2015-03-30 18:43:27', 12345, 32, 0),
(33, 0, 2, '2015-03-30 18:43:35', '2015-03-30 18:51:07', 12345, 33, 0),
(34, 0, 2, '2015-03-30 18:51:21', '2015-03-30 18:57:29', 12345, 34, 0),
(35, 0, 2, '2015-03-30 18:57:37', '2015-03-30 19:01:40', 12345, 35, 0),
(36, 0, 2, '2015-03-30 19:01:50', '2015-03-30 19:05:33', 12345, 36, 0),
(37, 0, 2, '2015-03-30 19:05:39', '2015-03-30 19:06:36', 12345, 37, 0),
(38, 0, 2, '2015-03-30 19:06:43', '2015-03-30 19:06:54', 12345, 38, 0),
(39, 0, 2, '2015-03-30 19:07:04', '2015-03-30 19:07:06', 12345, 39, 0),
(41, 1, 2, '2015-03-30 19:14:07', '2015-03-30 19:17:57', 12345, 41, 0),
(43, 2, 2, '2015-03-30 20:03:32', '2015-03-30 20:41:42', 12345, 43, 0),
(48, 2, 2, '2015-03-30 20:42:04', '2015-03-30 20:42:38', 12345, 48, 0),
(49, 2, 2, '2015-03-30 20:43:20', '2015-03-30 20:43:47', 12345, 49, 0),
(52, 4, 2, '2015-03-30 20:45:48', '2015-03-30 20:46:24', 12345, 52, 0),
(54, 3, 2, '2015-03-30 20:48:10', '2015-03-30 20:49:00', 12345, 54, 0),
(55, 2, 2, '2015-03-30 20:55:10', '2015-03-30 21:09:07', 12345, 55, 0),
(57, 0, 2, '2015-03-30 21:09:31', '2015-03-31 03:58:11', 12345, 57, 0),
(58, 0, 2, '2015-04-05 08:39:22', '2015-04-05 08:40:00', 12345, 58, 0),
(59, 0, 2, '2015-04-05 08:40:08', '2015-04-08 11:32:04', 12345, 59, 0),
(60, 0, 2, '2015-04-08 11:33:03', '2015-04-09 04:15:37', 12345, 60, 0),
(61, 0, 2, '2015-04-09 04:15:50', '2015-04-09 04:17:24', 12345, 61, 0),
(62, 0, 2, '2015-04-09 04:17:52', '2015-04-09 04:18:28', 12345, 62, 0),
(63, 0, 2, '2015-04-13 19:05:42', '2015-04-19 10:56:50', 12345, 63, 0),
(64, 0, 2, '2015-04-19 11:00:05', '2015-04-19 11:00:59', 12345, 64, 0),
(65, 0, 2, '2015-04-29 05:12:20', '2015-06-03 06:26:32', 12345, 65, 0),
(66, 0, 2, '2015-06-03 06:26:48', '2015-07-03 06:35:00', 12345, 66, 0),
(67, 0, 2, '2015-07-03 06:35:11', '2015-07-07 08:59:35', 12345, 67, 0),
(68, 0, 2, '2015-07-07 09:00:35', '2015-07-07 09:02:04', 12345, 68, 0),
(69, 0, 2, '2015-07-08 05:04:58', '2015-07-08 05:04:58', 12345, 69, 0),
(70, 0, 2, '2015-07-17 11:45:52', '2015-07-17 11:45:52', 12345, 70, 0),
(71, 0, 2, '2015-07-17 11:51:45', '2015-07-17 11:51:45', 12345, 71, 0),
(72, 0, 2, '2015-07-17 11:51:54', '0000-00-00 00:00:00', 12345, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `USER_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NOM` varchar(50) CHARACTER SET latin1 NOT NULL,
  `PRENOM` varchar(50) CHARACTER SET latin1 NOT NULL,
  `ALIAS` varchar(4) COLLATE latin1_bin NOT NULL,
  `RUE` varchar(200) CHARACTER SET latin1 NOT NULL,
  `NUMERO` varchar(20) CHARACTER SET latin1 NOT NULL,
  `CODE_POSTAL` int(11) NOT NULL,
  `LOCALITE` varchar(100) CHARACTER SET latin1 NOT NULL,
  `PAYS` varchar(50) CHARACTER SET latin1 NOT NULL,
  `TELEPHONE` varchar(30) CHARACTER SET latin1 NOT NULL,
  `GSM` varchar(30) CHARACTER SET latin1 NOT NULL,
  `EMAIL` varchar(100) CHARACTER SET latin1 NOT NULL,
  `PASSWORD` varchar(60) CHARACTER SET latin1 NOT NULL,
  `CREATED` datetime NOT NULL,
  PRIMARY KEY (`USER_ID`),
  UNIQUE KEY `email` (`EMAIL`),
  KEY `login` (`PASSWORD`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=89 ;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`USER_ID`, `NOM`, `PRENOM`, `ALIAS`, `RUE`, `NUMERO`, `CODE_POSTAL`, `LOCALITE`, `PAYS`, `TELEPHONE`, `GSM`, `EMAIL`, `PASSWORD`, `CREATED`) VALUES
(30, 'Marlair', 'Didier', 'DMA', 'rue du Marabout', '76', 6060, 'Gilly', 'Belgique', '+3271422927', '+32471920390', 'dmarlair@gmail.com', 'e78f30abb3336d5ee99d57f75df242ae', '2014-12-29 09:15:53'),
(32, 'Marlair', 'Noémie', 'NMA', 'rue du Marabout', '76', 6060, 'Gilly', 'Belgique', '+3271422927', '+32485164457', 'noemie.marlair@gmail.com', 'a02257f2071548956a66571cd1dfef37', '2014-12-29 09:54:16'),
(35, 'Marlair', 'Emilie', 'EMA', 'rue du Marabout', '76', 6060, 'Gilly', 'Belgique', '+3271422927', '+32491087855', 'emilie.marlair@gmail.com', 'a02257f2071548956a66571cd1dfef37', '2014-12-30 14:04:53'),
(39, 'Guében', 'Joëlle', 'JGU', 'rue du Marabout', '76', 6060, 'Gilly', 'Belgique', '+3271422927', '+32499250484', 'jgueben@gmail.com', 'a02257f2071548956a66571cd1dfef37', '2014-12-31 08:49:42'),
(40, 'Marlair', 'Bertrand', 'MAB', 'rue du Marabout', '76', 6060, 'Gilly', 'Belgique', '071422927', '0472727243', 'bertkill243@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2015-04-13 21:54:41'),
(42, 'Dupont', 'Aurore', 'DUA', 'rue de la Place', '6', 5456, 'Balâtre', 'Belgique', '-', '0475/678901', 'adupont@gmail.com', '00856ab2bbb748aa29aa335a6e3a2407', '2015-06-08 06:21:39'),
(43, 'Albert', 'Guy', 'ALG', 'rue de la Place', '25', 5544, 'Balâtre', 'Belgique', '0476/767676', '0476/767676', 'ga@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2015-07-03 09:42:20'),
(87, 'Gueben', 'Stéphane', 'GUST', 'Le Routeux', '15', 6856, 'Orgeo', 'Belgique', '061565656', '0474569875', 'steph@gmail.com', 'e8fab42752f318b2b2beb039a57dedcd', '2015-07-22 22:26:55'),
(88, 'Lagna', 'Antoine', 'LAAN', 'Chaussée de Châtelineau', '85', 6061, 'Montignies/sur/Sambre', 'Belgique', '-', '0474/639161', 'antoine.heaj@gmail.com', 'e78f30abb3336d5ee99d57f75df242ae', '2015-07-24 10:20:31');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
