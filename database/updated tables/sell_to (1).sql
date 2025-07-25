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
  `sell_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `sell_way` varchar(255) NOT NULL,
  `sell_to` varchar(255) NOT NULL,
  `item_selled` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `cash_amount` int(11) NOT NULL DEFAULT 0,
  `credit_amount` int(11) NOT NULL DEFAULT 0,
  `remaining_amount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sell_to`
--

INSERT INTO `sell_to` (`sell_id`, `sell_account_number`, `sell_relation_customer`, `sell_account_name`, `sell_property_owner`, `sell_village`, `sell_phone`, `sell_quantity`, `sell_rate`, `sell_total_ammount`, `sell_gst_ammount`, `sell_status`, `is_deleted`, `sell_created_date`, `sell_way`, `sell_to`, `item_selled`, `bank_name`, `cash_amount`, `credit_amount`, `remaining_amount`) VALUES
(1, 'cust-6', 'PRAVESH SHARMA', 'MADHAV', 'ACCFG', 'GO', '7000362599', 0, 0, 7700, 0, 1, 0, '2025-07-18 13:42:22', 'credit', 'farmer', '', '1', 4500, 2000, 1200),
(2, 'cust-6', 'PRAVESH SHARMA', 'MADHAV', 'ACCFG', 'GO', '7000362599', 0, 0, 1250, 0, 1, 0, '2025-07-18 17:22:16', 'cash', 'farmer', '', '1', 0, 0, 0),
(3, 'cust-6', 'PRAVESH SHARMA', 'MADHAV', 'ACCFG', 'GO', '7000362599', 0, 0, 48750, 0, 1, 0, '2025-07-19 05:53:56', 'cash', 'farmer', '', '1', 48750, 0, 0),
(4, 'cust-16', 'RADHE', '123456789101', 'PK', 'SHAHPURA', '9893577554', 0, 0, 16250, 0, 1, 0, '2025-07-19 18:23:21', 'cash', 'other', '', '1', 677, 9000, 0),
(5, 'cust-16', 'RADHE', '1233', 'PK', 'SHAHPURA', '9893577554', 0, 0, 2250, 0, 1, 0, '2025-07-19 20:26:05', 'credit', 'farmer', '', '1', 100, 111, 2039),
(6, 'cust-16', 'RADHE', '1233', 'PK', 'SHAHPURA', '9893577554', 0, 0, 2250, 0, 1, 0, '2025-07-19 20:27:42', 'credit', 'farmer', '', '14', 50, 0, 2200),
(7, 'cust-16', 'RADHE', '1233', 'PK', 'SHAHPURA', '9893577554', 0, 0, 2250, 0, 1, 0, '2025-07-19 20:27:53', 'credit', 'farmer', '', '14', 50, 0, 2200),
(8, 'cust-16', 'RADHE', '1233', 'PK', 'SHAHPURA', '9893577554', 0, 0, 2250, 0, 1, 0, '2025-07-19 20:28:32', 'credit', 'farmer', '', '1', 0, 0, 0),
(9, 'cust-16', 'RADHE', '1233', 'PK', 'SHAHPURA', '9893577554', 0, 0, 2250, 0, 1, 0, '2025-07-19 20:29:40', 'cash', 'farmer', '', '1', 2250, 0, 0),
(10, 'cust-16', 'RADHE', '1233', 'PK', 'SHAHPURA', '9893577554', 0, 0, 2250, 0, 1, 0, '2025-07-19 20:32:22', 'credit', 'farmer', '', '1', 66, 0, 2184),
(11, 'cust-6', 'PRAVESH SHARMA', 'MADHAV', 'ACCFG', 'GO', '7000362599', 0, 0, 2500, 0, 1, 0, '2025-07-21 06:30:36', 'credit', 'farmer', '', '14', 1500, 0, 1000),
(12, 'cust-13', 'PRAFULL SHARMA', '12345678945', 'SURESH SHARMA', 'GOGAWAN', '8889485785', 0, 0, 1250, 0, 1, 0, '2025-07-21 06:44:09', 'credit', 'farmer', '', '16', 50, 1000, 200),
(13, 'cust-13', 'PRAFULL SHARMA', '12345678945', 'SURESH SHARMA', 'GOGAWAN', '8889485785', 0, 0, 1250, 0, 1, 0, '2025-07-21 06:44:42', 'credit', 'farmer', '', '16', 50, 1000, 200),
(14, 'cust-18', 'Shree Ji', '78457754574', 'Shree Hari', 'Vekunth', '7857848787', 0, 0, 2500, 0, 1, 0, '2025-07-24 16:23:53', 'cash', 'farmer', '', '11', 1000, 1500, 0);

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
  MODIFY `sell_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
