-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2025 at 04:21 PM
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
-- Table structure for table `sales_return`
--

CREATE TABLE `sales_return` (
  `cn_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `selled_item_id` int(11) NOT NULL,
  `cash_credit` varchar(10) NOT NULL,
  `aadhar_no` int(12) NOT NULL,
  `land_owner` varchar(255) NOT NULL,
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
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(2) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_return`
--

INSERT INTO `sales_return` (`cn_id`, `sale_id`, `p_id`, `selled_item_id`, `cash_credit`, `aadhar_no`, `land_owner`, `r_cust`, `village`, `mo_no`, `item_sale`, `quantity`, `unit`, `rate`, `total_amount`, `GST_amount`, `creat_at`, `Updated_at`, `status`, `is_deleted`) VALUES
(19, 7, 8, 7, 'cash', 2147483647, 'kanchan bai punya', 'ganesh yadav', '', 2147483647, '', '14', '3', 1250, 17500, 0, '2025-08-17 19:30:16', '2025-08-17 19:30:16', 0, 0),
(20, 20, 7, 29, 'cash', 2147483647, 'Manikant Patidar', 'Yogesh Patidar', '', 2147483647, '', '1', '1', 1200, 1200, 0, '2025-08-17 19:44:29', '2025-08-17 19:44:29', 0, 0);

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
  MODIFY `cn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
