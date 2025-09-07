-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2025 at 11:23 AM
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
-- Table structure for table `payment_outs`
--

CREATE TABLE `payment_outs` (
  `pay_id` int(11) NOT NULL,
  `ladger_id` varchar(255) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `pay_type` varchar(50) NOT NULL DEFAULT 'cash',
  `pay_desc` text NOT NULL,
  `ammount` float NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_outs`
--

INSERT INTO `payment_outs` (`pay_id`, `ladger_id`, `bank_id`, `comp_id`, `pay_type`, `pay_desc`, `ammount`, `created_date`, `is_deleted`) VALUES
(1, '0', 0, 3, 'Cash', '', 400, '2025-09-07 00:00:00', 0),
(2, '0', 26, 3, 'Bank', '', 20, '2025-09-07 00:00:00', 0),
(3, '0', 0, 2, 'Cash', '', 20, '2025-09-07 00:00:00', 0),
(4, '0', 25, 2, 'Bank', '', 5, '2025-09-07 00:00:00', 0),
(5, 'cust-2', 0, 3, 'Cash', '', 200, '2025-09-07 00:00:00', 0),
(6, 'cust-2', 26, 3, 'Bank', '', 3000, '2025-09-07 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment_outs`
--
ALTER TABLE `payment_outs`
  ADD PRIMARY KEY (`pay_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment_outs`
--
ALTER TABLE `payment_outs`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
