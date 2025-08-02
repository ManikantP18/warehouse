-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: sdb-r.hosting.stackcp.net
-- Generation Time: Jul 28, 2025 at 08:48 AM
-- Server version: 10.6.18-MariaDB-log
-- PHP Version: 8.3.23

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
-- Table structure for table `ledgerbank_accounts`
--

CREATE TABLE `ledgerbank_accounts` (
  `account_id` int(11) NOT NULL,
  `ledger_id` int(11) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `account_num` int(20) NOT NULL,
  `account_type` varchar(50) NOT NULL,
  `cheque_book` varchar(10) NOT NULL,
  `chequerange_from` varchar(5) DEFAULT NULL,
  `chequerange_to` varchar(5) DEFAULT NULL,
  `account_status` int(2) NOT NULL DEFAULT 1,
  `bank_name` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `opening_bal` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ledgerbank_accounts`
--

INSERT INTO `ledgerbank_accounts` (`account_id`, `ledger_id`, `account_name`, `account_num`, `account_type`, `cheque_book`, `chequerange_from`, `chequerange_to`, `account_status`, `bank_name`, `is_deleted`, `opening_bal`) VALUES
(10, 0, 'nikita', 2147483647, 'basic', 'no', '3433', '432', 1, 'Bank Of India', 0, 0),
(11, 0, 'sumit', 2147483647, 'trial', 'yes', '3433', '2222', 1, 'Bank Of Maharashtra', 0, 50),
(15, 0, 'sukhraj', 2147483647, 'basic', 'yes', '9', '432', 1, 'bank baroda', 0, 12),
(16, 0, 'sukhraj', 2147483647, 'LOAN', 'yes', '98', '87', 1, 'bank baroda', 0, 50),
(17, 0, 'sukhraj bhaiiii', 2147483647, 'enterprise', 'no', NULL, NULL, 1, 'sbi', 0, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ledgerbank_accounts`
--
ALTER TABLE `ledgerbank_accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ledgerbank_accounts`
--
ALTER TABLE `ledgerbank_accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
