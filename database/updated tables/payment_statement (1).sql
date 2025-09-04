-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2025 at 06:59 AM
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
-- Table structure for table `payment_statement`
--

CREATE TABLE `payment_statement` (
  `pay_id` int(11) NOT NULL,
  `ladger_id` varchar(50) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `sell_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `prtclr` varchar(255) NOT NULL,
  `dr_amt` float NOT NULL,
  `cr_amt` float NOT NULL,
  `avbl_bal` float NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `pay_status` tinyint(2) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_statement`
--

INSERT INTO `payment_statement` (`pay_id`, `ladger_id`, `bank_id`, `comp_id`, `sell_id`, `purchase_id`, `pay_type`, `prtclr`, `dr_amt`, `cr_amt`, `avbl_bal`, `created_date`, `pay_status`, `is_deleted`) VALUES
(1, 'cust-19', 0, 3, 28, 0, 'Sell', 'sell', 19600, 0, -19600, '2025-09-03 16:26:10', 1, 0),
(2, 'cust-19', 0, 3, 28, 0, 'Sell', 'sell', 0, 4600, -15000, '2025-09-03 16:26:10', 1, 0),
(3, 'cust-19', 16, 3, 28, 0, 'Sell', 'sell', 0, 8500, -6500, '2025-09-03 16:26:10', 1, 0),
(4, 'cust-3', 0, 2, 29, 0, 'Sell', 'sell', 42850, 0, -42850, '2025-09-03 16:34:35', 1, 0),
(5, 'cust-3', 0, 2, 29, 0, 'Sell', 'Payment', 0, 22600, -20250, '2025-09-03 16:34:35', 1, 0),
(6, 'cust-3', 19, 2, 29, 0, 'ICICI', 'Payment', 0, 15000, -5250, '2025-09-03 16:34:35', 1, 0),
(7, 'cust-3', 0, 0, 0, 0, 'Purchase', 'Purchase', 0, 66825, 61575, '2025-09-03 16:37:14', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment_statement`
--
ALTER TABLE `payment_statement`
  ADD PRIMARY KEY (`pay_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment_statement`
--
ALTER TABLE `payment_statement`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
