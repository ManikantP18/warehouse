-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2025 at 09:52 AM
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
-- Database: `agriaccounts-323036a652`
--

-- --------------------------------------------------------

--
-- Table structure for table `rogring`
--

CREATE TABLE `rogring` (
  `Rogring_id` int(11) NOT NULL,
  `Rogring_name` varchar(255) NOT NULL,
  `Rogring_contcact` varchar(12) NOT NULL,
  `Rogring_status` tinyint(2) NOT NULL DEFAULT 1,
  `Created_at` datetime NOT NULL,
  `Updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rogring`
--

INSERT INTO `rogring` (`Rogring_id`, `Rogring_name`, `Rogring_contcact`, `Rogring_status`, `Created_at`, `Updated_at`) VALUES
(13, 'puja kushwah', '1234567899', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Raj Verma', '1234567899', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Manikant sir', '1234567898', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Tulsi', '1234567899', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rogring`
--
ALTER TABLE `rogring`
  ADD PRIMARY KEY (`Rogring_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rogring`
--
ALTER TABLE `rogring`
  MODIFY `Rogring_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
