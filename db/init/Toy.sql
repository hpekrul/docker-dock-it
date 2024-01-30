-- phpMyAdmin SQL Dump
-- version 5.1.4-dev+20220331.b9ddf0b305
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 30, 2024 at 02:08 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Toy`
--
ALTER TABLE `Toy`
  ADD PRIMARY KEY (`ToyID`),
  ADD KEY `BrandID` (`CategoryID`),
  ADD KEY `BrandID_2` (`BrandID`),
  ADD KEY `CreatedBy` (`CreatedBy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Toy`
--
ALTER TABLE `Toy`
  MODIFY `ToyID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
