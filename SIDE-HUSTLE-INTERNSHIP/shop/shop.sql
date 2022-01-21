-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 03:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `shopuser`
--

CREATE TABLE `shopuser` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `secret_question` longtext NOT NULL,
  `secret_answer` varchar(512) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopuser`
--

INSERT INTO `shopuser` (`id`, `shop_name`, `full_name`, `email`, `secret_question`, `secret_answer`, `password`, `created_at`, `updated_at`) VALUES
(1, 'S &amp; G', 'Amusan', 'olivia4baoku@yahoo.com', 'where am i', 'dance', 'john', '0000-00-00 00:00:00', '2021-07-16 14:18:57'),
(3, 'S &amp; G', 'Amusan', 'adegunjujide@gmail.com', 'where am i', 'dance', '$2y$10$82lM3y0SWTqKnKCOGqOICOdPvzjgeh/22KG6qVdHFeDIpaUt92SKq', '0000-00-00 00:00:00', '2021-07-16 15:32:37'),
(4, 'S &amp; G', 'Amusan', 'sgintegratedsys@gmail.com', 'where am i', 'dance', '$2y$10$DtcPCgZmTGd76hCBt2kbQOi9yA0/PR5nWXCW.xGtvtzEmxmrbZy6O', '0000-00-00 00:00:00', '2021-07-16 16:21:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shopuser`
--
ALTER TABLE `shopuser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shopuser`
--
ALTER TABLE `shopuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
