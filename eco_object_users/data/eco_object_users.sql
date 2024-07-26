-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 26, 2024 at 07:04 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eco_object`
--

-- --------------------------------------------------------

--
-- Table structure for table `eco_object_users`
--

DROP TABLE IF EXISTS `eco_object_users`;
CREATE TABLE IF NOT EXISTS `eco_object_users` (
  `object_user_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `object_user_login` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `object_user_pass` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `object_user_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `object_user_email` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `object_user_permission` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `object_user_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`object_user_id`),
  UNIQUE KEY `object_user_login` (`object_user_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
