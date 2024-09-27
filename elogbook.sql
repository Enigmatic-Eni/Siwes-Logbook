-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 21, 2024 at 03:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elogbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `matric_number` int(11) DEFAULT NULL,
  `week` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `matric_number`, `week`, `comment`) VALUES
(1, 200591079, 2, 'It\'s not okay'),
(2, 200591079, 4, 'It\'s pretty impressive'),
(3, 200591123, 1, 'Good job man'),
(4, 200591123, 1, 'You havent done anything for week 1'),
(5, 200591079, 4, 'Why is there nothing for week 4?'),
(6, 200591079, 10, 'Hello world'),
(7, 200591079, 12, 'What\'s up');

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `reg_number` int(20) NOT NULL,
  `password_hash` text NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `user_type` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`first_name`, `last_name`, `reg_number`, `password_hash`, `middle_name`, `user_type`, `id`) VALUES
('OLUWASEGUN', 'LAWRENCE', 12341234, '$2y$10$j7w8W3Bl6oQNudJDlKc11OmTb6BM5i49cXolH3A6HM.cxaTG0rEZe', '', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password_hash` varchar(100) NOT NULL,
  `matric_number` int(11) NOT NULL,
  `middle_name` varchar(20) DEFAULT NULL,
  `name_of_company` varchar(100) DEFAULT NULL,
  `address` varchar(120) DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `password_hash`, `matric_number`, `middle_name`, `name_of_company`, `address`, `user_type`) VALUES
(1, 'OLUWASEGUN', 'LAWRENCE', '$2y$10$EIzlhwyiQU4etuTx3etmE.3cyjx8DFmxX7.Yd6B7VOhlyUsb2X/mW', 200591079, 'tunmise', 'ikeja', 'ikeja lagos', 1),
(2, 'Sanni', 'Abdullah', '$2y$10$cQ.DyiSIMGIGzPZCupspCOze1ku9ilbM0xFYTwm9cXWAw8WsiiM8S', 200591123, '', 'Somewhere', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `weekly_report`
--

CREATE TABLE `weekly_report` (
  `matric_number` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `monday` text DEFAULT NULL,
  `tuesday` text DEFAULT NULL,
  `wednesday` text DEFAULT NULL,
  `thursday` text DEFAULT NULL,
  `friday` text DEFAULT NULL,
  `week_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weekly_report`
--

INSERT INTO `weekly_report` (`matric_number`, `id`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `week_id`) VALUES
(200591079, 7, 'LAWRENCE SEGUN', 'Something new', NULL, NULL, NULL, 1),
(200591079, 8, 'what\'s up?', NULL, NULL, NULL, NULL, 2),
(200591123, 9, 'It\'s me mehn', NULL, NULL, NULL, NULL, 1),
(200591123, 10, 'WOrking?', NULL, NULL, NULL, NULL, 2),
(200591079, 11, 'What\'s up?', NULL, NULL, NULL, NULL, 3),
(200591079, 12, 'Here it\'s my nigga', NULL, NULL, NULL, NULL, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_matric_number` (`matric_number`);

--
-- Indexes for table `weekly_report`
--
ALTER TABLE `weekly_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matric_number` (`matric_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `weekly_report`
--
ALTER TABLE `weekly_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `weekly_report`
--
ALTER TABLE `weekly_report`
  ADD CONSTRAINT `weekly_report_ibfk_1` FOREIGN KEY (`matric_number`) REFERENCES `users` (`matric_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
