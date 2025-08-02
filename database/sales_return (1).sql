-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2025 at 10:33 AM
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
-- Table structure for table `sales_return`
--

CREATE TABLE `sales_return` (
  `cn_id` int(11) NOT NULL,
  `cash_credit` double NOT NULL,
  `aadhar_no` int(12) NOT NULL,
  `r_cust` text NOT NULL,
  `village` text NOT NULL,
  `mo_no` int(10) NOT NULL,
  `item_sale` text NOT NULL,
  `quantity` varchar(50) NOT NULL DEFAULT '1',
  `unit` text NOT NULL,
  `rate` float NOT NULL,
  `total_amount` float NOT NULL,
  `GST_amount` float NOT NULL,
  `creat_at` datetime NOT NULL DEFAULT current_timestamp(),
  `UPdate_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(2) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_return`
--

INSERT INTO `sales_return` (`cn_id`, `cash_credit`, `aadhar_no`, `r_cust`, `village`, `mo_no`, `item_sale`, `quantity`, `unit`, `rate`, `total_amount`, `GST_amount`, `creat_at`, `UPdate_at`, `status`, `is_deleted`) VALUES
(1, 4550, 1236547890, 'df52', 'kgn', 1236547899, 'gehu', '52beg', '', 220, 2222, 1222, '2025-07-17 13:24:42', '2025-07-17 13:24:42', 0, 1),
(9, 0, 0, '', '', 0, '', '', '', 0, 0, 0, '2025-07-18 11:22:42', '2025-07-18 11:22:42', 0, 1),
(10, 5500, 2147483647, '', '', 0, '125', '10', '', 112, 2211, 212, '2025-07-18 11:33:18', '2025-07-18 11:33:18', 0, 1),
(11, 5500, 1236547890, '', '', 0, '125', '10', '', 125, 2211, 212, '2025-07-18 11:34:52', '2025-07-18 11:34:52', 0, 1),
(12, 88887777, 2147483647, 'ggggg', 'g', 2147483647, '125', '87', '', 78, 87878, 888, '2025-07-18 11:39:49', '2025-07-18 11:39:49', 0, 0),
(13, 0, 0, 'ggggg', 'g', 0, '0000000000', '00000000000', '', 0, 0, 0, '2025-07-18 11:50:40', '2025-07-18 11:50:40', 0, 0),
(14, 1010, 2147483647, 'qqqqqqq', 'g', 1010101010, '101', '10', '', 110, 101, 1001, '2025-07-18 11:52:05', '2025-07-18 11:52:05', 0, 1),
(15, 5500, 2147483647, 'ggggg', 'g', 2147483647, '125', '10', '', 1458, 225, 2255590, '2025-07-18 12:55:55', '2025-07-18 12:55:55', 0, 0),
(16, 1100, 1100, 'ram', 'g', 1111111100, 'ram', 'ram', 'ram', 1010, 1010, 1010, '2025-07-19 12:54:42', '2025-07-19 12:54:42', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales_return`
--
ALTER TABLE `sales_return`
  ADD PRIMARY KEY (`cn_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sales_return`
--
ALTER TABLE `sales_return`
  MODIFY `cn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
