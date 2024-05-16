-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: May 16, 2024 at 09:10 AM
-- Server version: 10.9.8-MariaDB-1:10.9.8+maria~ubu2204
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camagru`
--
CREATE DATABASE IF NOT EXISTS `camagru` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `camagru`;

-- --------------------------------------------------------

--
-- Table structure for table `keyMail`
--

CREATE TABLE IF NOT EXISTS `keyMail` (
  `user_id` int(11) NOT NULL,
  `user_key` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `user_link_keymail` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_link_pictures` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `picturesComments`
--

CREATE TABLE IF NOT EXISTS `picturesComments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picture_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `picturesLikes`
--

CREATE TABLE IF NOT EXISTS `picturesLikes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `picture_link_picturesLikes` (`picture_id`),
  KEY `user_link_picturesLikes` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` text NOT NULL,
  `emailVerified` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keyMail`
--
ALTER TABLE `keyMail`
  ADD CONSTRAINT `user_link_keymail` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `user_link_pictures` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `picturesLikes`
--
ALTER TABLE `picturesLikes`
  ADD CONSTRAINT `picture_link_picturesLikes` FOREIGN KEY (`picture_id`) REFERENCES `pictures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_link_picturesLikes` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
