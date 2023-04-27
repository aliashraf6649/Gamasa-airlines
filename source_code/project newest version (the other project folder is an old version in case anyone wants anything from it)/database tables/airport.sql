-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 03:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `um`
--

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `airport_id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `airport_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`airport_id`, `country`, `airport_name`) VALUES
(1, 'Netherlands', 'Amsterdam Airport Schiphol - Netherlands'),
(2, 'United Arab Emirates', 'Dubai International Airport - United Arab Emirates'),
(3, 'United States', 'Hartsfield–Jackson Atlanta International Airport - United States'),
(4, 'Turkey', 'Istanbul Airport - Turkey'),
(5, 'Egypt', 'Cairo International Airport - Egypt'),
(6, 'Saudi Arabia', 'King Khalid International Airport - Saudi Arabia'),
(7, 'Portugal', 'Humberto Delgado Airport - Portugal'),
(8, 'Spain', 'Adolfo Suárez Madrid–Barajas Airport - Spain'),
(9, 'Peru', 'Jorge Chávez International Airport - Peru'),
(10, 'India', 'Indira Gandhi International Airport - India'),
(11, 'Australia', 'Sydney Kingsford Smith Airport - Australia'),
(12, 'New Zealand', 'Auckland Airport - New Zealand');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`airport_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `airport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
