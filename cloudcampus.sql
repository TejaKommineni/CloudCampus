-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2017 at 04:54 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cloudcampus`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Code` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Professor` int(5) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Code` (`Code`),
  KEY `Professor_in_Login_Table` (`Professor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`Id`, `Code`, `Name`, `Description`, `Professor`) VALUES
(1, 'IS 6410', 'Web Based Apps', 'We teach Something', 2),
(2, 'IS 4320', 'Business Intel', 'We teach what we teach', 2),
(3, 'IS 5340', 'Natural Language', 'We teach English in a new way.', 1),
(4, 'IS 6160', 'Data Mining', 'Data is the New God.', 1),
(5, 'IS 6800', 'Distributed Systems', 'The say once the world was centralized.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

DROP TABLE IF EXISTS `enroll`;
CREATE TABLE IF NOT EXISTS `enroll` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `UserId` int(20) NOT NULL,
  `ClassId` int(20) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `UserId` (`UserId`,`ClassId`),
  KEY `Class_in_Class_Table` (`ClassId`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`Id`, `UserId`, `ClassId`) VALUES
(33, 6, 3),
(34, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Role` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Id`, `Username`, `Password`, `Email`, `Role`, `Name`) VALUES
(1, 'robricci', 'asdf', 'rob@rob.com', 'Professor', 'Robert Ricci'),
(2, 'kobus', 'asdf', 'kobus@kobus.com', 'Professor', 'Kobus Van Der MerWe'),
(6, 'teja', 'Lakshmi93', 'teja.kommineni1@gmail.com', '', ''),
(7, 'u1087', 'asaasda', 'teja.kommineni1@gmail.c', '', 'Teja');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `Id` int(5) NOT NULL,
  `ClassId` int(20) NOT NULL,
  `Links` int(200) NOT NULL,
  `Topic` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `ClassID_in_Class_Table` (`ClassId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
