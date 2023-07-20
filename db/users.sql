-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2022 at 11:20 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Email` varchar(100) NOT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `Phone` varchar(30) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `Location` varchar(40) DEFAULT NULL,
  `CardType` varchar(10) DEFAULT NULL,
  `CardNumber` int(16) DEFAULT NULL,
  `Password` varchar(1000) DEFAULT NULL,
  `Created_on` date DEFAULT curdate(),
  `Created_at` time DEFAULT curtime(),
  `Status` varchar(10) DEFAULT 'active',
  `Type` varchar(10) DEFAULT 'user',
  `Active` varchar(10) DEFAULT 'offline'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `update_list` (
  `Email` varchar(100) NOT NULL,
  `index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Email`, `Username`, `Phone`, `Gender`, `Location`, `CardType`, `CardNumber`, `Password`, `Created_on`, `Created_at`, `Status`, `Type`, `Active`) VALUES
('Abdourahim@yahoo.com', 'Kibuh Abdou', '+237660976546', 'Male', 'Limbe', 'visa', 2147483647, 'abdourahim', '2022-02-10', '21:41:28', 'active', 'user', 'offline'),
('campus09@yahoo.com', 'Campus TX', '+237690976546', 'Female', 'Boston', 'visa', 2147483647, 'campusX', '2022-02-10', '21:41:28', 'active', 'user', 'offline'),
('cues25@gmail.co.uk', 'Cues25', '+237677896546', 'Female', 'Yaounde', 'visa', 2147483647, 'cues25', '2022-02-10', '21:41:28', 'inactive', 'user', 'offline'),
('cues25@yahoo.com', 'Cues Cues', '+2347038976546', 'Male', 'Nigeria', 'visa', 2147483647, 'cues25', '2022-02-10', '21:27:28', 'inactive', 'user', 'offline'),
('cueswin25@gmail.com', 'abdulrahim', '+237676768760', 'Male', 'North', 'visa', 2147483647, 'cueswin', '2022-02-10', '21:21:51', 'active', 'user', 'offline'),
('cueswin@yahoo.com', 'Cues Win', '+237670976546', 'Male', 'Douala', 'visa', 2147483647, 'cues25', '2022-02-10', '21:41:28', 'active', 'user', 'offline'),
('kibuh73785569@gmail.com', 'Abdou Rahim', '+237673785569', 'Male', 'Limbe', 'Visa', 2147483647, '123laptop25', '2022-01-19', '19:20:46', 'active', 'admin', 'online'),
('kibuh80@gmail.com', 'livenje Amoson billa', '+237670775569', 'Male', 'West', 'mastercard', 2147483647, '123laptop25', '2022-02-10', '21:18:43', 'inactive', 'user', 'offline'),
('Kiven@yahoo.com', 'Jamilatu Kiven', '+237660996546', 'Male', 'Dchang', 'visa', 2147483647, 'cues25', '2022-02-10', '21:41:28', 'active', 'user', 'offline'),
('maria@hotmail.com', 'Maria Jane', '+237660976546', 'Female', 'Limbe', 'visa', 2147483647, 'maria', '2022-02-10', '21:41:28', 'active', 'user', 'offline'),
('Salle@yahoo.com', 'Salle Yusuf', '+237660976546', 'Male', 'Douala', 'visa', 2147483647, 'cues25', '2022-02-10', '21:41:28', 'active', 'user', 'offline'),
('SheVivian@yahoo.com', 'shey', '+237660976546', 'Female', 'Douala', 'visa', 2147483647, 'shey', '2022-02-10', '21:41:28', 'active', 'user', 'offline'),
('shuttle@hotmail.com', 'Shuttle Shuttle', '+237660976546', 'Male', 'Campus', 'visa', 2147483647, 'shuttle', '2022-02-10', '21:41:28', 'active', 'user', 'offline'),
('Space@space.co.uk', 'space', '+237660976546', 'Male', 'Bafoussam', 'visa', 2147483647, 'space', '2022-02-10', '21:41:28', 'active', 'user', 'offline'),
('SpaceX@gmail.com', 'Space X', '+237660976546', 'Female', 'space', 'visa', 2147483647, 'spaceX', '2022-02-10', '21:41:28', 'active', 'user', 'offline'),
('theway@gmail.com', 'The Way', '+237660976906', 'Female', 'Bafoussam', 'visa', 2147483647, 'cues25', '2022-02-10', '21:41:28', 'active', 'user', 'offline'),
('waythere@yahoo.com', 'Way There', '+237660976546', 'Male', 'Bafoussam', 'visa', 2147483647, 'waythere', '2022-02-10', '21:41:28', 'active', 'user', 'offline'),
('whattodo@yahoo.com', 'Like What', '+237698890546', 'Male', 'Bamenda', 'visa', 2147483647, 'what', '2022-02-10', '21:41:28', 'inactive', 'user', 'offline'),
('win25@yahoo.com', 'win', '+237660970046', 'Male', 'Limbe', 'visa', 2147483647, 'cues25', '2022-02-10', '21:41:28', 'inactive', 'user', 'offline'),
('winwin25@yahoo.com', 'win', '+237660976546', 'Male', 'Bafoussam', 'visa', 2147483647, 'cues25', '2022-02-10', '21:41:28', 'inactive', 'user', 'offline');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Email`);
COMMIT;

ALTER TABLE `update_list`
  ADD PRIMARY KEY (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
