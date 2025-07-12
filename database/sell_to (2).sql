-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2025 at 09:43 AM
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
  `item_selled` varchar(255) NOT NULL,
  `cash_amount` int(11) NOT NULL,
  `credit_amount` int(11) NOT NULL,
  `remaining_amount` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sell_to`
--

INSERT INTO `sell_to` (`sell_id`, `sell_account_number`, `sell_relation_customer`, `sell_account_name`, `sell_property_owner`, `sell_village`, `sell_phone`, `sell_quantity`, `sell_rate`, `sell_total_ammount`, `sell_gst_ammount`, `sell_status`, `is_deleted`, `sell_created_date`, `sell_way`, `sell_to`, `item_selled`, `cash_amount`, `credit_amount`, `remaining_amount`, `bank_name`) VALUES
(1, 'cust-1', 'Manikant Patidar', 'Sukhraj', 'Tulsi', 'Bada Gaon', '7744551122', 1, 10000, 11000, 1000, 1, 0, '0000-00-00 00:00:00', 'cash', 'farmer', '1', 1200, 1300, 8500, ''),
(2, 'cust-2', 'Manikant Patidar', 'Sukhraj', 'Tulsi', 'gogawan', '7744551122', 1, 0, 0, 0, 1, 0, '0000-00-00 00:00:00', 'cash', 'farmer', '', 0, 0, 0, '2'),
(3, 'cust-1', 'Manikant Patidar', 'Sukhraj', 'Tulsi', 'Bada Gaon', '7744551122', 1, 0, 0, 0, 1, 0, '0000-00-00 00:00:00', 'cash', 'farmer', '', 0, 0, 0, '4');

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
  MODIFY `sell_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
