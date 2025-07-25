-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2025 at 10:06 AM
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
-- Table structure for table `selled_item`
--

CREATE TABLE `selled_item` (
  `selled_id` int(11) NOT NULL,
  `selled_item` varchar(255) NOT NULL,
  `selled_quantity` int(11) NOT NULL,
  `sell_unit` int(11) NOT NULL,
  `selled_gst` int(11) NOT NULL,
  `selled_rate` int(11) NOT NULL,
  `sell_id` int(11) NOT NULL,
  `selled_status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `selled_item`
--

INSERT INTO `selled_item` (`selled_id`, `selled_item`, `selled_quantity`, `sell_unit`, `selled_gst`, `selled_rate`, `sell_id`, `selled_status`) VALUES
(1, '1', 1, 3, 0, 1250, 40, 1),
(2, '1', 10, 1, 0, 1250, 26, 1),
(3, '2', 5, 1, 0, 1250, 26, 1),
(4, '1', 2, 3, 200, 1250, 1, 1),
(5, '2', 4, 4, 0, 1250, 1, 1),
(9, '1', 1, 3, 0, 1250, 3, 1),
(10, '2', 38, 4, 0, 1250, 3, 1),
(13, '3', 10, 3, 0, 1000, 4, 1),
(14, '2', 5, 4, 0, 1250, 4, 1),
(15, '3', 1, 3, 0, 1000, 10, 1),
(16, '2', 1, 4, 0, 1250, 10, 1),
(17, '2', 2, 3, 0, 1250, 11, 1),
(18, '1', 1, 3, 0, 1250, 13, 1),
(19, '1', 1, 3, 0, 1250, 14, 1),
(20, '2', 1, 4, 0, 1250, 14, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `selled_item`
--
ALTER TABLE `selled_item`
  ADD PRIMARY KEY (`selled_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `selled_item`
--
ALTER TABLE `selled_item`
  MODIFY `selled_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
