-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2025 at 10:13 AM
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
-- Table structure for table `sell_to`
--

CREATE TABLE `sell_to` (
  `sell_id` int(11) NOT NULL,
  `sell_account_number` varchar(255) NOT NULL,
  `sell_relation_customer` varchar(255) NOT NULL,
  `sell_account_name` varchar(255) NOT NULL,
  `sell_property_owner` varchar(255) NOT NULL,
  `sell_village` text NOT NULL,
  `sell_phone` varchar(10) NOT NULL,
  `sell_quantity` int(11) NOT NULL,
  `sell_rate` float NOT NULL,
  `sell_total_ammount` int(11) NOT NULL,
  `sell_gst_ammount` int(11) NOT NULL,
  `sell_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `sell_created_date` datetime NOT NULL,
  `sell_way` varchar(255) NOT NULL,
  `sell_to` varchar(255) NOT NULL,
  `item_selled` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sell_to`
--

INSERT INTO `sell_to` (`sell_id`, `sell_account_number`, `sell_relation_customer`, `sell_account_name`, `sell_property_owner`, `sell_village`, `sell_phone`, `sell_quantity`, `sell_rate`, `sell_total_ammount`, `sell_gst_ammount`, `sell_status`, `is_deleted`, `sell_created_date`, `sell_way`, `sell_to`, `item_selled`) VALUES
(1, '12345678909876543', 'nikita', 'nikita', 'nikita', 'thibgaon', '1234567890', 3, 4.5, 150000, 200, 1, 0, '2025-06-28 09:38:02', 'cash', '', ''),
(11, 'cust-1', 'Manikant Patidar', 'Sukhraj', 'Tulsi', 'badgaon', '7744551122', 0, 0, 3343, 0, 1, 0, '0000-00-00 00:00:00', 'cash', 'farmer', 'tulsi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sell_to`
--
ALTER TABLE `sell_to`
  ADD PRIMARY KEY (`sell_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sell_to`
--
ALTER TABLE `sell_to`
  MODIFY `sell_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
