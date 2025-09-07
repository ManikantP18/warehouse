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
-- Table structure for table `payment_in`
--

CREATE TABLE `payment_in` (
  `in_id` int(11) NOT NULL,
  `ladger_id` varchar(255) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `pay_type` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_in`
--

INSERT INTO `payment_in` (`in_id`, `ladger_id`, `bank_id`, `comp_id`, `pay_type`, `amount`, `created_date`, `is_deleted`) VALUES
(1, 'cust-2', 0, 2, 'Cash', 800, '2025-09-07 00:00:00', 0),
(2, 'cust-2', 25, 2, 'Bank', 800, '2025-09-07 00:00:00', 0),
(3, 'cust-9', 0, 3, 'Cash', 9000, '2025-09-07 00:00:00', 0),
(4, 'cust-9', 26, 3, 'Bank', 1000, '2025-09-07 00:00:00', 0),
(5, 'cust-9', 26, 3, 'Bank', 30000, '2025-09-07 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment_in`
--
ALTER TABLE `payment_in`
  ADD PRIMARY KEY (`in_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment_in`
--
ALTER TABLE `payment_in`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
