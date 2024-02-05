-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 11:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youthlink`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`id`, `username`, `password`) VALUES
(1, 'Admin', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_data`
--

CREATE TABLE `appointment_data` (
  `id` int(50) NOT NULL,
  `eventDateFrom` date NOT NULL,
  `eventDateTo` date NOT NULL,
  `event` varchar(50) NOT NULL,
  `vicariate` varchar(50) NOT NULL,
  `parish` varchar(100) NOT NULL,
  `contactPerson` varchar(50) NOT NULL,
  `contactNumber` varchar(13) NOT NULL,
  `venue` varchar(500) NOT NULL,
  `remarks` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_data`
--

INSERT INTO `appointment_data` (`id`, `eventDateFrom`, `eventDateTo`, `event`, `vicariate`, `parish`, `contactPerson`, `contactNumber`, `venue`, `remarks`) VALUES
(1, '2024-01-19', '2024-01-20', 'Journey Recollection', 'vicariate 14', 'San Guillermo Parish', 'Stephen Xavier Mendoza', '09991955427', 'San Guillermo Parish Hall', 'none'),
(2, '2024-02-10', '2024-02-12', 'Youth Encounter', 'vicariate 13', 'Nuestra Señora de la Soledad Parish', 'Leo Carandang', '09270349619', 'NSSP Parish Hall', 'none'),
(3, '2024-01-25', '2024-01-26', 'Pencil Retreat', 'vicariate 14', 'Immaculate Conception Parish - Laurel', 'Gemma Rose Genil', '09186652832', ' Parish Hall', 'none'),
(4, '2024-01-30', '2024-01-30', 'Treasure of Joy Recollection', 'vicariate 1', 'St. Francis Xavier Parish', 'Kian Russel Felipe', '90182398120', 'San Sebastian Retreat House', 'none'),
(5, '2024-01-26', '2024-01-26', 'Samaritan Recollection', 'vicariate 4', 'Mahal na Poon ng Banal na Krus Parish', 'Jude Malabanan', '90182398120', 'San Sebastian Retreat House', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `organization` varchar(50) NOT NULL,
  `vicariate` varchar(100) NOT NULL,
  `parish` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cnumber` varchar(13) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `name`, `username`, `organization`, `vicariate`, `parish`, `email`, `cnumber`, `password`) VALUES
(1, 'Stephen Xavier Mendoza', 'Admin', 'Parish', 'vicariate 1', 'St. Francis Xavier Parish', 'acct0028@gmail.com', '09991955427', 'admin1234'),
(2, 'Gemma Rose Genil', 'Gemma0019', 'Parish', 'vicariate 1', 'St. Francis Xavier Parish', 'gemmarose.genil@gmail.com', '09182363787', 'ggenil0019'),
(3, 'Kian Russel Felipe', 'Kian001', 'school', '', '', 'kian.felipe@gmail.com', '2147483647', 'kian1234'),
(4, 'Xavier Mendoza', 'Xavier', 'Formation team', 'vicariate 14', 'San Guillermo Parish', 'sxmendoza0028@gmail.com', '09991955427', 'xavier123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_data`
--
ALTER TABLE `appointment_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_data`
--
ALTER TABLE `admin_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment_data`
--
ALTER TABLE `appointment_data`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
