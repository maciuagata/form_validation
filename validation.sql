-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 27, 2020 at 11:29 PM
-- Server version: 8.0.21-0ubuntu0.20.04.4
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `validation`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `email` varchar(254) NOT NULL,
  `name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` text NOT NULL,
  `password` varchar(64) NOT NULL,
  `registered_at` datetime NOT NULL,
  `last_login_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `name`, `last_name`, `phone`, `password`, `registered_at`, `last_login_at`) VALUES
(1, 'maciulewiczagata@gmail.com', 'Alexag', '', '+37067444869', 'cea5baa1caa31b0e4a3cca33eacdb6a5d28e7b4b826a583240fe7ed905855a66', '2020-09-25 18:46:33', '2020-09-25 18:46:33'),
(3, 'maciulewiczagata596@gmail.com', 'Agata ', '', '+37067444869', '9cd4a44af25ee3c217a1b8d1b27b64e704380a9647eab88de933920de2acff00', '2020-09-25 18:52:08', '2020-09-25 18:52:08'),
(5, 'Agatukas@domenas.com', 'Agata', '', '+37069922387', '306f6f759db67642e91cb01649e5150657664005033e9c71b921dc8ffb8f4dcf', '2020-09-27 18:03:18', '2020-09-27 18:03:18'),
(6, 'agatukas1@domenas.com', 'Karina', 'Makowsla', '867145689', '306f6f759db67642e91cb01649e5150657664005033e9c71b921dc8ffb8f4dcf', '2020-09-27 22:17:25', '2020-09-27 22:17:25'),
(7, 'karina@domenas.com', 'Karina', 'Makowslaja', '86412379', '306f6f759db67642e91cb01649e5150657664005033e9c71b921dc8ffb8f4dcf', '2020-09-27 22:25:03', '2020-09-27 22:25:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
