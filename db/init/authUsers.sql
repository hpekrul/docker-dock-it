-- phpMyAdmin SQL Dump
-- version 5.1.4-dev+20220331.b9ddf0b305
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 30, 2024 at 01:57 PM
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authUsers`
--
ALTER TABLE `authUsers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
