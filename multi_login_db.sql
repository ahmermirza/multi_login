-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 18, 2022 at 09:23 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_login_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `user_type` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `post_nr` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `salary` varchar(200) DEFAULT NULL,
  `work_title` varchar(200) DEFAULT NULL,
  `profile_pic` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`, `first_name`, `last_name`, `address`, `post_nr`, `country`, `phone`, `salary`, `work_title`, `profile_pic`, `CreationDate`) VALUES
(1, 'radha', 'rad@gmail.com', 'user', '828fd9255753432d51df95eb62d61722', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-17 17:08:55'),
(2, 'sarita', 'sarita@gmail.com', 'user', '62c8ad0a15d9d1ca38d5dee762a16e01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-17 17:08:55'),
(3, 'krishna', 'krishna@gmail.com', 'admin', '7cc2cf8a95f80a8ea500ff997f9623e4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin.png', '2022-04-17 17:08:55'),
(6, 'kurt', 'test2@test.com', 'user', 'c84ae13a4a1c637c658307ba8bdc5eb0', 'Kurtis', 'John', '51 Park Road', '34545', 'UK', '03454565465', '3500', 'dev', 'user.png', '2022-04-18 15:30:51');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
