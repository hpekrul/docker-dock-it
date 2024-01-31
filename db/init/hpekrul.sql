-- phpMyAdmin SQL Dump
-- version 5.1.4-dev+20220331.b9ddf0b305
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2024 at 02:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hpekrul`
--

-- --------------------------------------------------------

--
-- Table structure for table `authUsers`
--

CREATE TABLE `authUsers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `authUsers`
--

INSERT INTO `authUsers` (`id`, `email`, `password`, `role`) VALUES
(2, 'hpekrul@my.wctc.edu', '$2y$10$CDNoUW3TBTIvbcbwC/q2dOkkDLEqjNs/Zog0VCOwIbzn4lFP1Cxj6', 1),
(3, 'hollypekrul@yahoo.com', '$2y$10$i9p7qiUJ.Wh99lcwBy5Zv.Oh1PHku4uMQX/edk91U.03IwHhZhOAO', 2),
(5, 'hollyp@mwmarine.com', '$2y$10$jH1HRb0/BILnwJzI5l7aL.MBWiTLxkwTRFAqn7DpEth3pSr8foN7.', 2),
(6, 'hpekrul@gmail.com', '$2y$10$tel.MucNzaLho6ojvDrTk.ywpkqw2B6yEfJ1Ne1kd2F6k1zbGer1q', 2),
(7, 'tyler', '$2y$10$bMxHk4a7NQSa7gNHbxaX0OfuunJ5qyQxEMubkEItpHRx0eWYqmy9e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Brand`
--

CREATE TABLE `Brand` (
  `BrandID` int(11) UNSIGNED NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Brand`
--

INSERT INTO `Brand` (`BrandID`, `Name`) VALUES
(1, 'SmartyKat'),
(2, 'Boots & Barkley'),
(3, 'Quirky Kitty'),
(4, 'Jw Pet ');

-- --------------------------------------------------------

--
-- Table structure for table `Toy`
--

CREATE TABLE `Toy` (
  `ToyID` int(11) UNSIGNED NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `BrandID` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Rating` tinyint(3) UNSIGNED NOT NULL,
  `Review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Toy`
--

INSERT INTO `Toy` (`ToyID`, `CategoryID`, `BrandID`, `CreatedBy`, `Name`, `Description`, `Rating`, `Review`) VALUES
(1, 3, 1, 2, 'Window Wobbler suction cat toy', 'Suction to window or floor for a tempting toy.', 3, 'Can fall off window pretty easily. '),
(2, 1, 1, 2, 'Foam soccer fetch & play bouncy ball ', 'Bouncy, noise free and battery free foam soccer ball. ', 5, 'Cats love these. '),
(3, 1, 2, 2, 'Flutter Balls Feathery Cat Toy', 'Soft lightweight ball made with undyed feathers. ', 2, 'My cat does not play with these often. '),
(4, 2, 3, 2, 'Hot Pursuit Electronic Concealed Motion ', 'Mimics the motion of hidden pray. Can adjust to different speeds. ', 5, 'Fun toy to keep cat occupied!'),
(8, 14, 2, 2, 'Springs Multicolored Cat Toy - 10ct ', 'Made from PVC material ', 4, 'love these! '),
(9, 8, 2, 2, 'Tassel Wand Cat Toy', 'Interactive toy helps promote exercise and mental stimulation', 3, 'Sometimes not interested in this toy. '),
(14, 7, 2, 3, 'Cat tunnel', 'Gives your cat a place to hide, relax, or play. ', 5, 'My cat never gets tired of her tunnel '),
(16, 13, 2, 3, 'Wave Cat Scratcher', 'Corrugated cardboard scratching surfaces give your cat a place of their own to scratch.', 4, 'My cat loves to scratch this! ');

-- --------------------------------------------------------

--
-- Table structure for table `ToyCategory`
--

CREATE TABLE `ToyCategory` (
  `CategoryID` int(11) UNSIGNED NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ToyCategory`
--

INSERT INTO `ToyCategory` (`CategoryID`, `Name`) VALUES
(1, 'Balls'),
(2, 'Electronic'),
(3, 'Window toys'),
(4, 'Cat Tree\'s'),
(5, 'Scratcher\'s'),
(6, 'Mice'),
(7, 'Tunnels'),
(8, 'Wands '),
(9, 'Catnip Infused'),
(10, 'Multi-pack'),
(11, 'Cat beds'),
(12, 'Perches'),
(13, 'Cardboard '),
(14, 'Springs'),
(15, 'Stuffed animals'),
(16, 'Treat hider/puzzle'),
(17, 'Seasonal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Userid` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Userid`, `name`) VALUES
(1, 'user'),
(2, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authUsers`
--
ALTER TABLE `authUsers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING BTREE,
  ADD KEY `role` (`role`);

--
-- Indexes for table `Brand`
--
ALTER TABLE `Brand`
  ADD PRIMARY KEY (`BrandID`);

--
-- Indexes for table `Toy`
--
ALTER TABLE `Toy`
  ADD PRIMARY KEY (`ToyID`),
  ADD KEY `BrandID` (`CategoryID`),
  ADD KEY `BrandID_2` (`BrandID`),
  ADD KEY `CreatedBy` (`CreatedBy`);

--
-- Indexes for table `ToyCategory`
--
ALTER TABLE `ToyCategory`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authUsers`
--
ALTER TABLE `authUsers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Brand`
--
ALTER TABLE `Brand`
  MODIFY `BrandID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Toy`
--
ALTER TABLE `Toy`
  MODIFY `ToyID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ToyCategory`
--
ALTER TABLE `ToyCategory`
  MODIFY `CategoryID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Userid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
