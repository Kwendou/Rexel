-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2015 at 11:47 AM
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
