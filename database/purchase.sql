-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2025 at 11:34 AM
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
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `purchase_way` varchar(255) NOT NULL,
  `purchase_relation_cusm` varchar(255) NOT NULL,
  `purchase_accountant` varchar(255) NOT NULL,
  `purchase_owner` varchar(255) NOT NULL,
  `purchase_village` varchar(255) NOT NULL,
  `purchase_acre` int(11) NOT NULL,
  `purchase_phone` int(10) NOT NULL,
  `purchase_rst_no` varchar(50) NOT NULL,
  `purchase_lot_no` int(11) NOT NULL,
  `purchase_account_no` varchar(255) NOT NULL,
  `purchas_bank_name` varchar(255) NOT NULL,
  `purchase_ifsc` varchar(255) NOT NULL,
  `purchase_branch` varchar(255) NOT NULL,
  `purchase_gst_no` varchar(50) NOT NULL,
  `purchase_item` varchar(255) NOT NULL,
  `purchase_quantity` int(11) NOT NULL,
  `purchase_rate` float NOT NULL,
  `purchase_total` int(11) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `purchase_status` tinyint(4) NOT NULL DEFAULT 1,
  `purchase_to` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `purchase_way`, `purchase_relation_cusm`, `purchase_accountant`, `purchase_owner`, `purchase_village`, `purchase_acre`, `purchase_phone`, `purchase_rst_no`, `purchase_lot_no`, `purchase_account_no`, `purchas_bank_name`, `purchase_ifsc`, `purchase_branch`, `purchase_gst_no`, `purchase_item`, `purchase_quantity`, `purchase_rate`, `purchase_total`, `is_deleted`, `purchase_status`, `purchase_to`) VALUES
(1, 'cash', 'nikita', 'tulsi', 'sumit', 'gogawan', 12, 700054569, '11', 13, '567894878412484', 'HDFC', 'hdfc54845156', 'khargone', '454826265', 'gehu', 2, 3, 50000, 0, 1, 'farmer'),
(2, 'cash', 'fhg', 'rfg', 'rdtd', 'sdfd', 65, 2147483647, '4565', 45645, '21245254', 'aeds', 'sdf', 'sada', '0', '', 1, 0, 0, 1, 1, 'farmer'),
(3, 'cash', 'Manikant Patidar', 'Sukhraj', 'Tulsi', 'Bada Gaon', 6, 2147483647, '0', 4444, '75548955674861', 'Jila Sahkari bank', 'JL4541867', 'Bus Stand', '0', '1', 5, 1000, 5000, 1, 1, 'farmer'),
(4, 'cash', 'Manikant Patidar', 'Sukhraj', 'Tulsi', 'gogawan', 6, 2147483647, '4565', 4444, '75548955674861', 'Jila Sahkari bank', 'JL4541867', 'Bus Stand', '0', 'null', 1, 1000, 1000, 0, 1, 'farmer'),
(5, '', 'Manikant Patidar', 'Sukhraj', 'Tulsi', 'Bada Gaon', 6, 2147483647, '4565', 4444, '75548955674861', 'Jila Sahkari bank', 'JL4541867', 'Bus Stand', '0', '1', 1, 0, 0, 0, 1, 'other'),
(6, 'credit', 'Manikant Patidar', 'Sukhraj', 'Tulsi', 'gogawan', 6, 2147483647, '0', 45, '75548955674861', 'Jila Sahkari bank', 'JL4541867', 'Bus Stand', '0', '1', 5, 2200, 11000, 0, 1, 'farmer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
