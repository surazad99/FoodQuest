-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2017 at 06:35 PM
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
  `Review_Id` int(5) NOT NULL AUTO_INCREMENT,
  `Uplodaded_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Uploaded_By` int(11) NOT NULL,
  `Review` text NOT NULL,
  `Rating` float NOT NULL DEFAULT '2',
  `Food_Id` int(5) NOT NULL,
  PRIMARY KEY (`Review_Id`),
  UNIQUE KEY `Review_Id` (`Review_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `trust_level`
--

INSERT INTO `trust_level` (`Review_Id`, `Uplodaded_Time`, `Uploaded_By`, `Review`, `Rating`, `Food_Id`) VALUES
(2, '2017-07-18 14:33:11', 46, 'Sticks in this hotel is too pricky!! Not Good', 3, 48),
(3, '2017-07-18 14:53:39', 46, 'detail comment by ANnu11', 3, 17),
(7, '2017-07-18 14:58:56', 46, 'rotten:- by annu-11', 1, 14),
(8, '2017-07-18 15:20:04', 46, 'why this has so complicated name!! Bachho k jan lega kya...', 2, 45),
(9, '2017-07-18 15:20:49', 46, 'Okay this has got simpler name', 4, 2),
(11, '2017-07-19 09:22:50', 46, 'comment by annu 11on veg shadeko special', 4, 46),
(12, '2017-07-19 16:38:35', 2, 'sur99 comment in Veg Special', 3, 46),
(13, '2017-07-19 17:38:00', 7, 'very unsatisfying...', 2, 46),
(14, '2017-07-20 02:45:04', 1, 'Very Good veggies , real fresh veggiess! Loved it!', 3, 46),
(15, '2017-07-20 07:09:47', 46, 'taaaaaaaaaaaaaaaaaaaaait!!! Je payo tehi rahexa yo roti tah!!!', 2, 52),
(18, '2017-07-20 07:15:11', 7, 'as good as in description', 3, 52),
(20, '2017-07-20 16:21:00', 46, 'Crispy...So good! Best donought i ever had...', 4, 53),
(21, '2017-07-20 16:21:54', 1, 'not as good as before', 4, 53),
(22, '2017-07-20 16:23:30', 2, 'Looks like Selroti but tastes much better! 5star rating by me..', 5, 53);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
