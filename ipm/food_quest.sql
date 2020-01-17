-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2017 at 05:24 AM
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
-- Table structure for table `consumer`
--

CREATE TABLE IF NOT EXISTS `consumer` (
  `First_Name` text NOT NULL,
  `Last_Name` text NOT NULL,
  `User_Id` int(20) NOT NULL AUTO_INCREMENT,
  `Status` tinyint(1) NOT NULL DEFAULT '1',
  `User_Name` varchar(20) NOT NULL,
  `User_Type` int(1) NOT NULL,
  `Email` varchar(11) NOT NULL,
  `Password` varchar(101) NOT NULL,
  `Phone_Number` int(15) NOT NULL,
  `Latitude` double NOT NULL,
  `Longitude` varchar(50) NOT NULL,
  `Hotel_Name` varchar(50) NOT NULL,
  `Hotel_Number` int(15) NOT NULL,
  `Hotel_Address` int(11) NOT NULL,
  PRIMARY KEY (`User_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `consumer`
--

INSERT INTO `consumer` (`First_Name`, `Last_Name`, `User_Id`, `Status`, `User_Name`, `User_Type`, `Email`, `Password`, `Phone_Number`, `Latitude`, `Longitude`, `Hotel_Name`, `Hotel_Number`, `Hotel_Address`) VALUES
('Slice', 'Rio', 1, 1, 'slicyRio', 0, 'RIo@slicy.c', '123', 0, 0, '', '', 0, 0),
('Suraj', 'Adhikari', 2, 1, 'Sur99', 0, 'sur@bhauju.', '123', 0, 0, '', '', 0, 0),
('Mohit', 'Dhungana', 6, 1, 'Mohit07', 1, 'Mohit99@yah', '123', 0, 0, '', 'Koteshwor khaja ghar', 0, 0),
('master', 'mind', 7, 1, 'Mmaster', 0, 'masteria@bu', 'aaa', 0, 0, '', '', 0, 0),
('Sajita', 'Adhikari', 11, 1, 'Sajj89', 1, 'sajju@gmail', '123', 0, 0, '', 'Balkumari cafe', 0, 0),
('surya ', 'Bhushal', 32, 1, 'surr99', 0, 'Surya@gmail', '123', 2147483647, 0, '', '', 0, 0),
('Suraj', 'Adhikari', 33, 1, 'Surazad99', 2, 'suraz.ad99@', '321', 2147483647, 0, '', '', 0, 0),
('Pratik', 'Mishra', 39, 1, 'jasonCafe77', 1, 'chicken72@p', '123', 999999999, 0, '', 'Anglo', 0, 0),
('Subin', 'Panth', 40, 1, 'Soldai', 1, 'soldai@yoho', '123', 2147483647, 0, '', 'Starbucks', 0, 0),
('sdf', 'dsfds', 41, 1, 'sdfds', 1, 'sdfsdf@', '123', 123, 0, '', 'KFC', 0, 0),
('Subin', 'panta', 45, 1, 'rar', 1, 'usubdsudb@g', '123', 2147483647, 0, '', 'Kathford khaja ghar', 0, 0),
('Anup', 'Neupane', 46, 1, 'Annu11', 0, 'illusion.kr', '123', 2147483647, 0, '', '', 0, 0),
('Asmita', 'Rayamajhi', 47, 1, 'AsuRay', 1, 'Asu_susu@ya', '123', 2147483647, 0, 'Mal Pokhari', 'Asmita Khaja Ghar', 1543274, 0),
('Ramesh', 'Malasi', 48, 1, 'Ramesh123', 1, '@sfs', '123', 980237583, 27.6966, '85.311951', 'Kwality Food Cafe', 124356, 0),
('Sujata', 'Giri', 49, 1, 'sujugi', 1, 'suju@gmail.', '123', 0, 27.710139, '85.316368', 'Ram Misthanna Bhandar', 1543221, 0),
('purba', 'dhurba', 50, 1, 'pudhu', 1, '@', '123', 5342332, 0, '', 'Purbeli ', 2342, 0),
('Pradeep', 'Ghimire', 51, 1, 'Mentor', 1, '@', '123', 76878678, 27.688924334670666, '85.33896446228027', 'burger cafe', 908867, 0),
('dsfdsf', 'dfsd', 52, 1, 'dffg', 1, '@', '123', 4564564, 27.684592154364683, '85.34411430358887', 'sdsdf', 345345, 0),
('dsfdsf', 'dfsd', 53, 1, 'dffg', 1, '@', '123', 4564564, 27.684592154364683, '85.34411430358887', 'sdsdf', 345345, 0),
('Pramesh', 'Khatiwada', 54, 1, 'Pram99', 1, '@', '123', 989448, 0, '', 'Pramesh Khaja Fhar', 45645654, 0),
('Shreejit', 'Bhattarai', 55, 1, 'Shij23', 0, 'S@', '123', 98457, 0, '', '', 0, 0),
('Shreejit', 'Bhattarai', 56, 1, 'Shij23', 0, 'S@', '123', 98457, 0, '', '', 0, 0),
('Bebeck', 'Khadka', 57, 1, 'Bebeck', 0, 'bebeck@gmai', 'abcd', 2147483647, 0, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `Food_Id` int(10) NOT NULL AUTO_INCREMENT,
  `Food_Name` varchar(100) NOT NULL,
  `Food_Price` float NOT NULL,
  `Food_Image` varchar(200) NOT NULL,
  `Food_Description` varchar(400) NOT NULL,
  `Food_Rating` float NOT NULL,
  `Uploaded_By` int(20) NOT NULL,
  `Uploaded_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Food_Id`),
  UNIQUE KEY `Food_Id` (`Food_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Food_Id`, `Food_Name`, `Food_Price`, `Food_Image`, `Food_Description`, `Food_Rating`, `Uploaded_By`, `Uploaded_Time`) VALUES
(1, 'Mochachino Cofee', 230, 'images/Mochachino Cofee.jpg', 'Just good enough to make you here back once again', 4, 39, '0000-00-00 00:00:00'),
(2, 'Chicken Tandoori', 100, 'images/Sekuwa.jpg', 'Made from the finest chicken available', 3.5, 39, '0000-00-00 00:00:00'),
(3, 'Veg Pakauda', 25, 'images/Veg Pakauda.jpg', 'World Famous pakauda in Kathford canteen', 5, 39, '0000-00-00 00:00:00'),
(4, 'Paneer Chilly', 123, 'images/Paneer Chilly.jpg', 'The chilly you have never eaten', 2.8, 39, '0000-00-00 00:00:00'),
(5, 'French Fries', 234, 'images/French Fries.jpg', 'The best item from the Tashi Delek Restaurant and Bar', 3.7, 39, '0000-00-00 00:00:00'),
(6, 'Pudina Flavoured Beer', 300, 'images/Tuborg Beer.jpg', 'Chilled beer with pudina flavour', 4.3, 39, '0000-00-00 00:00:00'),
(10, 'Real Mango juice', 30, 'images/Real Mango juice.jpg', 'Fat free and low in cholestrol so best for Soldais Health', 4.2, 40, '0000-00-00 00:00:00'),
(11, 'Boiled Chicken', 333, 'images/Boiled Chicken.jpg', 'Best for Soldai ', 3.7, 40, '0000-00-00 00:00:00'),
(12, 'Samosa', 45, 'images/Samosa.jpg', 'less fat high energy', 4.6, 39, '0000-00-00 00:00:00'),
(14, 'boiled egg', 20, 'images/boiled egg.jpg', 'mitho ra healthy', 4.5, 40, '0000-00-00 00:00:00'),
(16, 'Kakani Trout', 453, 'images/Kakani Trout.jpg', 'Taja taja pokhari baata nikalera banaeeko...', 5, 40, '0000-00-00 00:00:00'),
(17, 'Dosa', 50, 'images/Dahi Puri.jpg', 'best in kusunti', 3, 39, '0000-00-00 00:00:00'),
(18, 'Tuborg Beer', 332, 'images/Tuborg Beer.jpg', 'Tuborg is the best in valley', 2.5, 40, '0000-00-00 00:00:00'),
(32, 'Khaja Set', 342, 'images/Khaja Set1499693027.jpg', 'compiled with various dishes to give a fullfilling meal', 4.3, 45, '2017-07-10 09:38:47'),
(33, 'Khaja Set', 653, 'images/Khaja Set1499693078.jpg', 'designed to extinguish your hunger', 3.4, 45, '2017-07-10 09:39:38'),
(34, 'Khaja Set', 421, 'images/Khaja Set1499693775.jpg', 'Just good enough to make you here back once again', 4.3, 39, '2017-07-10 09:51:15'),
(35, 'Khaja Set', 439, 'images/Khaja Set1499693865.jpg', 'good meal for a good price', 3, 40, '2017-07-10 09:52:45'),
(36, 'choila', 124, 'images/choila1499694231.jpg', 'made by finest chef in kathmadu', 5, 40, '2017-07-10 09:58:51'),
(38, 'choila', 54, 'images/choila1499694316.jpg', 'hungry look no more', 3, 45, '2017-07-10 10:00:16'),
(39, 'Tuborg Beer', 435, 'images/Tuborg Beer1499710797.jpg', 'chilled beer  ', 2, 45, '2017-07-10 14:34:57'),
(40, 'Marfa Apple Beer', 454, 'images/Tuborg Beer1499710948.jpgTuborg Beer Edited1499710948.jpgTuborg Beer Edited1499710948.jpgTuborg Beer1499710948.jpg', 'stored for 7 years to give you the best taste', 4, 39, '2017-07-10 14:37:28'),
(41, 'Tuborg Beer', 435, 'images/Tuborg Beer1499711147.jpg', 'finest beer to chill with your friends', 3.6, 40, '2017-07-10 14:40:47'),
(42, 'Holzin Glazed Salmon', 341, 'images/Holzin Glazed Salmon1499728106.jpg', 'Finest salmon imported from australia', 4.5, 11, '2017-07-10 19:23:26'),
(43, 'Pacific Lobster', 324, 'images/Pacific Lobster1499728197.jpg', 'directly from the bottom of pacific ocean', 4, 11, '2017-07-10 19:24:57'),
(44, 'master burger Ham', 324, 'images/master burger Ham1499728947.jpg', 'bet you can''t eat that in one go', 3.7, 11, '2017-07-10 19:37:27'),
(45, 'Mutton Sekuwa Hyperhaxle', 234, 'images/Mutton Sekuwa Hyperhaxle1499729172.jpg', 'made from local goat', 4, 11, '2017-07-10 19:41:12'),
(46, 'Veggies Sadheko Special', 286, 'images/Veggies Sadheko Special1499759212.jpg', 'Made from all the fresh vegetables available', 3, 45, '2017-07-11 04:01:52'),
(47, 'Veg Buger', 326, 'images/Veg Buger1499759654.jpg', 'You can not imagine a Veg Burger more tastier', 4, 11, '2017-07-11 04:09:14'),
(48, 'Sticks-And-Veggies', 121, 'images/Sticks-And-Veggies1499759905.jpg', 'you a vegeterian? No probelm!! Try this', 3, 40, '2017-07-11 04:13:25'),
(50, 'chicken lolipop', 250, 'images/chicken lolipop1499945997.jpg', 'probably the least oil  soaked Lollipop in Kathmandu', 4, 39, '2017-07-13 07:54:57'),
(51, 'Sizzler', 350, 'images/Sizzler1500407905.jpg', 'sizzlingly delicios', 4, 47, '2017-07-18 16:13:25'),
(52, 'Alu Nan  Parautha', 90, 'images/Alu Nan  Parautha1500547901.jpg', 'Come back to the roots try something local', 3, 40, '2017-07-20 07:06:41'),
(53, 'Chinese Yen Donought', 46, 'images/Chinese Yen Donought1500580813.jpg', 'famous recipe from the great wall of china', 4, 48, '2017-07-20 16:15:13'),
(54, 'Crispi Waffels  ', 150, 'images/Crispi Waffels  1500620988.jpg', 'available at our hotel at any time ', 5, 49, '2017-07-21 03:24:48'),
(56, 'Pizza', 1000, 'images/Pizza1500709598.jpg', 'recipe from the famous Gordon Ramsey', 4.5, 0, '2017-07-22 04:01:38'),
(57, 'Pakauda', 45, 'images/Pakauda1500709651.jpg', 'made with olive oil', 3.5, 0, '2017-07-22 04:02:31'),
(58, 'Greek Boiled', 12, 'images/Greek Boiled1500709713.jpg', 'freshly made', 5, 0, '2017-07-22 04:03:33'),
(59, 'Lassi', 123, 'images/Lassi1500709905.jpg', 'you cant not come back here', 5, 0, '2017-07-22 04:06:45'),
(60, 'dvxc naan', 213, 'images/dvxc naan1500710091.jpg', 'freshly made', 3, 0, '2017-07-22 04:09:51'),
(61, 'Dish', 23, 'images/Dish1500710258.jpg', 'going to bet you want some more', 3.5, 0, '2017-07-22 04:12:38'),
(62, 'sdfds', 12, 'images/sdfds1500711201.jpg', 'paneer curry', 3, 0, '2017-07-22 04:28:21'),
(63, 'Sekuwa Chicken', 123, 'images/Sekuwa Chicken1500711924.jpg', 'made from fresh chicken', 4, 0, '2017-07-22 04:40:24'),
(64, 'Smoked and Grilled Pork', 250, 'images/Roasted Chicken Pork1500712147.jpg', 'Best Roasted Pork In Nepal', 4, 54, '2017-07-22 04:44:07'),
(65, 'Sausage', 150, 'images/Sausage1500713365.jpg', 'we make our own sausage', 4, 54, '2017-07-22 05:04:25'),
(66, 'Paneer Stick', 40, 'images/Paneer Stick1500720517.jpg', 'we provide you the special Paneer', 3.7, 39, '2017-07-22 07:03:37'),
(67, 'Burger', 300, 'images/Burger1500733795.jpg', 'its best', 0, 39, '2017-07-22 10:44:55');

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
  `Food_Name` varchar(50) NOT NULL,
  `User_Name` varchar(20) NOT NULL,
  PRIMARY KEY (`Review_Id`),
  UNIQUE KEY `Review_Id` (`Review_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `trust_level`
--

INSERT INTO `trust_level` (`Review_Id`, `Uplodaded_Time`, `Uploaded_By`, `Review`, `Rating`, `Food_Id`, `Food_Name`, `User_Name`) VALUES
(2, '2017-07-18 14:33:11', 46, 'Sticks in this hotel is too pricky!! Not Good', 3, 48, 'Sticks-And-Veggies', 'Annu11'),
(3, '2017-07-18 14:53:39', 46, 'detail comment by ANnu11', 3, 17, 'Dahi Puri', 'Annu11'),
(7, '2017-07-18 14:58:56', 46, 'rotten:- by annu-11', 1, 14, 'boiled egg', 'Annu11'),
(8, '2017-07-18 15:20:04', 46, 'why this has so complicated name!! Bachho k jan lega kya...', 2, 45, 'Mutton Sekuwa Hyperhaxle', 'Annu11'),
(9, '2017-07-18 15:20:49', 46, 'Okay this has got simpler name', 4, 2, 'Sekuwa', 'Annu11'),
(11, '2017-07-19 09:22:50', 46, 'comment by annu 11on veg shadeko special', 4, 46, 'Veggies Sadheko Special', 'Annu11'),
(12, '2017-07-19 16:38:35', 2, 'sur99 comment in Veg Special', 3, 46, 'Veggies Sadheko Special', 'Sur99'),
(13, '2017-07-19 17:38:00', 7, 'very unsatisfying...', 2, 46, 'Veggies Sadheko Special', 'Mmaster'),
(14, '2017-07-20 02:45:04', 1, 'Very Good veggies , real fresh veggiess! Loved it!', 3, 46, 'Veggies Sadheko Special', 'slicyRio'),
(15, '2017-07-20 07:09:47', 46, 'taaaaaaaaaaaaaaaaaaaaait!!! Je payo tehi rahexa yo roti tah!!!', 2, 52, 'Alu Nan  Parautha', 'Annu11'),
(18, '2017-07-20 07:15:11', 7, 'as good as in description', 3, 52, 'Alu Nan  Parautha', 'Mmaster'),
(20, '2017-07-20 16:21:00', 46, 'Crispy...So good! Best donought i ever had...', 4, 53, 'Chinese Yen Donought', 'Annu11'),
(21, '2017-07-20 16:21:54', 1, 'not as good as before', 4, 53, 'Chinese Yen Donought', 'slicyRio'),
(22, '2017-07-20 16:23:30', 2, 'Looks like Selroti but tastes much better! 5star rating by me..', 5, 53, 'Chinese Yen Donought', 'Sur99'),
(23, '2017-07-22 04:47:52', 57, 'swadistha pakwaaan', 3, 64, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
