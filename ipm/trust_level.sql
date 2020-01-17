-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2017 at 09:04 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `food quest`
--

-- --------------------------------------------------------

--
-- Table structure for table `trust_level`
--

CREATE TABLE IF NOT EXISTS `trust_level` (
  `Review_Id` int(5) NOT NULL,
  `Uplodaded_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Uploaded_By` int(11) NOT NULL,
  `Review` text NOT NULL,
  `Rating` float NOT NULL DEFAULT '2',
  `Food_Id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trust_level`
--

INSERT INTO `trust_level` (`Review_Id`, `Uplodaded_Time`, `Uploaded_By`, `Review`, `Rating`, `Food_Id`) VALUES
(0, '2017-07-17 19:01:15', 2, 'WOW what a serving they have', 4, 16);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
