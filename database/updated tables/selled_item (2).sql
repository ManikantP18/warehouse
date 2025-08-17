-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2025 at 04:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

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
  `selled_lot_no` varchar(255) NOT NULL,
  `selled_quantity` float NOT NULL,
  `return_qty` float NOT NULL DEFAULT 0,
  `sell_unit` int(11) NOT NULL,
  `selled_gst` int(11) NOT NULL,
  `selled_rate` int(11) NOT NULL,
  `sell_id` int(11) NOT NULL,
  `selled_status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `selled_item`
--

INSERT INTO `selled_item` (`selled_id`, `selled_item`, `selled_lot_no`, `selled_quantity`, `return_qty`, `sell_unit`, `selled_gst`, `selled_rate`, `sell_id`, `selled_status`) VALUES
(1, '3', '', 1, 0, 2, 0, 1000, 1, 1),
(2, '3', '', 6, 0, 3, 0, 900, 2, 1),
(3, '2', '', 2, 0, 4, 0, 1200, 2, 1),
(4, '3', '', 1, 0, 3, 0, 900, 3, 1),
(5, '2', '', 4, 0, 4, 0, 1250, 3, 1),
(6, '3', '', 4, 0, 3, 0, 4000, 6, 1),
(7, '8', '', 25, 15, 3, 0, 1250, 7, 1),
(8, '3', '1225', 1, 0, 3, 0, 1000, 8, 1),
(9, '8', '', 1, 0, 3, 0, 1250, 8, 1),
(11, '10', '', 6, 0, 1, 0, 1400, 9, 1),
(12, '3', '', 2, 0, 1, 0, 3000, 9, 1),
(13, '4', '', 1, 0, 1, 0, 1900, 9, 1),
(14, '12', '', 1, 0, 3, 0, 1600, 10, 1),
(15, '3', '33apr', 10, 0, 3, 0, 1000, 10, 1),
(16, '9', '', 1, 0, 3, 0, 1250, 11, 1),
(17, '7', '', 1, 0, 2, 0, 1200, 11, 1),
(18, '9', '', 1, 0, 3, 0, 1250, 12, 1),
(19, '7', '', 1, 0, 2, 0, 1200, 12, 1),
(20, '9', '', 1, 0, 3, 0, 1250, 13, 1),
(21, '7', '', 1, 0, 2, 0, 1200, 13, 1),
(22, '13', '', 2, 0, 3, 0, 2000, 14, 1),
(23, '7', '', 5, 0, 3, 0, 1200, 15, 1),
(24, '12', '', 500, 0, 2, 0, 1600, 16, 1),
(25, '7', '', 1, 0, 3, 0, 1200, 17, 1),
(26, '8', '55', 5, 0, 3, 0, 1250, 17, 1),
(27, '14', '', 3, 0, 3, 0, 2100, 18, 1),
(28, '12', '9988A3', 13, 0, 3, 0, 1600, 19, 1),
(29, '7', '', 3, 3, 1, 0, 1200, 20, 1);

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
  MODIFY `selled_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
