-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2023 at 12:03 PM
-- Server version: 5.6.38
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Delicaseas`
--

-- --------------------------------------------------------

--
-- Table structure for table `cardtable`
--

CREATE TABLE `cardtable` (
  `id` int(20) NOT NULL,
  `foodimg` varchar(255) NOT NULL,
  `foodtitle` varchar(255) NOT NULL,
  `foodprice` int(20) NOT NULL,
  `foodinfo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cardtable`
--

INSERT INTO `cardtable` (`id`, `foodimg`, `foodtitle`, `foodprice`, `foodinfo`) VALUES
(1, 'Img/Tuna-kebab.jpg', 'Tuna kebab', 300, 'Tuna kebab a healthy dish and it is made of tuna'),
(2, 'Img/Sushi-with-Tea.jpg', 'Suchi with Tea', 400, 'A relaxing combination of different types of sushi is comboed with Tea'),
(26, 'Img/Skewered-Squid-and-Shrimp.jpg', 'Squid Barbecue and shrimp', 400, 'Combination of Squid and Shrimp is smoked while cooking with apple wood '),
(25, 'Img/Shrimp-seaweed-combo.jpg', 'Shrimp seaweed Combo', 300, 'Seaweed combo with shrimp is healthy and is melting in your mouth while eating'),
(31, 'Img/20230402_130459.jpg', 'Seashells with coconut milk', 340, 'Seashells fresh from the farm cooked with coconut milk and simmer it for at least 30mins with other preffered ingredients'),
(30, 'Img/20230402_130438.jpg', 'Grilled Octopus', 550, 'Octopus grilled and smoked slowly until it is tenderized combined with sauce'),
(32, 'Img/20230402_130520.jpg', 'Ramen ', 350, 'Ramen a Japanese style noodles and is famous because of being featured in many movies and anime'),
(33, 'Img/pexels-lachlan-ross-6510289.jpg', 'Fresh Clams', 440, 'Fresh clams with lemons and is served with ice to maintain its freshness');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `profile` varchar(255) NOT NULL DEFAULT 'Img/noimg.png',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `last_activity` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profile`, `username`, `password`, `email`, `address`, `type`, `last_activity`) VALUES
(6, 'Img/Screenshot_20230507-221337_Samsung Experience Home.jpg', 'Redball', '123', 'blasredball@gmail.com', 'san juan', 0, '2023-05-07 13:02:43'),
(16, 'Img/noimg.png', 'Ivan', '123', 'ivanjustinblas@gmail.com', 'Buliran', 1, '2023-04-02 10:23:46'),
(23, 'Img/noimg.png', 'Akuito', '123', 'aku@gmail.com', 'Hangangsaan', 1, '2023-04-02 12:40:35'),
(22, 'Img/noimg.png', 'Orbit', '123', 'hdhd@gmail.com', 'Awitizehaws', 0, '2023-04-15 10:51:59'),
(20, 'Img/noimg.png', 'kuno', '321', 'kuno@gmail.com', 'tagakuno', 1, '2023-04-02 10:57:14'),
(24, 'Img/noimg.png', 'Kyle', '111', 'hdhd@gama', 'Sjsjsus', 1, '2023-04-03 08:17:08'),
(25, 'Img/noimg.png', 'nicko', '123', 'keni@gmail.sample', 'siojo street', 1, '2023-04-15 10:01:20'),
(26, 'Img/noimg.png', 'ak', '123', '47@gmail.com', 'gfgffggf', 1, '2023-04-15 10:28:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cardtable`
--
ALTER TABLE `cardtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cardtable`
--
ALTER TABLE `cardtable`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;