-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2025 at 10:41 AM
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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `pay_ladger_id` varchar(50) NOT NULL,
  `from_bank` int(11) NOT NULL,
  `rec_bank` int(11) NOT NULL,
  `tr_type` tinyint(2) NOT NULL DEFAULT 1 COMMENT '1 for in and 2 for out',
  `pay_type` int(11) NOT NULL,
  `amount` float NOT NULL,
  `cash_amount` float NOT NULL,
  `bank_amount` float NOT NULL,
  `remaining_amount` float NOT NULL,
  `is_opening_bal` tinyint(4) NOT NULL DEFAULT 0,
  `sell_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `pay_status` varchar(50) NOT NULL DEFAULT 'pending',
  `remark` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `pay_ladger_id`, `from_bank`, `rec_bank`, `tr_type`, `pay_type`, `amount`, `cash_amount`, `bank_amount`, `remaining_amount`, `is_opening_bal`, `sell_id`, `purchase_id`, `status`, `pay_status`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'cust-43', 0, 0, 2, 0, 160000, 0, 0, 0, 0, 0, 25, 1, 'pending', '', '2025-08-08 01:22:51', '2025-08-08 01:22:51'),
(2, '', 11, 0, 0, 0, 160000, 40000, 66500, 48000, 0, 0, 0, 1, 'pending', 'hello', '2025-08-08 01:24:30', '2025-08-08 01:24:30'),
(3, 'cust-43', 0, 0, 2, 0, 48000, 0, 0, 0, 0, 0, 25, 1, 'pending', '', '2025-08-08 01:24:30', '2025-08-08 01:24:30'),
(4, 'cust-43', 10, 0, 0, 0, 48000, 60000, 0, 0, 0, 0, 0, 1, 'pending', '', '2025-08-08 01:27:35', '2025-08-08 01:27:35'),
(5, 'cust-43', 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 25, 1, 'pending', '', '2025-08-08 01:27:36', '2025-08-08 01:27:36'),
(6, 'cust-39', 0, 0, 2, 0, 10775, 0, 0, 0, 0, 0, 26, 1, 'pending', '', '2025-08-08 01:35:20', '2025-08-08 01:35:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
