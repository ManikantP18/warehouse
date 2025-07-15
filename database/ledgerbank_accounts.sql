-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2025 at 08:08 AM
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
-- Table structure for table `ledgerbank_accounts`
--

CREATE TABLE `ledgerbank_accounts` (
  `account_id` int(11) NOT NULL,
  `ledger_id` int(11) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `account_num` int(20) NOT NULL,
  `account_type` int(11) NOT NULL,
  `cheque_book` tinyint(2) NOT NULL,
  `chequerange_from` int(11) NOT NULL,
  `chequerange_to` int(11) NOT NULL,
  `account_status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ledgerbank_accounts`
--

INSERT INTO `ledgerbank_accounts` (`account_id`, `ledger_id`, `account_name`, `account_num`, `account_type`, `cheque_book`, `chequerange_from`, `chequerange_to`, `account_status`) VALUES
(1, 0, 'nikita', 223, 57373, 1, 3, 4, 1),
(2, 0, 'sumit', 2147483647, 0, 0, 32, 2222, 1),
(3, 0, 'sumit', 2147483647, 786, 0, 3433, 432, 1),
(4, 0, 'sumit', 2147483647, 0, 0, 3433, 2222, 1),
(5, 0, 'nikita', 2147483647, 0, 0, 3433, 43289, 1),
(6, 0, 'sumit', 2147483647, 0, 0, 3433, 2222, 1);

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
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
