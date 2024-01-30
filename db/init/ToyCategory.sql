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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ToyCategory`
--
ALTER TABLE `ToyCategory`
  ADD PRIMARY KEY (`CategoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ToyCategory`
--
ALTER TABLE `ToyCategory`
  MODIFY `CategoryID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
