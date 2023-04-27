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
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `departing_country` varchar(255) NOT NULL,
  `from_airport` varchar(255) NOT NULL,
  `destination_country` varchar(255) NOT NULL,
  `to_airport` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp(),
  `trip-id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`departing_country`, `from_airport`, `destination_country`, `to_airport`, `date`, `time`, `trip-id`, `price`) VALUES
('Netherlands', 'Amsterdam Airport Schiphol', 'United Arab Emirates', 'Dubai International Airport', '2023-05-17', '12:22:16', 1000, 2300),
('Netherlands', 'Amsterdam Airport Schiphol', 'United States', 'Hartsfield–Jackson Atlanta International Airport', '2023-05-24', '12:22:16', 1020, 2100),
('Netherlands', 'Amsterdam Airport Schiphol', 'Turkey', 'Istanbul Airport', '2023-05-20', '12:22:16', 1021, 1700),
('Netherlands', 'Amsterdam Airport Schiphol', 'Spain', 'Adolfo Suárez Madrid–Barajas Airport', '2023-05-24', '12:22:16', 1022, 1600),
('Netherlands', 'Amsterdam Airport Schiphol', 'India', 'Indira Gandhi International Airport', '2023-05-18', '12:22:16', 1023, 1700),
('Netherlands', 'Amsterdam Airport Schiphol', 'New Zealand', 'Auckland Airport', '2023-05-23', '12:22:16', 1024, 1500),
('Netherlands', 'Amsterdam Airport Schiphol', 'Saudi Arabia', 'King Khalid International Airport', '2023-05-21', '12:22:16', 1025, 2100),
('Netherlands', 'Amsterdam Airport Schiphol', 'Peru', 'Jorge Chávez International Airport', '2023-05-29', '12:22:16', 1026, 2100),
('Netherlands', 'Amsterdam Airport Schiphol', 'Australia', 'Sydney Kingsford Smith Airport', '2023-04-26', '12:22:16', 1027, 1700),
('Netherlands', 'Amsterdam Airport Schiphol', 'Portugal', 'Humberto Delgado Airport', '2023-05-26', '12:22:16', 1028, 2000),
('Netherlands', 'Amsterdam Airport Schiphol', 'Egypt', 'Cairo International Airport', '2023-05-21', '12:22:16', 1029, 2200),
('United Arab Emirates', 'Dubai International Airport', 'Netherlands', 'Amsterdam Airport Schiphol', '2023-05-19', '12:22:16', 1030, 2500),
('United Arab Emirates', 'Dubai International Airport', 'United States', 'Hartsfield–Jackson Atlanta International Airport', '2023-05-20', '12:22:16', 1031, 1700),
('United Arab Emirates', 'Dubai International Airport', 'Turkey', 'Istanbul Airport', '2023-05-29', '12:22:16', 1032, 1900),
('United Arab Emirates', 'Dubai International Airport', 'Spain', 'Adolfo Suárez Madrid–Barajas Airport', '2023-05-25', '12:22:16', 1033, 2100),
('United Arab Emirates', 'Dubai International Airport', 'India', 'Indira Gandhi International Airport', '2023-05-25', '12:22:16', 1034, 1500),
('United Arab Emirates', 'Dubai International Airport', 'New Zealand', 'Auckland Airport', '2023-05-19', '12:22:16', 1035, 1900),
('United Arab Emirates', 'Dubai International Airport', 'Saudi Arabia', 'King Khalid International Airport', '2023-05-27', '12:22:16', 1036, 1900),
('United Arab Emirates', 'Dubai International Airport', 'Peru', 'Jorge Chávez International Airport', '2023-05-20', '12:22:16', 1037, 2100),
('United Arab Emirates', 'Dubai International Airport', 'Australia', 'Sydney Kingsford Smith Airport', '2023-05-23', '12:22:16', 1038, 1700),
('United Arab Emirates', 'Dubai International Airport', 'Portugal', 'Humberto Delgado Airport', '2023-05-26', '12:22:16', 1039, 1500),
('United Arab Emirates', 'Dubai International Airport', 'Egypt', 'Cairo International Airport', '2023-05-27', '12:22:16', 1040, 1300),
('United States', 'Hartsfield–Jackson Atlanta International Airport', 'Netherlands', 'Amsterdam Airport Schiphol', '2023-05-20', '12:22:16', 1041, 1600),
('United States', 'Hartsfield–Jackson Atlanta International Airport', 'United Arab Emirates', 'Dubai International Airport', '2023-05-20', '12:22:16', 1042, 1700),
('United States', 'Hartsfield–Jackson Atlanta International Airport', 'Turkey', 'Istanbul Airport', '2023-04-26', '12:22:16', 1043, 1800),
('United States', 'Hartsfield–Jackson Atlanta International Airport', 'Spain', 'Adolfo Suárez Madrid–Barajas Airport', '2023-05-27', '12:22:16', 1044, 1800),
('United States', 'Hartsfield–Jackson Atlanta International Airport', 'India', 'Indira Gandhi International Airport', '2023-04-26', '12:22:16', 1045, 1900),
('United States', 'Hartsfield–Jackson Atlanta International Airport', 'New Zealand', 'Auckland Airport', '2023-05-19', '12:22:16', 1046, 1400),
('United States', 'Hartsfield–Jackson Atlanta International Airport', 'Saudi Arabia', 'King Khalid International Airport', '2023-05-23', '12:22:16', 1047, 1500),
('United States', 'Hartsfield–Jackson Atlanta International Airport', 'Peru', 'Jorge Chávez International Airport', '2023-05-23', '12:22:16', 1048, 1700),
('United States', 'Hartsfield–Jackson Atlanta International Airport', 'Australia', 'Sydney Kingsford Smith Airport', '2023-05-22', '12:22:16', 1049, 1800),
('United States', 'Hartsfield–Jackson Atlanta International Airport', 'Portugal', 'Humberto Delgado Airport', '2023-05-17', '12:22:16', 1050, 1300),
('United States', 'Hartsfield–Jackson Atlanta International Airport', 'Egypt', 'Cairo International Airport', '2023-04-18', '12:22:16', 1051, 1600),
('Turkey', 'Istanbul Airport', 'Netherlands', 'Amsterdam Airport Schiphol', '2023-05-18', '12:22:16', 1052, 1200),
('Turkey', 'Istanbul Airport', 'United Arab Emirates', 'Dubai International Airport', '2023-05-30', '12:22:16', 1053, 1800),
('Turkey', 'Istanbul Airport', 'United States', 'Hartsfield–Jackson Atlanta International Airport', '2023-05-22', '12:22:16', 1054, 1900),
('Turkey', 'Istanbul Airport', 'Spain', 'Adolfo Suárez Madrid–Barajas Airport', '2023-05-20', '12:22:16', 1055, 1700),
('Turkey', 'Istanbul Airport', 'India', 'Indira Gandhi International Airport', '2023-05-25', '12:22:16', 1056, 1800),
('Turkey', 'Istanbul Airport', 'New Zealand', 'Auckland Airport', '2023-05-25', '12:22:16', 1057, 1600),
('Turkey', 'Istanbul Airport', 'Saudi Arabia', 'King Khalid International Airport', '2023-05-27', '12:22:16', 1058, 1800),
('Turkey', 'Istanbul Airport', 'Peru', 'Jorge Chávez International Airport', '2023-05-20', '12:22:16', 1059, 1700),
('Turkey', 'Istanbul Airport', 'Australia', 'Sydney Kingsford Smith Airport', '2023-05-25', '12:22:16', 1060, 1800),
('Turkey', 'Istanbul Airport', 'Portugal', 'Humberto Delgado Airport', '2023-05-22', '12:22:16', 1061, 1700),
('Turkey', 'Istanbul Airport', 'Egypt', 'Cairo International Airport', '2023-05-20', '12:22:16', 1062, 1900),
('Spain', 'Adolfo Suárez Madrid–Barajas Airport', 'Netherlands', 'Amsterdam Airport Schiphol', '2023-05-22', '12:22:16', 1063, 1900),
('Spain', 'Adolfo Suárez Madrid–Barajas Airport', 'United Arab Emirates', 'Dubai International Airport', '2023-05-31', '12:22:16', 1064, 1900),
('Spain', 'Adolfo Suárez Madrid–Barajas Airport', 'United States', 'Hartsfield–Jackson Atlanta International Airport', '2023-05-21', '12:22:16', 1065, 1900),
('Spain', 'Adolfo Suárez Madrid–Barajas Airport', 'Turkey', 'Istanbul Airport', '2023-05-26', '12:22:16', 1066, 1900),
('Spain', 'Adolfo Suárez Madrid–Barajas Airport', 'India', 'Indira Gandhi International Airport', '2023-05-17', '12:22:16', 1067, 1900),
('Spain', 'Adolfo Suárez Madrid–Barajas Airport', 'New Zealand', 'Auckland Airport', '2023-05-20', '12:22:16', 1068, 1900),
('Spain', 'Adolfo Suárez Madrid–Barajas Airport', 'Saudi Arabia', 'King Khalid International Airport', '2023-05-14', '12:22:16', 1069, 1900),
('Spain', 'Adolfo Suárez Madrid–Barajas Airport', 'Peru', 'Jorge Chávez International Airport', '2023-05-18', '12:22:16', 1070, 1900),
('Spain', 'Adolfo Suárez Madrid–Barajas Airport', 'Australia', 'Sydney Kingsford Smith Airport', '2023-05-14', '12:22:16', 1071, 1900),
('Spain', 'Adolfo Suárez Madrid–Barajas Airport', 'Portugal', 'Humberto Delgado Airport', '2023-05-20', '12:22:16', 1072, 1900),
('Spain', 'Adolfo Suárez Madrid–Barajas Airport', 'Egypt', 'Cairo International Airport', '2023-05-17', '12:22:16', 1073, 1900),
('India', 'Indira Gandhi International Airport', 'Netherlands', 'Amsterdam Airport Schiphol', '2023-05-23', '12:22:16', 1074, 1900),
('Netherlands', 'Hartsfield–Jackson Atlanta International Airport', 'United States', 'Amsterdam Airport Schiphol', '2023-04-28', '00:12:00', 1111, 500),
('India', 'Indira Gandhi International Airport', 'United Arab Emirates', 'Dubai International Airport', '2023-05-22', '12:22:16', 10669, 1900),
('India', 'Indira Gandhi International Airport', 'United States', 'Hartsfield–Jackson Atlanta International Airport', '2023-05-15', '12:22:16', 10670, 1900),
('India', 'Indira Gandhi International Airport', 'Turkey', 'Istanbul Airport', '2023-05-20', '12:22:16', 10671, 1900),
('India', 'Indira Gandhi International Airport', 'Spain', 'Adolfo Suárez Madrid–Barajas Airport', '2023-05-21', '12:22:16', 10672, 1900),
('India', 'Indira Gandhi International Airport', 'New Zealand', 'Auckland Airport', '2023-05-22', '12:22:16', 10673, 1900),
('India', 'Indira Gandhi International Airport', 'Saudi Arabia', 'King Khalid International Airport', '2023-05-20', '12:22:16', 10674, 1900),
('India', 'Indira Gandhi International Airport', 'Peru', 'Jorge Chávez International Airport', '2023-05-14', '12:22:16', 10675, 1900),
('India', 'Indira Gandhi International Airport', 'Australia', 'Sydney Kingsford Smith Airport', '2023-05-19', '12:22:16', 10676, 1900),
('India', 'Indira Gandhi International Airport', 'Portugal', 'Humberto Delgado Airport', '2023-05-14', '12:22:16', 10677, 1900),
('India', 'Indira Gandhi International Airport', 'Egypt', 'Cairo International Airport', '2023-05-17', '12:22:16', 10678, 1900),
('New Zealand', 'Auckland Airport', 'Netherlands', 'Amsterdam Airport Schiphol', '2023-04-22', '12:22:16', 10679, 1900),
('New Zealand', 'Auckland Airport', 'United Arab Emirates', 'Dubai International Airport', '2023-05-31', '12:22:16', 10680, 1900),
('New Zealand', 'Auckland Airport', 'United States', 'Hartsfield–Jackson Atlanta International Airport', '2023-05-21', '12:22:16', 10681, 1900),
('New Zealand', 'Auckland Airport', 'Turkey', 'Istanbul Airport', '2023-05-20', '12:22:16', 10682, 1900),
('New Zealand', 'Auckland Airport', 'Spain', 'Adolfo Suárez Madrid–Barajas Airport', '2023-05-15', '12:22:16', 10683, 1900),
('New Zealand', 'Auckland Airport', 'India', 'Indira Gandhi International Airport', '2023-05-11', '12:22:16', 10684, 1900),
('New Zealand', 'Auckland Airport', 'Saudi Arabia', 'King Khalid International Airport', '2023-05-16', '12:22:16', 10685, 1900),
('New Zealand', 'Auckland Airport', 'Peru', 'Jorge Chávez International Airport', '2023-05-14', '12:22:16', 10686, 1900),
('New Zealand', 'Auckland Airport', 'Australia', 'Sydney Kingsford Smith Airport', '2023-05-20', '12:22:16', 10687, 1900),
('New Zealand', 'Auckland Airport', 'Portugal', 'Humberto Delgado Airport', '2023-05-21', '12:22:16', 10688, 1900),
('New Zealand', 'Auckland Airport', 'Egypt', 'Cairo International Airport', '2023-05-19', '12:22:16', 10689, 1900),
('Saudi Arabia', 'King Khalid International Airport', 'Netherlands', 'Amsterdam Airport Schiphol', '2023-05-19', '12:22:16', 10690, 1900),
('Saudi Arabia', 'King Khalid International Airport', 'United Arab Emirates', 'Dubai International Airport', '2023-05-22', '12:22:16', 10691, 1900),
('Saudi Arabia', 'King Khalid International Airport', 'United States', 'Hartsfield–Jackson Atlanta International Airport', '2023-05-20', '12:22:16', 10692, 1900),
('Saudi Arabia', 'King Khalid International Airport', 'Turkey', 'Istanbul Airport', '2023-04-23', '12:22:16', 10693, 1900),
('Saudi Arabia', 'King Khalid International Airport', 'Spain', 'Adolfo Suárez Madrid–Barajas Airport', '2023-05-16', '12:22:16', 10694, 1900),
('Saudi Arabia', 'King Khalid International Airport', 'India', 'Indira Gandhi International Airport', '2023-05-21', '12:22:16', 10695, 1900),
('Saudi Arabia', 'King Khalid International Airport', 'New Zealand', 'Auckland Airport', '2023-05-13', '12:22:16', 10696, 1900),
('Saudi Arabia', 'King Khalid International Airport', 'Peru', 'Jorge Chávez International Airport', '2023-04-12', '12:22:16', 10697, 1900),
('Saudi Arabia', 'King Khalid International Airport', 'Australia', 'Sydney Kingsford Smith Airport', '2023-05-17', '12:22:16', 10698, 1900),
('Saudi Arabia', 'King Khalid International Airport', 'Portugal', 'Humberto Delgado Airport', '2023-04-18', '12:22:16', 10699, 1900),
('Saudi Arabia', 'King Khalid International Airport', 'Egypt', 'Cairo International Airport', '2023-04-28', '12:22:16', 10700, 1900),
('Peru', 'Jorge Chávez International Airport', 'Netherlands', 'Amsterdam Airport Schiphol', '2023-05-21', '12:22:16', 10701, 1900),
('Peru', 'Jorge Chávez International Airport', 'United Arab Emirates', 'Dubai International Airport', '2023-05-15', '12:22:16', 10702, 1900),
('Peru', 'Jorge Chávez International Airport', 'United States', 'Hartsfield–Jackson Atlanta International Airport', '2023-05-20', '12:22:16', 10703, 1900),
('Peru', 'Jorge Chávez International Airport', 'Turkey', 'Istanbul Airport', '2023-05-12', '12:22:16', 10704, 1900),
('Peru', 'Jorge Chávez International Airport', 'Spain', 'Adolfo Suárez Madrid–Barajas Airport', '2023-05-19', '12:22:16', 10705, 1900),
('Peru', 'Jorge Chávez International Airport', 'India', 'Indira Gandhi International Airport', '2023-05-14', '12:22:16', 10706, 1900),
('Peru', 'Jorge Chávez International Airport', 'New Zealand', 'Auckland Airport', '2023-05-25', '12:22:16', 10707, 1900),
('Peru', 'Jorge Chávez International Airport', 'Saudi Arabia', 'King Khalid International Airport', '2023-05-22', '12:22:16', 10708, 1900),
('Peru', 'Jorge Chávez International Airport', 'Peru', 'Jorge Chávez International Airport', '2023-05-20', '12:22:16', 10709, 1900),
('Peru', 'Jorge Chávez International Airport', 'Australia', 'Sydney Kingsford Smith Airport', '2023-05-26', '12:22:16', 10710, 1900),
('Peru', 'Jorge Chávez International Airport', 'Portugal', 'Humberto Delgado Airport', '2023-05-27', '12:22:16', 10711, 1900),
('Australia', 'Sydney Kingsford Smith Airport', 'Netherlands', 'Amsterdam Airport Schiphol', '2023-05-20', '12:22:16', 10712, 1900),
('Australia', 'Sydney Kingsford Smith Airport', 'United Arab Emirates', 'Dubai International Airport', '2023-05-16', '12:22:16', 10713, 1900),
('Australia', 'Sydney Kingsford Smith Airport', 'United States', 'Hartsfield–Jackson Atlanta International Airport', '2023-05-13', '12:22:16', 10714, 1900),
('Australia', 'Sydney Kingsford Smith Airport', 'Turkey', 'Istanbul Airport', '2023-05-15', '12:22:16', 10715, 1900),
('Australia', 'Sydney Kingsford Smith Airport', 'Spain', 'Adolfo Suárez Madrid–Barajas Airport', '2023-05-15', '12:22:16', 10716, 1900),
('Australia', 'Sydney Kingsford Smith Airport', 'India', 'Indira Gandhi International Airport', '2023-05-13', '12:22:16', 10717, 1900),
('Australia', 'Sydney Kingsford Smith Airport', 'New Zealand', 'Auckland Airport', '2023-05-29', '12:22:16', 10718, 1900),
('Australia', 'Sydney Kingsford Smith Airport', 'Saudi Arabia', 'King Khalid International Airport', '2023-05-13', '12:22:16', 10719, 1900),
('Australia', 'Sydney Kingsford Smith Airport', 'Peru', 'Jorge Chávez International Airport', '2023-05-23', '12:22:16', 10720, 1900),
('Australia', 'Sydney Kingsford Smith Airport', 'Portugal', 'Humberto Delgado Airport', '2023-05-14', '12:22:16', 10721, 1900),
('Australia', 'Sydney Kingsford Smith Airport', 'Egypt', 'Cairo International Airport', '2023-05-11', '12:22:16', 10722, 1900),
('Portugal', 'Humberto Delgado Airport', 'Netherlands', 'Amsterdam Airport Schiphol', '2023-05-25', '12:22:16', 10723, 1900),
('Portugal', 'Humberto Delgado Airport', 'United Arab Emirates', 'Dubai International Airport', '2023-05-18', '12:22:16', 10724, 1900),
('Portugal', 'Humberto Delgado Airport', 'United States', 'Hartsfield–Jackson Atlanta International Airport', '2023-05-21', '12:22:16', 10725, 1900),
('Portugal', 'Humberto Delgado Airport', 'Turkey', 'Istanbul Airport', '2023-05-21', '12:22:16', 10726, 1900),
('Portugal', 'Humberto Delgado Airport', 'Spain', 'Adolfo Suárez Madrid–Barajas Airport', '2023-05-20', '12:22:16', 10727, 1900),
('Portugal', 'Humberto Delgado Airport', 'India', 'Indira Gandhi International Airport', '2023-05-21', '12:22:16', 10728, 1900),
('Portugal', 'Humberto Delgado Airport', 'New Zealand', 'Auckland Airport', '2023-05-19', '12:22:16', 10729, 1900),
('Portugal', 'Humberto Delgado Airport', 'Saudi Arabia', 'King Khalid International Airport', '2023-05-15', '12:22:16', 10730, 1900),
('Portugal', 'Humberto Delgado Airport', 'Peru', 'Jorge Chávez International Airport', '2023-05-20', '12:22:16', 10731, 1900),
('Portugal', 'Humberto Delgado Airport', 'Australia', 'Sydney Kingsford Smith Airport', '2023-05-25', '12:22:16', 10732, 1900),
('Portugal', 'Humberto Delgado Airport', 'Egypt', 'Cairo International Airport', '2023-05-29', '12:22:16', 10733, 1900),
('Egypt', 'Cairo International Airport', 'Netherlands', 'Amsterdam Airport Schiphol', '2023-05-19', '12:22:16', 10734, 1900),
('Egypt', 'Cairo International Airport', 'United Arab Emirates', 'Dubai International Airport', '2023-05-18', '12:22:16', 10735, 1900),
('Egypt', 'Cairo International Airport', 'United States', 'Hartsfield–Jackson Atlanta International Airport', '2023-04-16', '12:22:16', 10736, 1900),
('Egypt', 'Cairo International Airport', 'Turkey', 'Istanbul Airport', '2023-04-16', '12:22:16', 10737, 1900),
('Egypt', 'Cairo International Airport', 'Spain', 'Adolfo Suárez Madrid–Barajas Airport', '2023-05-20', '12:22:16', 10738, 1900),
('Egypt', 'Cairo International Airport', 'India', 'Indira Gandhi International Airport', '2023-05-20', '12:22:16', 10739, 1900),
('Egypt', 'Cairo International Airport', 'New Zealand', 'Auckland Airport', '2023-05-29', '12:22:16', 10740, 1900),
('Egypt', 'Cairo International Airport', 'Saudi Arabia', 'King Khalid International Airport', '2023-05-22', '12:22:16', 10741, 1900),
('Egypt', 'Cairo International Airport', 'Peru', 'Jorge Chávez International Airport', '2023-05-28', '12:22:16', 10742, 1900),
('Egypt', 'Cairo International Airport', 'Australia', 'Sydney Kingsford Smith Airport', '2023-05-17', '12:22:16', 10743, 1900);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`trip-id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `trip-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10745;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
