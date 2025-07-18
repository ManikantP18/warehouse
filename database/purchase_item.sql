-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2025 at 12:56 PM
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
-- Table structure for table `purchase_item`
--

CREATE TABLE `purchase_item` (
  `item_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `purchased_item` varchar(255) NOT NULL,
  `purchased_rate` int(11) NOT NULL,
  `purchased_qty` int(11) NOT NULL,
  `purchased_unit` varchar(20) NOT NULL,
  `purchased_total` int(11) NOT NULL,
  `purchased_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_item`
--

INSERT INTO `purchase_item` (`item_id`, `purchase_id`, `purchased_item`, `purchased_rate`, `purchased_qty`, `purchased_unit`, `purchased_total`, `purchased_status`) VALUES
(1, 1, '3', 5500, 2, '3', 11000, 0),
(2, 1, '2', 2700, 15, '3', 40500, 0),
(3, 11, '3', 700, 1, '4', 700, 1),
(4, 12, '2', 2222, 4, '3', 8888, 1),
(5, 12, '3', 111, 7, '2', 777, 1),
(11, 13, '3', 900, 14, '4', 12600, 1),
(12, 13, '2', 2200, 500, '3', 1000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchase_item`
--
ALTER TABLE `purchase_item`
  ADD PRIMARY KEY (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchase_item`
--
ALTER TABLE `purchase_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
