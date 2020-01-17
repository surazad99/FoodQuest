-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2017 at 09:49 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food quest`
--

-- --------------------------------------------------------

--
-- Table structure for table `consumer`
--

CREATE TABLE `consumer` (
  `First_Name` text NOT NULL,
  `Last_Name` text NOT NULL,
  `User_Id` int(20) NOT NULL,
  `User_Name` varchar(20) NOT NULL,
  `User_Type` int(1) NOT NULL,
  `Email` varchar(11) NOT NULL,
  `Password` varchar(101) NOT NULL,
  `Phone_Number` int(15) NOT NULL,
  `Latitude` double NOT NULL,
  `Longitude` varchar(50) NOT NULL,
  `Hotel_Name` varchar(50) NOT NULL,
  `Hotel_Number` int(15) NOT NULL,
  `Hotel_Address` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumer`
--

INSERT INTO `consumer` (`First_Name`, `Last_Name`, `User_Id`, `User_Name`, `User_Type`, `Email`, `Password`, `Phone_Number`, `Latitude`, `Longitude`, `Hotel_Name`, `Hotel_Number`, `Hotel_Address`) VALUES
('Slice', 'Rio', 1, 'slicyRio', 0, 'RIo@slicy.c', '123', 0, 0, '', '', 0, 0),
('Suraj', 'Adhikari', 2, 'Sur99', 0, 'sur@bhauju.', '123', 0, 0, '', '', 0, 0),
('Mohit', 'Dhungana', 6, 'Mohit07', 1, 'Mohit99@yah', '123', 0, 0, '', '', 0, 0),
('master', 'mind', 7, 'Mmaster', 0, 'masteria@bu', '123', 0, 0, '', '', 0, 0),
('Sajita', 'Adhikari', 11, 'Sajj89', 1, 'sajju@gmail', '123', 0, 0, '', '', 0, 0),
('surya ', 'Bhushal', 32, 'surr99', 0, 'Surya@gmail', '123', 2147483647, 0, '', '', 0, 0),
('Suraj', 'Adhikari', 33, 'Surazad99', 2, 'suraz.ad99@', '321', 2147483647, 0, '', '', 0, 0),
('Pratik', 'Mishra', 39, 'Chicken', 1, 'chicken72@p', '123', 999999999, 0, '', '', 0, 0),
('Subin', 'Panth', 40, 'Soldai', 1, 'soldai@yoho', '123', 2147483647, 0, '', '', 0, 0),
('sdf', 'dsfds', 41, 'sdfds', 1, 'sdfsdf@', '123', 123, 0, '', '', 0, 0),
('Subin', 'panta', 45, 'rar', 1, 'usubdsudb@g', '123', 2147483647, 0, '', '', 0, 0),
('Anup', 'Neupane', 46, 'Annu11', 0, 'illusion.kr', '123', 2147483647, 0, '', '', 0, 0),
('Asmita', 'Rayamajhi', 47, 'AsuRay', 1, 'Asu_susu@ya', '123', 2147483647, 0, 'Mal Pokhari', 'Asmita Khaja Ghar', 1543274, 0),
('Ramesh', 'Malasi', 48, 'Ramesh123', 1, '@sfs', '123', 980237583, 27.6966, '85.311951', 'Kwality Food Cafe', 124356, 0);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Food_Id` int(10) NOT NULL,
  `Food_Name` varchar(100) NOT NULL,
  `Food_Price` float NOT NULL,
  `Food_Image` varchar(200) NOT NULL,
  `Food_Description` varchar(400) NOT NULL,
  `Food_Rating` float NOT NULL,
  `Uploaded_By` int(20) NOT NULL,
  `Uploaded_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Food_Id`, `Food_Name`, `Food_Price`, `Food_Image`, `Food_Description`, `Food_Rating`, `Uploaded_By`, `Uploaded_Time`) VALUES
(1, 'Mochachino Cofee', 230, 'images/Mochachino Cofee.jpg', 'Just good enough to make you here back once again', 4, 39, '0000-00-00 00:00:00'),
(2, 'Sekuwa', 100, 'images/Sekuwa.jpg', 'asdfasdfgasdfasdfasdag', 3.5, 39, '0000-00-00 00:00:00'),
(3, 'Veg Pakauda', 25, 'images/Veg Pakauda.jpg', 'World Famous pakauda in Kathford canteen', 5, 39, '0000-00-00 00:00:00'),
(4, 'Paneer Chilly', 123, 'images/Paneer Chilly.jpg', 'The chilly you have never eaten', 2.8, 39, '0000-00-00 00:00:00'),
(5, 'French Fries', 234, 'images/French Fries.jpg', 'The best item from the Tashi Delek Restaurant and Bar', 3.7, 39, '0000-00-00 00:00:00'),
(6, 'Tuborg Beer', 300, 'images/Tuborg Beer.jpg', 'Chilled beer ', 4.3, 39, '0000-00-00 00:00:00'),
(9, 'Idli', 123, 'images/asfdsdf.jpg', 'kera ko paat ko special', 1.9, 39, '0000-00-00 00:00:00'),
(10, 'Real Mango juice', 30, 'images/Real Mango juice.jpg', 'Fat free and low in cholestrol so best for Soldais Health', 4.2, 40, '0000-00-00 00:00:00'),
(11, 'Boiled Chicken', 333, 'images/Boiled Chicken.jpg', 'Best for Soldai ', 3.7, 40, '0000-00-00 00:00:00'),
(12, 'Samosa', 45, 'images/Samosa.jpg', 'less fat high energy', 4.6, 39, '0000-00-00 00:00:00'),
(14, 'boiled egg', 20, 'images/boiled egg.jpg', 'mitho ra healthy', 0, 40, '0000-00-00 00:00:00'),
(15, 'subin special', 999999, 'images/subin special.jpg', 'best in argentina', 4.125, 45, '0000-00-00 00:00:00'),
(16, 'Kakani Trout', 453, 'images/Kakani Trout.jpg', 'Taja taja pokhari baata nikalera banaeeko...', 0, 40, '0000-00-00 00:00:00'),
(17, 'Dahi Puri', 50, 'images/Dahi Puri.jpg', 'best in kusunti', 0, 39, '0000-00-00 00:00:00'),
(18, 'Tuborg Beer', 332, 'images/Tuborg Beer.jpg', 'Tuborg is the best in valley', 0, 40, '0000-00-00 00:00:00'),
(19, 'dfsd', 232, '', 'kjhjhkjhkj', 0, 45, '0000-00-00 00:00:00'),
(20, 'jhghjgjh', 23, '', 'jhgjhg', 0, 45, '0000-00-00 00:00:00'),
(22, 'rarCake', 12, '', 'sddsfs', 0, 45, '2017-07-10 09:16:56'),
(24, 'haha My Boy', 123, '', 'sfsdfs', 0, 45, '2017-07-10 09:18:28'),
(26, 'Chautari Mya', 4, '', 'dasdasdasd', 0, 45, '2017-07-10 09:21:23'),
(27, 'testing the image', 123, '', 'sdfgsdfssd', 0, 45, '2017-07-10 09:27:02'),
(28, 'testing the image', 123, '', 'sdfgsdfssd', 0, 45, '2017-07-10 09:27:27'),
(29, 'testing the image', 123, 'images/testing the image1499692374.jpg', 'sdfgsdfssd', 0, 45, '2017-07-10 09:27:54'),
(30, 'lolImage', 542, 'images/lolImage1499692759.jpg', 'slodai says Unhealthy stuff', 0, 45, '2017-07-10 09:34:19'),
(31, 'Jagadamba', 452, 'images/Jagadamba1499692953.jpg', 'dfsfdffd', 0, 45, '2017-07-10 09:37:33'),
(32, 'Khaja Set', 342, 'images/Khaja Set1499693027.jpg', 'sdfsdf', 0, 45, '2017-07-10 09:38:47'),
(33, 'Khaja Set', 653, 'images/Khaja Set1499693078.jpg', 'sfsdfs', 0, 45, '2017-07-10 09:39:38'),
(34, 'Khaja Set', 421, 'images/Khaja Set1499693775.jpg', 'Just good enough to make you here back once again', 0, 39, '2017-07-10 09:51:15'),
(35, 'Khaja Set', 439, 'images/Khaja Set1499693865.jpg', 'hihi haha ', 0, 40, '2017-07-10 09:52:45'),
(36, 'choila', 124, 'images/choila1499694231.jpg', 'aaded by subin soldai', 0, 40, '2017-07-10 09:58:51'),
(37, 'choila', 0, 'images/choila1499694277.jpg', 'pok choila by chicken', 0, 39, '2017-07-10 09:59:37'),
(38, 'choila', 54, 'images/choila1499694316.jpg', 'by rar', 0, 45, '2017-07-10 10:00:16'),
(39, 'Tuborg Beer', 435, 'images/Tuborg Beer1499710797.jpg', 'chilled beer uploaded by rar ', 0, 45, '2017-07-10 14:34:57'),
(40, 'Tuborg Beer', 221, 'images/Tuborg Beer1499710948.jpg', 'chicken flavour', 0, 39, '2017-07-10 14:37:28'),
(41, 'Tuborg Beer', 435, 'images/Tuborg Beer1499711147.jpg', 'soldai ko health, Global Warming vanda pani importaant isuue ho', 0, 40, '2017-07-10 14:40:47'),
(42, 'Holzin Glazed Salmon', 341, 'images/Holzin Glazed Salmon1499728106.jpg', 'available at uiuiuiu hotel', 0, 11, '2017-07-10 19:23:26'),
(43, 'Pacific Lobster', 324, 'images/Pacific Lobster1499728197.jpg', 'directly from the bottom of pacific ocean', 0, 11, '2017-07-10 19:24:57'),
(44, 'master burger Ham', 324, 'images/master burger Ham1499728947.jpg', 'sdfsdfsdf dsfsdf', 0, 11, '2017-07-10 19:37:27'),
(45, 'Mutton Sekuwa Hyperhaxle', 234, 'images/Mutton Sekuwa Hyperhaxle1499729172.jpg', 'directly from the bottom of pacific ocean', 0, 11, '2017-07-10 19:41:12'),
(46, 'Veggies Sadheko Special', 286, 'images/Veggies Sadheko Special1499759212.jpg', 'Made from all the fresh vegetables available', 0, 45, '2017-07-11 04:01:52'),
(47, 'Veg Buger', 326, 'images/Veg Buger1499759654.jpg', 'You can not imagine a Veg Burger more tastier', 0, 11, '2017-07-11 04:09:14'),
(48, 'Sticks-And-Veggies', 121, 'images/Sticks-And-Veggies1499759905.jpg', 'all in a single stick for our soldai', 0, 40, '2017-07-11 04:13:25'),
(49, 'Cheese Pizza ', 212, 'images/Cheese Pizza 1499808773.jpg', 'available in both 12 inch and 9 inch size', 0, 39, '2017-07-11 17:47:53'),
(50, 'chicken lolipop', 23, 'images/chicken lolipop1499945997.jpg', 'jkhfdsjs', 0, 39, '2017-07-13 07:54:57'),
(51, 'Sizzler', 350, 'images/Sizzler1500407905.jpg', 'khai kasto ho you dish, youtube mai hernu parxa yaar', 0, 47, '2017-07-18 16:13:25'),
(52, 'Alu Nan  Parautha', 90, 'images/Alu Nan  Parautha1500547901.jpg', 'Alu badhi phitho kum...Chillo Besi Paisa Kum..chapaunu hos cham cham', 0, 40, '2017-07-20 07:06:41'),
(53, 'Chinese Yen Donought', 46, 'images/Chinese Yen Donought1500580813.jpg', 'food with hole', 0, 48, '2017-07-20 16:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `trust_level`
--

CREATE TABLE `trust_level` (
  `Review_Id` int(5) NOT NULL,
  `Uplodaded_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Uploaded_By` int(11) NOT NULL,
  `Review` text NOT NULL,
  `Rating` float NOT NULL DEFAULT '2',
  `Food_Id` int(5) NOT NULL,
  `Food_Name` varchar(50) NOT NULL,
  `User_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(22, '2017-07-20 16:23:30', 2, 'Looks like Selroti but tastes much better! 5star rating by me..', 5, 53, 'Chinese Yen Donought', 'Sur99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consumer`
--
ALTER TABLE `consumer`
  ADD PRIMARY KEY (`User_Id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`Food_Id`),
  ADD UNIQUE KEY `Food_Id` (`Food_Id`);

--
-- Indexes for table `trust_level`
--
ALTER TABLE `trust_level`
  ADD PRIMARY KEY (`Review_Id`),
  ADD UNIQUE KEY `Review_Id` (`Review_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consumer`
--
ALTER TABLE `consumer`
  MODIFY `User_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `Food_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `trust_level`
--
ALTER TABLE `trust_level`
  MODIFY `Review_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
