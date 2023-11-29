-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 02:17 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` enum('Research Group Manager','Research Study Manager','Researcher') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('Research Group Manager','Research Study Manager','Researcher') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'Deimario', '$2y$10$aKoSWZA2M1Lcv5LYQQ5JZOhtyGjWbgAUbfcoto0DBOo4kBiCJv5C2', 'ojamaboss67@gmail.com', 'Research Group Manager'),
(2, 'Alcapone', '$2y$10$kFmw6yj6uiqrRthLjwB.O..OUvCcIRfUcfPvkKv6vNa7JUlK6qPlG', 'mariodestroyer612@gmail.com', 'Research Group Manager'),
(3, 'puncadonkey', '$2y$10$wykWdyJKPObcLJiDeIGt8u7WL.0fKwISoywZ3wfiwioYl0Hlt5Uii', 'dcallender60@gmail.com', 'Research Study Manager'),
(4, 'BobBingy', '$2y$10$CS15nnX/hMgfRXcqA4ecmexvrI8Hn3AYKD.7IIcF//3ZGgBh6rFrW', 'test@test.com', NULL),
(5, 'BobBingy', '$2y$10$b3Cdu1ccV1muHTdjePH5K.h8w6N7paYA1xk7HvSL3k6AEoNYRWA/G', 'test@test.com', NULL),
(6, 'test', '$2y$10$TlM08St.LwG0Y.kqjGsT5.yqYeuPbCXQc7HyZ73EbO5P/D2L6jog2', 'test@test.com', NULL),
(7, 'test', '$2y$10$AGF3V09n.1z0hhQFJCA74uNwYseeLkVSEFPQu9sECXfhmQn8ZAnw2', 'test@test.com', NULL),
(8, 'test', '$2y$10$OuQlv71r5VaGvttWsn85Iu1aonVzkRZM8arVYjZ5qxKt1TZZ4OGz6', 'test@test.com', NULL),
(9, '35835', '$2y$10$LhYYoaOOZGxs7tuWX4/2RulX0.aMLJ0mzMO4TeHGFYqfEoEq4vvWC', 'test@test.com', NULL),
(10, 'deimario', '$2y$10$IaRK0FxVCe/sxdLi26kJEeTyR210aVgDtsDelsDLfMlKUpcZsr2UK', 'charlesestwick47@gmail.com', NULL),
(11, 'deimario', '$2y$10$D3vTiVYeXPtOSpc2cuXxIOMvgthP23pJhMW5jtJRHyXMck71BKBoe', 'charlesestwick47@gmail.com', NULL),
(12, 'test', '$2y$10$dHse.8OF.u1zy/ZVxY0h8e6shyERnjyi1oRpIronKRrloNXGXxfVy', 'deimario.callender@mycavehill.uwi.edu', NULL),
(13, 'test', '$2y$10$h/L4JlwrskgVryTCtGq5He3vx4Yw03TkpONKWMvxbX9q.xIFLUhIS', 'deimario.callender@mycavehill.uwi.edu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_levels`
--

CREATE TABLE `user_access_levels` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `AccessLevel` enum('Research Group Manager','Research Study Manager','Researcher') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_levels`
--
ALTER TABLE `user_access_levels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_access_levels`
--
ALTER TABLE `user_access_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
